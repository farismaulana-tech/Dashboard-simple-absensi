 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <!-- style -->
    <style>

* {
    font-family: "Inter", sans-serif;
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

body {
    display: flex;
    background-color: #F1F5F9;
}

/* SIDEBAR */
.sidebar {
    background-color: #172554;
    width: 300px;
    height: 100vh;
    padding: 20px;
    position: fixed;
    top: 0;
    left: 0;

    border-radius: 0;
    box-shadow: 5px 0 20px rgb(0, 0, 0);
    z-index: 100;
}
.sidebar h1 {
    color: #60A5FA;
    font-weight: 900;
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 15px;
    border-radius: 10px;
    display: block;
    transition: 300ms;
}

.sidebar a:hover {
    color: white;
    background-color: #3B82F6;
    padding-left: 20px;
}

.tombol-sidebar {
    margin-top: 3vh;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* MAIN */
main {
    margin-left: 300px;
    min-width: 80%;
    padding: 20px;
    flex: 1;
}

/* TABEL */
.container-table {
    background-color: white;
    border: 1px solid #E2E8F0;
    padding: 2vh;
    border-radius: 15px;
}

.tablenya th,
.tablenya td {
    border: 1px solid #E2E8F0;
    padding: 1.5vh;
    border-radius: 8px;
    text-align: center;
}

.tablenya th {
    background-color: #172554;
    color: white;
}

.tablenya td {
    background-color: #F8FAFC;
    color: #172554;
}

.tablenya tr:hover td {
    background-color: #DBEAFE;
}

/* TOMBOL */
.btn {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    border-radius: 12px;
    padding: 17px;
    color: white;
    text-decoration: none;
    font-weight: 700;
    transition: 300ms;
}

.btn:nth-child(1) {
    background-color: #DC2626;
}

.btn:nth-child(2) {
    background-color: #3B82F6;
}

.btn:nth-child(3) {
    background-color: #059669;
}

.btn:hover {
    opacity: 0.85;
    transform: translateY(-3px);
}

.tombol-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 40px 0;
}

@media (max-width: 768px) {
    .sidebar {
        width: 180px;
        min-width: 180px;
    }

    main {
        margin-left: 195px;
        min-width: 0;
        width: calc(100% - 195px);
    }
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
        <h1 style="margin-bottom: 5vh;">Data siswa</h1>
        <!-- table -->
         <div class="container-table">

             <div class="tablenya" style="overflow: auto; max-height: 60vh">
                 <table style="overflow: auto; width: 100%;" cellpadding="0" cellspacing="20">
                     <thead>
                         <tr>
                             <th>NIS</th>
                             <th>Nama Siswa</th>
                             <th>Kelas</th>
                         </tr>
                     </thead>
                     <tbody>
                        <?php
        #cara agar fungsi dari koneksi.php bisa dipakai di file ini, maka kita harus memanggilnya dengan require_once
        require_once __DIR__ . '/php/koneksi.php';

        #buat query
        $query = "
    SELECT
        s.nisn,
        s.nama_lengkap,
        s.id_kelas,
        k.nama_kelas,
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
            "<tr>" .
             "<td>" . $user['nisn'] . "</td>" .
             "<td>" . $user['nama_lengkap'] . "</td>" .
             "<td>" . $user['nama_kelas'] . "</td>" .
             "</tr>";
        }
        ?>
                     </tbody>
                 </table>
             </div>
         </div>

         <!-- tombol -->
          <div class="tombol-container" style="min-width: 100%; display: flex;" width="100%" >
            <a href="" class="btn">Delete</a>
            <a href="" class="btn">Edit</a>
            <a href="" class="btn">Create</a>
          </div>
          
      </main>
</body>
</html>