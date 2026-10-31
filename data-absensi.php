<?php

require_once __DIR__ . '/php/main.php';

try {
    $attendanceRecords = $pdo->query(
        'SELECT absensi.tanggal, siswa.nis, siswa.nama, absensi.status, absensi.keterangan
         FROM absensi
         INNER JOIN siswa ON siswa.id = absensi.siswa_id
         ORDER BY absensi.tanggal DESC, siswa.nama ASC'
    )->fetchAll();
} catch (PDOException $exception) {
    error_log('Unable to load attendance: ' . $exception->getMessage());
    http_response_code(500);
    $attendanceRecords = [];
    $loadError = 'Data absensi tidak dapat dimuat. Periksa struktur tabel database.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi - Dashboard Absensi</title>
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
            <a href="data-siswa.php">Data siswa</a>
            <a href="data-absensi.php" aria-current="page">Data absensi</a>
        </nav>
    </aside>
    <main>
        <h1>Data absensi</h1>
        <?php if (isset($loadError)): ?>
            <p class="message"><?= escapeHtml($loadError) ?></p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($attendanceRecords === []): ?>
                            <tr><td colspan="5">Belum ada data absensi di database.</td></tr>
                        <?php else: ?>
                            <?php foreach ($attendanceRecords as $record): ?>
                                <tr>
                                    <td><?= escapeHtml($record['tanggal']) ?></td>
                                    <td><?= escapeHtml($record['nis'] ?? '-') ?></td>
                                    <td><?= escapeHtml($record['nama']) ?></td>
                                    <td><?= escapeHtml($record['status']) ?></td>
                                    <td><?= escapeHtml($record['keterangan'] ?? '-') ?></td>
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
