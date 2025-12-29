<?php

namespace Helpers;

class Logger
{
    /**
     * Enregistre une action dans un fichier de log structuré.
     * Structure : logs/YYYY/MM/DD/log_YYYY-MM-DD_[hash].txt
     *
     * @param string $action Type d'action (CREATION, MODIFICATION, SUPPRESSION)
     * @param string $message Détails de l'action
     * @param string $user Nom de l'utilisateur (par défaut 'Invité')
     */
    public static function log(string $action, string $message, string $user = 'Invité'): void
    {
        // 1. Définition des dates et chemins
        $now = new \DateTime();
        $year = $now->format('Y');
        $month = $now->format('m');
        $day = $now->format('d');

        // Racine du projet
        $logDir = __DIR__ . '/../logs/' . $year . '/' . $month . '/' . $day;

        // 2. Création du dossier s'il n'existe pas
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        // 3. Génération du nom de fichier unique par jour
        $dateStr = $now->format('Y-m-d');
        $hash = substr(md5($dateStr . 'ZenlessLog'), 0, 10);
        $filename = "log_{$dateStr}_{$hash}.txt";
        $filePath = $logDir . '/' . $filename;

        // 4. Récupération des infos contextuelles
        $time = $now->format('H:i:s');
        $ip = self::getClientIp(); // Récupération de l'IP via la méthode privée

        // 5. Formatage de la ligne : [HEURE] [IP] [USER] [ACTION] - Message
        // J'utilise str_pad pour aligner le texte et rendre le fichier plus lisible
        $action = str_pad($action, 12, ' ');
        $logLine = "[$time] [$ip] [$user] [$action] - $message" . PHP_EOL;

        // 6. Écriture
        file_put_contents($filePath, $logLine, FILE_APPEND);
    }

    /**
     * Tente de récupérer l'adresse IP réelle de l'utilisateur
     * même s'il est derrière un proxy.
     */
    private static function getClientIp(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // IP depuis un internet partagé
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // IP passée par un proxy
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // IP standard
            return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
        }
    }
}