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
            margin-left: 300px;       /* Sama dengan lebar sidebar */
            padding: 20px;
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
        <h1>ini adalah halaman data absensi</h1>
      </main>
</body>
</html>