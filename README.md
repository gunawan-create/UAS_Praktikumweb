## LAPORAN UAS PRAKTIKUM WEB
Nama : Ali Gunawan | Kelas : TI.24.A.3 | NIM : 312410400

## TUJUAN PRAKTIKUM
Tujuan dari praktikum ini adalah untuk:

a. Menerapkan konsep Pemrograman Berorientasi Objek (OOP) dalam pengembangan aplikasi web.

b.Mengimplementasikan arsitektur MVC (Model–View–Controller) menggunakan PHP Native.

c.Membuat sistem routing manual dengan bantuan file .htaccess.

d.Mengembangkan aplikasi web sederhana yang memiliki fitur:

- Login dan register

- Hak akses berdasarkan role (admin dan user)

- CRUD data mahasiswa

e. Melatih pemisahan logika program, tampilan, dan pengolahan data agar kode lebih terstruktur.

f. Memahami alur kerja aplikasi web dari request, proses, hingga response.

Praktikum ini merupakan bagian dari Project UAS Pemrograman Web, yang mengacu pada praktikum OOP dan Modular.

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
