<?php

require_once __DIR__ . '/php/main.php';

try {
    $students = $pdo->query(
        'SELECT nis, nama, jenis_kelamin FROM siswa ORDER BY nama ASC'
    )->fetchAll();
} catch (PDOException $exception) {
    error_log('Unable to load students: ' . $exception->getMessage());
    http_response_code(500);
    $students = [];
    $loadError = 'Data siswa tidak dapat dimuat. Periksa struktur tabel database.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Dashboard Absensi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; color: #242424; font-family: Inter, sans-serif; }
        .sidebar { position: fixed; inset: 0 auto 0 0; width: 250px; padding: 24px; background: #fff; box-shadow: 1px 0 20px #0001; }
        .sidebar h1 { color: purple; font-weight: 900; }
        .sidebar a { display: block; padding: 14px; color: #242424; text-decoration: none; border-radius: 10px; }
        .sidebar a:hover { color: #fff; background: purple; }
        main { margin-left: 250px; padding: 32px; }
        .table-wrap { overflow-x: auto; margin-top: 24px; padding: 16px; border: 1px solid #ddd; border-radius: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #f7f4fa; }
        .message { padding: 12px; color: #702020; background: #fff0f0; border-radius: 8px; }
        @media (max-width: 650px) {
            .sidebar { position: static; width: 100%; height: auto; }
            main { margin: 0; padding: 20px; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <h1>Lunk</h1>
        <hr>
        <nav aria-label="Navigasi utama">
            <a href="index.html">Beranda</a>
            <a href="data-siswa.php" aria-current="page">Data siswa</a>
            <a href="data-absensi.php">Data absensi</a>
        </nav>
    </aside>
    <main>
        <h1>Data siswa</h1>
        <?php if (isset($loadError)): ?>
            <p class="message"><?= escapeHtml($loadError) ?></p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Jenis kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($students === []): ?>
                            <tr><td colspan="4">Belum ada data siswa di database.</td></tr>
                        <?php else: ?>
                            <?php foreach ($students as $index => $student): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= escapeHtml($student['nis'] ?? '-') ?></td>
                                    <td><?= escapeHtml($student['nama']) ?></td>
                                    <td><?= escapeHtml($student['jenis_kelamin']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
