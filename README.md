# 🏀 KisekiCourt

> Web-Based Basketball Court Booking System built with Laravel 12, Bootstrap 5, and MySQL.

---

## Tentang Project

KisekiCourt merupakan aplikasi berbasis web yang dikembangkan untuk memudahkan proses penyewaan atau booking lapangan basket secara online. Aplikasi ini menyediakan dua jenis pengguna, yaitu **Admin** dan **User**, sehingga proses pengelolaan data dan pemesanan dapat dilakukan secara lebih efisien.

Project ini dibuat sebagai tugas mata kuliah **Pemrograman Web II**.

---

# Fitur

## User

- ✅ Register & Login
- ✅ Melihat daftar lapangan
- ✅ Melihat jadwal yang tersedia
- ✅ Booking lapangan basket
- ✅ Upload bukti pembayaran
- ✅ Melihat riwayat booking
- ✅ Dashboard User

---

## Admin

- ✅ Login Admin
- ✅ Dashboard Statistik
- ✅ CRUD Data Lapangan
- ✅ CRUD Jadwal
- ✅ Melihat seluruh booking
- ✅ Verifikasi pembayaran
- ✅ Approve / Reject Booking
- ✅ Laporan transaksi
- ✅ Export PDF

---

# Built With

- Laravel 12
- PHP 8.2
- Bootstrap 5
- MySQL
- Eloquent ORM
- DomPDF
- Vite

---

# 📂 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
```

---

# Screenshots

## Landing Page

![Landing Page](public/screenshots/landing-page.png)

---

## Login

![Login](public/screenshots/login.png)

---

## Register

![Register](public/screenshots/register.png)

---

## Dashboard Admin

![Dashboard Admin](public/screenshots/dashboard-admin.png)

---

## Dashboard User

![Dashboard User](public/screenshots/dashboard-user.png)

---

## Booking Lapangan

![Booking](public/screenshots/booking.png)

---

## Laporan

![Laporan](public/screenshots/laporan.png)

---

# Installation

Clone repository

```bash
git clone https://github.com/hilmanmhmmd/KisekiCourt.git
```

Masuk ke folder project

```bash
cd KisekiCourt
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file **.env**

```env
DB_DATABASE=kisekicourt
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi database

```bash
php artisan migrate
```

Jika memiliki file database SQL, import terlebih dahulu melalui phpMyAdmin.

Jalankan server

```bash
php artisan serve
```

Buka browser

```
http://127.0.0.1:8000
```

---

# Developer

**Muhammad Hilman Akhyar**

Universitas Islam Kalimantan Muhammad Arsyad Al Banjari

Program Studi Teknik Informatika

---

# Mata Kuliah

Pemrograman Web II

---

# License

Project ini dibuat untuk keperluan pembelajaran dan tugas akademik.

---

## Terima Kasih

Terima kasih telah mengunjungi repository **KisekiCourt**.

Semoga project ini dapat menjadi referensi dalam pengembangan aplikasi booking berbasis Laravel.
