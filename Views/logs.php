<?php $this->layout('layout', ['title' => 'Logs Système']) ?>

    <h1 class="title">Historique des Logs</h1>


<?php if (empty($logs)): ?>
    <p>Aucun fichier de log disponible.</p>
<?php else: ?>
    <table class="logs-table">
        <thead>
        <tr>
            <th>Fichier</th>
            <th>Date de modification</th>
            <th>Taille</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= htmlspecialchars($log['path']) ?></td>
                <td><?= htmlspecialchars($log['date']) ?></td>
                <td><?= htmlspecialchars($log['size']) ?></td>
                <td>
                    <a href="index.php?action=logs&file=<?= urlencode($log['path']) ?>" class="btn-download">
                        ⬇️ Télécharger
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>