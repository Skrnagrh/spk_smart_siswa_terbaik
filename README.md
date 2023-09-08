## Sistem Pendukung Keputusan (SPK) Pemilihan Siswa Terbaik Menggunakan Metode Simple Multi Attribute Rating Technique (SMART)

Sistem Pendukung Keputusan (SPK) ini adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu dalam pemilihan siswa terbaik menggunakan Metode Simple Multi Attribute Rating Technique (SMART).

## Tampilan Aplikasi

### Halaman Homepage

![Halaman Homepage](https://github.com/Skrnagrh/spk_smart_siswa_terbaik/raw/main/public/1.tampilan/1.PNG)

### Halaman Login

![Halaman Login](https://github.com/Skrnagrh/spk_smart_siswa_terbaik/raw/main/public/1.tampilan/2.PNG)

### Halaman Dashboard

![Halaman Dashboard](https://github.com/Skrnagrh/spk_smart_siswa_terbaik/raw/main/public/1.tampilan/3.PNG)

## Fitur

- Manajemen Kriteria dan Subkriteria
- Manajemen Data Siswa
- Penggunaan Metode SMART untuk Pemilihan Siswa Terbaik
- Tampilan Dashboard Interaktif
- Dan masih banyak lagi...

## Persyaratan

- PHP >= 8.1
- Composer
- Laravel >= 10.x
- MySQL atau Database Lainnya

## Panduan Instalasi

1. Clone repositori ini ke komputer Anda:

   ```bash
   git clone https://github.com/Skrnagrh/spk_smart_siswa_terbaik.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd spk_smart_siswa_terbaik
   ```

3. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

4. Konfigurasi file `.env` sesuai dengan pengaturan database Anda.

5. Jalankan perintah berikut untuk menginstal dependensi:

   ```bash
   composer install
   ```

6. Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

7. Migrasikan dan isi database Anda dengan data awal:

   ```bash
   php artisan migrate --seed
   ```

8. Jalankan server pengembangan:

   ```bash
   php artisan serve
   ```

9. Buka aplikasi di browser Anda dengan mengunjungi `http://localhost:8000`.
```
