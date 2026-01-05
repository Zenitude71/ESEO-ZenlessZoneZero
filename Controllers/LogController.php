<?php

namespace Controllers;

use League\Plates\Engine;
use Exception;

class LogController
{
    private Engine $templates;
    private string $logBasePath;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
        // Chemin absolu vers le dossier logs
        $this->logBasePath = realpath(__DIR__ . '/../logs');
    }

    public function index(): void
    {
        $files = [];

        if ($this->logBasePath && is_dir($this->logBasePath)) {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->logBasePath, \RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'txt') {
                    $relativePath = str_replace($this->logBasePath . DIRECTORY_SEPARATOR, '', $file->getPathname());

                    $relativePath = str_replace('\\', '/', $relativePath);

                    $files[] = [
                        'name' => $file->getFilename(),
                        'path' => $relativePath,
                        'date' => date('d/m/Y H:i:s', $file->getMTime()),
                        'size' => round($file->getSize() / 1024, 2) . ' KB'
                    ];
                }
            }
        }

        usort($files, fn($a, $b) => strcmp($b['path'], $a['path']));

        echo $this->templates->render('logs', ['logs' => $files]);
    }

    public function download(string $fileRelativePath): void
    {
        if (strpos($fileRelativePath, '..') !== false) {
            die("Tentative de piratage détectée.");
        }

        $fullPath = $this->logBasePath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $fileRelativePath);

        if (file_exists($fullPath) && strpos(realpath($fullPath), $this->logBasePath) === 0) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($fullPath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fullPath));

            readfile($fullPath);
            exit;
        } else {
            die("Fichier introuvable.");
        }
    }
}