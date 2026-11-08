
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi - Lunk</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            background: #F1F5F9;
        }

        /* SIDEBAR */
        .sidebar {
            background-color: #172554;
            width: 300px;
            height: 100vh;
            padding: 20px;
            box-shadow: 5px 0 20px rgb(0, 0, 0);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
        }

        .sidebar h1 {
            color: #60A5FA;
            font-size: 36px;
            font-weight: 900;
        }

        .sidebar hr {
            border: 1px solid white;
            margin-top: 0;
        }

        .tombol-sidebar {
            list-style: none;
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            text-align: left;
            gap: 10px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            background: transparent;
            padding: 15px 16px;
            width: 100%;
            border-radius: 8px;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: white;
            background-color: #3B82F6;
            padding: 15px 16px;
        }

        /* MAIN */
        main {
            margin-left: 326px;
            padding: 20px;
            width: calc(100% - 326px);
        }

        /* DATA ABSENSI */
        .judul-absensi {
            color: #172554;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 30px;
        }

        .container-absensi {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            border: 1px solid #E2E8F0;
            overflow-x: auto;
        }

        .filter-absensi {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-absensi input {
            padding: 12px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            font-size: 14px;
        }

        .tabel-absensi {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 12px;
            min-width: 850px;
        }

        .tabel-absensi th {
            background: #172554;
            color: white;
            padding: 15px 12px;
            border-radius: 9px;
            font-size: 14px;
        }

        .tabel-absensi td {
            background: #F8FAFC;
            color: #172554;
            text-align: center;
            padding: 15px 10px;
            border: 1px solid #E2E8F0;
            border-radius: 9px;
            font-size: 13px;
        }

        .status-hadir {
            color: #15803D;
            background: #DCFCE7;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .status-izin {
            color: #B45309;
            background: #FEF3C7;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .status-sakit {
            color: #1D4ED8;
            background: #DBEAFE;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .status-alpa {
            color: #B91C1C;
            background: #FEE2E2;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .tombol-aksi {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .tombol-aksi button {
            flex: 1;
            padding: 17px;
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-delete {
            background: #DC2626;
        }

        .btn-edit {
            background: #3B82F6;
        }

        .btn-create {
            background: #059669;
        }

        .tombol-aksi button:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h1>Lunk</h1>
        <hr>

        <ul class="tombol-sidebar">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="data-siswa.php">Data siswa</a></li>
            <li><a href="data-absensi.php">Data absensi</a></li>
        </ul>
    </div>

    <!-- KONTEN DATA ABSENSI -->
    <main>
         <h1 style="margin-bottom: 5vh;">Data Absensi</h1>

        <div class="container-absensi">

            <div class="filter-absensi">
                <input type="date" id="tanggal">
                <input type="text" placeholder="Cari nama siswa atau NIS...">
            </div>

            <table class="tabel-absensi">

                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once __DIR__ . '/php/koneksi.php';

                        $query = "
                        s.nisn,
                        s.status,
                        s.keterangan,
                        k.nama_lengkap,
                        FROM siswa AS k
                        JOIN absensi_siswa AS s ON s.nisn = k.nisn
                        ORDER BY s.id_absensi ASC
                        ";

                        $hasil = mysqli_query($koneksi , $query);

                        while($row = mysqli_fetch_array($hasil)){
                            echo 
                            "<tr>" . 
                            "<td>" . $row['nama_lengkap'] . "</td>" .
                            "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="tombol-aksi">
            <button class="btn-delete">Delete</button>
            <button class="btn-edit">Edit</button>
            <button class="btn-create">Create</button>
        </div>

    </main>

</body>
</html>
