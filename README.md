# Proyek Profil Perusahaan

Proyek ini adalah situs web profil perusahaan yang lengkap, dengan fitur seperti daftar produk, kategori produk, situs blog, dan bagian struktur organisasi. Dibangun menggunakan Laravel untuk backend, Tailwind CSS untuk styling frontend, dan MySQL untuk manajemen basis data.

## Fitur

- **Profil Perusahaan**: Info lengkap tentang perusahaan.
- **Produk**: Daftar produk yang ditawarkan oleh perusahaan.
- **Kategori Produk**: Kategorisasi produk biar lebih mudah dicari.
- **Situs Blog**: Tempat untuk memposting dan membaca blog perusahaan.
- **Struktur Organisasi**: Menampilkan hierarki organisasi perusahaan.

## Teknologi

- **Framework Backend**: Laravel
- **Styling Frontend**: Tailwind CSS
- **Sistem Manajemen Basis Data**: MySQL

## Struktur Proyek

- **app**: Kode inti aplikasi.
- **public**: Tempat aset publik seperti gambar, stylesheet, dan skrip.
- **resources**: Berisi tampilan dan aset mentah seperti konfigurasi Tailwind CSS.
- **routes**: Menentukan rute untuk aplikasi.
- **database**: Berisi migrasi dan seed basis data.
- **config**: Berkas konfigurasi aplikasi.

## Direktori dan Berkas Utama

- **app/Http/Controllers**: Controller untuk menangani permintaan.
- **app/Models**: Model Eloquent.
- **resources/views**: Template Blade untuk frontend.
- **routes/web.php**: Rute aplikasi web.
- **database/migrations**: Definisi skema basis data.
- **tailwind.config.js**: Berkas konfigurasi Tailwind CSS.

## Screenshot

![Screenshot Dashboard](https://i.ibb.co.com/sWGr6Jw/biostark.png)

## Variabel Lingkungan

Jangan lupa atur variabel lingkungan berikut di berkas `.env` kamu:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=your_database_name`
- `DB_USERNAME=your_database_user`
- `DB_PASSWORD=your_database_password`
