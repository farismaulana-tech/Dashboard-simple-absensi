<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "db_absensi"); 
    if(!$koneksi){
        die("gak bisa ini" . mysqli_connect_error());
    }

?>