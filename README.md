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

#### views/auth/

<img width="476" height="142" alt="Screenshot 2026-01-12 110156" src="https://github.com/user-attachments/assets/a14e279a-3df2-4413-ba3d-ac8bb69f3e41" />

Berisi halaman:

- login.php → form login user

- register.php → form pembuatan akun

forgot_password.php → reset password

Halaman ini hanya berisi tampilan (HTML + Bootstrap), tanpa logika database.
#### views/admin/

<img width="524" height="264" alt="Screenshot 2026-01-12 110147" src="https://github.com/user-attachments/assets/17c71683-e71c-44d3-a49d-4c745297fa20" />

Berisi halaman khusus admin:

- navbar.php → navigasi admin

- dashboard.php → halaman utama admin setelah login

- students/ → halaman pengelolaan data mahasiswa

Di dalam folder students:

- index.php → menampilkan tabel data mahasiswa

- create.php → form tambah mahasiswa

- edit.php → form edit mahasiswa
#### views/user/
Folder ini berisi tampilan khusus user biasa, seperti navbar user.

<img width="256" height="72" alt="Screenshot 2026-01-12 110237" src="https://github.com/user-attachments/assets/76fe8b17-6da6-45fd-a0ae-214b184034dc" />

## Tampilan Aplikasi (Hasil Implementasi)
Hasil akhir dari implementasi program ini adalah aplikasi web dengan fitur:

- Login & register user

- Dashboard admin

- CRUD data mahasiswa

- Validasi akses berdasarkan role

- Tampilan responsif menggunakan Bootstrap

- Setiap halaman memiliki fungsi yang jelas dan saling terhubung sesuai alur MVC.

## Uji Coba Aplikasi Data Mahasiswa
Pengujian aplikasi dilakukan untuk memastikan seluruh fitur berjalan dengan baik sesuai dengan kebutuhan sistem. Pengujian dilakukan secara lokal menggunakan XAMPP dengan browser.

### step 1 Menjalankan Aplikasi
Langkah awal untuk menjalankan aplikasi adalah sebagai berikut:

1. Pastikan Apache dan MySQL pada XAMPP sudah aktif

2. Simpan project ke dalam folder:
```
htdocs/project_data_mahasiswa
```
3. Buka browser dan akses:
```
http://localhost/project_data_mahasiswa

```
4. Sistem akan otomatis menampilkan halaman Login
### step 2 Uji Coba Login Admin

<img width="1919" height="1067" alt="Screenshot 2026-01-11 115358" src="https://github.com/user-attachments/assets/5cd90c56-b5fb-4690-854b-119bc2cb63bb" />

Langkah pengujian login admin:

1. Masukkan username dan password akun admin

2. Klik tombol Login

3. Jika data benar, sistem akan mengarahkan ke **Dashboard Admin**

<img width="1918" height="1070" alt="Screenshot 2026-01-11 115508" src="https://github.com/user-attachments/assets/c8346257-1c7e-4581-bc1a-ddb25819f1e0" />

4. Di dashboard admin, tersedia menu:

- Kelola Data Mahasiswa

- Logout

Hasil yang diharapkan:
Admin berhasil login dan masuk ke dashboard tanpa error.

### step 3 Uji Coba Register Akun Baru

<img width="1919" height="1068" alt="Screenshot 2026-01-11 115414" src="https://github.com/user-attachments/assets/30a70928-fcdc-43d9-937a-390703576786" />

Pengujian fitur pembuatan akun:

1. Pada halaman login, klik Buat Akun

2. Isi form:

- Username

- Password

3. Klik tombol Daftar

4. Sistem menampilkan pesan akun berhasil dibuat

5. User diarahkan kembali ke halaman login

Hasil yang diharapkan:
Akun baru berhasil tersimpan di database dan dapat digunakan untuk login.

### step 4 Uji Coba Lupa Password

<img width="1919" height="1070" alt="Screenshot 2026-01-11 115428" src="https://github.com/user-attachments/assets/c4505527-623f-4a83-a377-1457d012c23a" />

Pengujian reset password:

1. Pada halaman login, klik Lupa Password

2. Masukkan:

- Username

- Password baru

3. Klik tombol Reset

