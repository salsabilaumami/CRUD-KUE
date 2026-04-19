# CRUD-KUE
# 🎂 Data Produk Kue (Laravel CRUD)

> Project ini dibangun menggunakan **Laravel Framework** sebagai tugas latihan pemrograman web untuk mengelola data produk secara efisien.

---

## 📝 Deskripsi Aplikasi
Aplikasi **Data Produk Kue** adalah sistem sederhana untuk mengelola daftar produk kue di toko atau inventaris. Anda bisa menambah, melihat, mengedit, dan menghapus data yang tersimpan di database MySQL.

### ✨ Fitur Utama
* **CRUD Lengkap**: Tambah, Baca, Edit, dan Hapus data produk.
* **Format Harga**: Menampilkan harga dalam format Rupiah.
* **Pencarian**: Mencari nama kue secara dinamis.
* **Notifikasi**: Menggunakan SweetAlert2 untuk pesan interaktif.

---

## 🛠️ Teknologi & Persyaratan
* **Framework**: Laravel 12
* **Bahasa**: PHP 8.3
* **Database**: MySQL
* **UI**: Bootstrap 5 & SweetAlert2

---

## 🚀 Panduan Instalasi

1. Clone repository git clone (https://github.com/salsabilaumami/CRUD-KUE.git)

2. Masuk ke folder project:
   cd crud-laravel

3. Install dependency:
   composer install

4. Copy file environment:
   cp .env.example .env

5. Generate application key:
   php artisan key:generate

6. Atur koneksi database pada file .env:
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=

7. Jalankan migrasi database:
   php artisan migrate

## Cara Menjalankan Aplikasi

Jalankan server Laravel:
 * php artisan serve
 * Atur koneksi database di file .env:

Cuplikan kode
* DB_DATABASE=nama_database_anda
* DB_USERNAME=root
* DB_PASSWORD=

Buat database di phpMyAdmin sesuai nama di .env

Buka di browser:
http://127.0.0.1:8000

## Tampilan Aplikasi

🖼️ Tampilan Aplikasi
* Aplikasi ini mencakup beberapa halaman utama:
* Halaman Daftar Produk: Menampilkan semua koleksi kue.
* Halaman Tambah Produk: Formulir input data kue baru.
* Halaman Edit Produk: Memperbarui informasi produk yang ada.

## Author
👨‍💻 Author

Nama: Salsabila Umami (240180125)
