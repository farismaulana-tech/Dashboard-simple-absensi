# Dashboard Simple Absensi

Dashboard admin sederhana untuk melihat data siswa dan absensi dari MySQL/MariaDB.

## Menyiapkan database

1. Buat database dan tabel dengan menjalankan [`php/schema.sql`](./php/schema.sql) melalui phpMyAdmin atau klien MySQL.
2. Atur variabel lingkungan koneksi sebelum menjalankan PHP:

   | Variabel | Nilai default | Keterangan |
   | --- | --- | --- |
   | `DB_HOST` | `127.0.0.1` | Host MySQL |
   | `DB_PORT` | `3306` | Port MySQL |
   | `DB_NAME` | `absensi_sekolah` | Nama database |
   | `DB_USER` | `root` | Pengguna database |
   | `DB_PASS` | kosong | Kata sandi database |

   Jika memakai XAMPP, database biasanya berjalan di `127.0.0.1` dan dapat
   dikelola melalui phpMyAdmin. Sesuaikan variabel di atas dengan pengaturan
   lokal Anda; jangan simpan kata sandi database ke repository.

3. Isi tabel `siswa` dan `absensi` dengan data Anda melalui phpMyAdmin atau
   perintah SQL. Tabel absensi menghubungkan setiap catatan dengan siswa lewat
   `siswa_id`.
4. Jalankan aplikasi dari server PHP (bukan membuka file HTML langsung), dari
   folder repository:

   ```sh
   php -S 127.0.0.1:8000
   ```

5. Buka `http://127.0.0.1:8000`. Halaman **Data siswa** dan **Data absensi**
   akan menampilkan data dari database.
