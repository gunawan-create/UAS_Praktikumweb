## LAPORAN UAS PRAKTIKUM WEB
Nama : Ali Gunawan | Kelas : TI.24.A.3 | NIM : 312410400

## TUJUAN PRAKTIKUM
Project ini dibuat untuk memenuhi **Tugas UAS Pemrograman Web**, dengan tujuan:
- Menerapkan konsep **OOP dan Modular Programming**
- Mengimplementasikan **Routing Application (.htaccess)**
- Membuat **aplikasi CRUD data mahasiswa**
- Menerapkan **sistem login dengan role Admin & User**
- Menggunakan **framework CSS (Bootstrap)** agar tampilan responsive
- Menyusun dokumentasi lengkap berupa **README, PDF, dan Video**

## Struktur folder project
```
project_data_mahasiswa/
│
├── app/
│   ├── controllers/
│   │   ├── AuthController.php
│   │   └── StudentController.php
│   ├── models/
│   │   ├── User.php
│   │   └── Student.php
│   └── views/
│       ├── auth/
│       │   ├── login.php
│       │   ├── register.php
│       │   └── forgot_password.php
│       │
│       ├── admin/
│       │   ├── navbar.php
│       │   ├── dashboard.php
│       │   └── students/
│       │       ├── index.php
│       │       ├── create.php
│       │       └── edit.php
│       │
│       └── user/
│           └── navbar.php
├── config/
│   └── database.php
|   |
├── routes/
│   └── web.php
|   |
├── index.php
├── .htaccess

```
Keterangan:
```
- project_data_mahasiswa/ : folder utama project aplikasi data mahasiswa
- app/ : menyimpan komponen utama aplikasi berbasis MVC
- app/controllers/ : berisi controller untuk mengatur alur logika aplikasi
- AuthController.php : menangani proses autentikasi (login, register, logout)
- StudentController.php : menangani proses CRUD data mahasiswa
- app/models/ : berisi model untuk pengolahan data dan koneksi database
- User.php : model data user dan role (admin & user)
- Student.php : model data mahasiswa
```
```  
- app/views/ : berisi tampilan (UI) aplikasi
- auth/ : halaman login, register, dan lupa password
- admin/ : halaman khusus admin
- navbar.php : navigasi admin
- dashboard.php : halaman dashboard admin
- students/ : halaman pengelolaan data mahasiswa
- index.php : menampilkan data mahasiswa
- create.php : form tambah data mahasiswa
```
```
- edit.php : form edit data mahasiswa
- user/ : halaman khusus user
- navbar.php : navigasi user
- config/ : menyimpan konfigurasi aplikasi
- database.php : konfigurasi koneksi database
- routes/ : pengaturan routing aplikasi
- web.php : mendefinisikan rute URL ke controller
- index.php : router utama / entry point aplikasi
- .htaccess : mengatur routing URL agar lebih rapi dan mengarahkan semua request ke index.php
```

## Struktur Database
### step 1 membuat database
Database bernama project_data_mahasiswa dibuat sebagai tempat penyimpanan seluruh data aplikasi.
```
CREATE DATABASE project_data_mahasiswa;
```

<img width="612" height="454" alt="Screenshot 2026-01-11 162150" src="https://github.com/user-attachments/assets/1eeab799-b790-4919-b511-2b81e23c8b39" />

### step 2 menambahkan tabel users
Tabel users digunakan untuk menyimpan data akun pengguna yang dapat mengakses sistem, baik sebagai admin maupun user.
```
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') NOT NULL
);
```

<img width="601" height="363" alt="Screenshot 2026-01-11 162008" src="https://github.com/user-attachments/assets/6eee8b75-4177-49c2-8ec9-754945496983" />

### step 3 menambahkan tabel mahasiswa
Tabel mahasiswa digunakan untuk menyimpan data mahasiswa yang akan dikelola oleh admin.
```
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    npm VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(50),
    angkatan VARCHAR(10)
);
```

<img width="610" height="368" alt="Screenshot 2026-01-11 162034" src="https://github.com/user-attachments/assets/caace1ed-16e0-4ddc-9c1e-cbb46d1be1c8" />

### step 4 membuat akun admin default
Akun admin default dibuat agar sistem dapat langsung digunakan tanpa perlu registrasi awal sebagai admin.
```
INSERT INTO users (username, password, role)
VALUES ('admin', 'admin123', 'admin');
```
<img width="596" height="337" alt="Screenshot 2026-01-11 162105" src="https://github.com/user-attachments/assets/c712eb35-adaa-43aa-b077-9a9b6b535de4" />

## Konfigurasi Program Data Mahasiswa
### step 1




