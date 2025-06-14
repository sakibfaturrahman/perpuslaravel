# 📚 E-Library SMK (Sistem Perpustakaan Digital)

Aplikasi E-Library ini dirancang sebagai sistem perpustakaan digital untuk sekolah. Sistem ini memungkinkan pengguna (siswa/guru/admin) untuk login, menjelajahi koleksi buku, membaca detail buku, serta melakukan peminjaman buku secara digital.

Proyek ini dikembangkan saat saya mengikuti program **magang** sebagai siswa SMK di bidang pengembangan perangkat lunak.

---

## 🚀 Fitur Utama

-   ✅ CRUD Rak Buku, Kategori Buku, Buku, Anggota, Petugas
-   ✅ Manajemen Peminjaman dan Pengembalian
-   ✅ Laporan Peminjaman
-   ✅ Otentikasi Admin
-   ✅ Dashboard Statistik

---

### 🔐 Halaman Login

-   Form login sederhana dan modern
-   Fitur _Remember Me_ dan _Forgot Password_
-   Tombol _Sign Up_ untuk pendaftaran akun baru

### 🏠 Beranda (Homepage)

-   Navigasi intuitif: Home, About, Buku
-   Banner informasi promosi/pengenalan
-   Kategori buku ditampilkan untuk memudahkan pencarian

### 📚 Halaman Buku

-   Tampilan koleksi buku berupa _card_ cover
-   Fitur pencarian dan kategori
-   Teks _Mau Baca Apa?_ sebagai pengantar

### 📖 Detail Buku

-   Informasi detail: Judul, Kategori, Pengarang, Tahun, Deskripsi
-   Tombol _Pinjam Buku_
-   Fitur share ke media sosial

---

## 💡 Saran Pengembangan

-   Tambahkan fitur _Rating dan Review Buku_
-   Tambahkan indikator stok buku
-   Filter kategori dinamis tanpa reload (AJAX)
-   Fitur rekomendasi buku berdasarkan histori atau minat

---

## 🛠️ Teknologi yang Digunakan

-   Laravel 8
-   PHP 7.3
-   MySQL
-   Blade Template
-   Bootstrap
-   Argon template Bootsrap
-   Template Bootsrap IndoMarket

---

## 🖼️ Tampilan Aplikasi (Screenshots)

1. **Login Page**  
   ![Login](https://github.com/user-attachments/assets/e9813e8d-ac4f-4d4d-9525-471c1bb101fa)

2. **Beranda**  
   ![Beranda](https://github.com/user-attachments/assets/f25a5f49-d1f6-4270-a336-9983da6dfa33)

3. **Halaman Buku**  
   ![Halaman Buku](https://github.com/user-attachments/assets/17bc03a0-3b6d-4a75-9c8c-52815df6181e)

4. **Detail Buku**  
   ![Detail Buku](https://github.com/user-attachments/assets/355d062c-04f5-49ed-8da7-038e57b4a9ce)

---

## Instalasi

-   git clone https://github.com/username/perpuslaravel.git
-   cd perpuslaravel
-   composer install
-   cp .env.example .env
-   php artisan key:generate

Lalu, sesuaikan konfigurasi .env untuk koneksi database dan jalankan:

-   php artisan migrate
-   php artisan serve

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
