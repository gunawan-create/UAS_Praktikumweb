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
### step 1 | .htaccess – Routing URL
File .htaccess digunakan untuk mengatur agar semua request URL diarahkan ke satu file utama, yaitu index.php. Dengan konfigurasi ini, aplikasi tidak perlu memanggil file PHP secara langsung di URL, sehingga URL menjadi lebih rapi dan mudah dibaca.

<img width="838" height="568" alt="code htaccess" src="https://github.com/user-attachments/assets/23c95860-805e-4b84-9acd-850bf42c5429" />

setiap halaman (login, dashboard, mahasiswa, dll) tetap diproses oleh satu pintu utama aplikasi.

### step 2 | index.php (Root) – Entry Point Aplikasi
File index.php di root project merupakan entry point utama atau titik awal aplikasi. Semua request dari browser pertama kali diproses di file ini.

<img width="1126" height="2192" alt="code index root" src="https://github.com/user-attachments/assets/93fec530-00d2-4b2c-a02c-24c0816606e1" />

Dengan adanya file ini, aplikasi memiliki alur terpusat, sehingga lebih aman dan terkontrol.

### step 3 | routes/web.php – Pengatur Alur Halaman
File web.php bertugas sebagai router aplikasi. File ini membaca parameter URL (contoh: admin/students) lalu menentukan controller dan method mana yang harus dijalankan.

<img width="1156" height="1508" alt="code web" src="https://github.com/user-attachments/assets/1b88267e-c801-4a4b-968c-c00f104c19be" />

Fungsi routing ini:

- Memisahkan URL dengan logic program

- Memudahkan pengembangan halaman baru

- Menghindari pemanggilan file view secara langsung

### step 4 | Folder app/controllers/ – Pengatur Logika Aplikasi
Folder controllers berisi file yang mengatur alur logika aplikasi.

#### AuthController.php

<img width="1542" height="2002" alt="code auth" src="https://github.com/user-attachments/assets/34e05294-8d3d-43f9-a08f-96324674f7c8" />

Controller ini menangani seluruh proses autentikasi pengguna, yaitu: Login,Register akun,Lupa password dan Logout. selain itu Controller juga bertugas, Mengecek kecocokan data login, Menyimpan data user ke dalam session, Mengarahkan user sesuai role (admin atau user)

#### StudentController.php

<img width="1140" height="2078" alt="code student" src="https://github.com/user-attachments/assets/72e3cb33-cdd8-4ef0-af4d-6054d19cf854" />

Controller ini menangani CRUD data mahasiswa, yaitu: Menampilkan data mahasiswa, Menambah data mahasiswa,Mengedit data mahasiswa,Menghapus data mahasiswa.

Controller ini berperan sebagai penghubung antara model Student dan view mahasiswa.

### step 5 | Folder app/models/ – Pengolahan Data Database
Folder models berisi file yang berhubungan langsung dengan database.

#### User.php

<img width="1726" height="1394" alt="code user" src="https://github.com/user-attachments/assets/0bae97f5-1424-4218-846b-02f74ef3985c" />

Model ini digunakan untuk Mengelola data user Mengecek login user, Menyimpan data akun baru dan Reset password. model ini berinteraksi dengan tabel users, yang menyimpan ,username, password dan role (admin atau user)

#### Student.php

<img width="1864" height="1850" alt="code students" src="https://github.com/user-attachments/assets/fef53dab-e51f-486e-a409-6de592a11b76" />

Model ini bertugas mengelola data mahasiswa pada tabel mahasiswa, seperti Mengambil data mahasiswa,Menyimpan data baru,Memperbarui data,dan Menghapus data.

Dengan pemisahan ini, query database tidak ditulis di controller atau view, sehingga kode lebih rapi dan aman.

### step 6 | Folder config/database.php – Koneksi Database
File ini berisi konfigurasi koneksi ke database MySQL, seperti Host,Username,Password,dan Nama database.

<img width="1326" height="558" alt="code database" src="https://github.com/user-attachments/assets/90065162-b888-45b8-ab89-e7cea570cf75" />

Semua model menggunakan file ini untuk terhubung ke database, sehingga jika ada perubahan konfigurasi, cukup diubah di satu tempat.

### step 7 | Folder config/database.php – Koneksi Database
Folder views berisi seluruh tampilan antarmuka aplikasi.