4. Sistem menampilkan pesan berhasil

5. Login kembali menggunakan password baru

Hasil yang diharapkan:
Password berhasil diubah dan user dapat login kembali.

### step 5 Uji Coba Tambah Data Mahasiswa

<img width="1919" height="1072" alt="Screenshot 2026-01-11 115520" src="https://github.com/user-attachments/assets/88f2efc0-db06-4bb4-a453-69a1e74f7aa6" />


<img width="1919" height="1067" alt="Screenshot 2026-01-11 115531" src="https://github.com/user-attachments/assets/6cc772fd-f4e9-4fbe-8832-694502a27c91" />


Langkah pengujian fitur tambah data:

1. Login sebagai admin

2. Masuk ke menu Kelola Data Mahasiswa

3. Klik tombol Tambah Mahasiswa

4. Isi data:

- NPM

- Nama

- Jurusan

- Angkatan

5. Klik tombol Simpan

Hasil yang diharapkan:
Data mahasiswa tersimpan dan langsung tampil pada tabel data mahasiswa.

### step 6 Uji Coba Edit Data Mahasiswa

<img width="1919" height="1065" alt="Screenshot 2026-01-11 141434" src="https://github.com/user-attachments/assets/5f06154e-11b9-4a4b-9a37-9d0fda3500de" />

<img width="1919" height="1068" alt="Screenshot 2026-01-11 141447" src="https://github.com/user-attachments/assets/8c186dd1-e165-4420-ab21-d5020f8cf284" />

Pengujian fitur edit data:

1. Pada tabel data mahasiswa, klik tombol Edit

2. Ubah salah satu data mahasiswa

3. Klik tombol Update

Hasil yang diharapkan:
Data mahasiswa berhasil diperbarui dan tampil sesuai perubahan.

### step 7 Uji Coba Hapus Data Mahasiswa

<img width="1919" height="1066" alt="Screenshot 2026-01-11 141503" src="https://github.com/user-attachments/assets/52bd86fe-563f-4c17-a41e-d17e8561c7ad" />

Pengujian fitur hapus data:

1. Klik tombol Hapus pada salah satu data mahasiswa

2. Konfirmasi penghapusan data

Hasil yang diharapkan:
Data mahasiswa terhapus dari database dan tidak tampil lagi di tabel.

### step 8 Uji Coba Logout

<img width="1918" height="1070" alt="Screenshot 2026-01-11 115508" src="https://github.com/user-attachments/assets/4dffaa21-0fe1-4ed5-93e7-cc3736f7422c" />

Langkah pengujian logout:

1. Klik tombol Logout

2. Sistem menghapus session user

3. User diarahkan kembali ke halaman login

Hasil yang diharapkan:
User berhasil logout dan tidak dapat mengakses halaman admin tanpa login.

## Penjelasan URL Demo Aplikasi
Pada project Data Mahasiswa ini, aplikasi belum menggunakan hosting online, melainkan dijalankan secara local server menggunakan XAMPP. Aplikasi dijalankan melalui browser dengan URL: 
```
http://localhost/project_data_mahasiswa
```
Aplikasi Data Mahasiswa pada project ini tidak menggunakan hosting online karena pengembangan dan pengujian dilakukan secara lokal menggunakan XAMPP. Hal ini dipilih karena fokus utama pada project saya buat adalah penerapan konsep pemrograman web, seperti struktur MVC, routing, dan fitur CRUD, bukan pada proses deployment aplikasi. Selain itu, penggunaan localhost memudahkan proses pengujian tanpa memerlukan biaya tambahan atau konfigurasi server eksternal, sehingga sudah mencukupi untuk kebutuhan demonstrasi dan penilaian.

## Kesimpulan
Pengujian aplikasi menunjukkan bahwa seluruh fitur berjalan dengan baik, mulai dari proses login, pengelolaan data mahasiswa, hingga logout. Aplikasi juga mampu menjaga alur akses agar halaman admin tidak dapat diakses tanpa autentikasi. Dengan demikian, aplikasi Data Mahasiswa ini telah berhasil dibangun sesuai dengan kebutuhan tugas, serta dapat menjadi dasar yang baik untuk pengembangan aplikasi web yang lebih kompleks di masa depan.
