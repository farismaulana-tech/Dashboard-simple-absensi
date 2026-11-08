<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Absensi</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- style -->
    <style>

        /* keseluruhan */

        *{
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body{
            display: flex;
        }

        /* text */

        .sidebar a{
            color: black;
            text-decoration: none;
            padding: 2vh 12vh;
            padding-left: 0;
            border-radius: 15px;
            background-color: white;
            margin-left: 0;
            display: inline-block;
            transition: ease-out 300ms;
        }

        .sidebar a:hover{
            color: white;
            text-decoration: none;
            padding: 2vh 12vh;
            padding-left: 15px;
            border-radius: 15px;
            background-color: purple;
            transition: ease-out 300ms;
            
        }


        .tombol-sidebar{
            list-style: none;
            margin-top: 3vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: left;
        }

        .sidebar h1{
            color: lightblue;
            font-weight: 900;
        }

        /* sidebar */
        .sidebar{
            background-color: white;
            border-radius: 10px;
            box-shadow: 1px 1px 1px ;
            min-width: 20px;
            height: 100vh;
            min-height: 100vh;
            width: 40vh;
            padding: 2vh;
            box-shadow: 1px 0px 50px 0 black;
            flex: 1;
            position: fixed;
            z-index: 999999px;
        }

        /* main */
        main{
            margin-left: 400px;       /* Sama dengan lebar sidebar */
            padding: 20px;
        }

        /* table */
        .table{
            border: 1px solid;
            border-radius: 10px;
            margin-top: 10vh;
            min-width: 140vh;
            max-height: 30vh;
            overflow-y: auto;
            padding: 10vh ;
        }


        .baris{
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;

        }

        .baris p{
            flex: 1;
            border-collapse: collapse;
            border: 1px solid;
            border-radius: 10px;
            padding: 2vh 0;
            min-width: 40vh;
            white-space: nowrap;
        }

        
    </style>


</head>
<body>
    <!-- sidebar -->
     <div class="sidebar">
        <div class="logo">
            <h1>Lunk</h1>
        </div>
        <hr>
        <div class="tombol-sidebar">
                <a href="index.html">Beranda</a>
                <a href="data-siswa.php">Data siswa</a>
                <a href="data-absensi.php">Data absensi</a>
        </div>
     </div>

     <!-- main -->
      <main>

        <!-- judul -->
        <h1>ini adalah halaman data siswa</h1>

        <!-- garis -->
        <hr>

        <!-- data -->
        <div class="table">


        <?php
        #cara agar fungsi dari koneksi.php bisa dipakai di file ini, maka kita harus memanggilnya dengan require_once
        require_once __DIR__ . '/php/koneksi.php';

        #buat query
        $query = "
    SELECT
        s.nisn,
        s.nis,
        s.nama_lengkap,
        s.jenis_kelamin,
        s.id_kelas,
        k.nama_kelas,
        k.kompetensi_keahlian
    FROM siswa AS s
    JOIN kelas AS k ON s.id_kelas = k.id_kelas
    ORDER BY s.nama_lengkap ASC
";
        $hasil = mysqli_query($koneksi , $query);

        if(!$hasil){
            die("gagal mengambil data" . mysqli_error($koneksi));
        }

        while ($user = mysqli_fetch_assoc($hasil)) {
            echo 
            "<div class='baris'>" .
             "<p>" . $user['nisn'] . "</p>" .
             "<p>" . $user['nama_lengkap'] . "</p>" .
             "<p>" . $user['nama_kelas'] . "</p>" .
             "</div>";
        }
        ?>
        </div>
      </main>
</body>
</html>