CREATE DATABASE IF NOT EXISTS absensi_sekolah
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE absensi_sekolah;

CREATE TABLE IF NOT EXISTS siswa (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nis VARCHAR(30) NULL,
    nama VARCHAR(150) NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_siswa_nis (nis)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS absensi (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    siswa_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    status ENUM('Hadir', 'Izin', 'Sakit', 'Alpa') NOT NULL,
    keterangan TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_absensi_tanggal (tanggal),
    KEY idx_absensi_siswa_tanggal (siswa_id, tanggal),
    CONSTRAINT fk_absensi_siswa
        FOREIGN KEY (siswa_id) REFERENCES siswa (id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) ENGINE=InnoDB;
