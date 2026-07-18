# KisekiCourt

Web-Based Basketball Court Booking System built with Laravel 12, Bootstrap 5, and MySQL.

---

## About Project

KisekiCourt merupakan aplikasi booking lapangan basket berbasis web yang dikembangkan menggunakan Laravel 12. Aplikasi ini memudahkan pengguna melakukan booking lapangan secara online serta membantu admin dalam mengelola lapangan, jadwal, pembayaran, dan laporan transaksi.

Project ini dibuat sebagai tugas akhir (UAS) Mata Kuliah Pemrograman Web II.

---

## Features

### User

- Register & Login
- Dashboard User
- Melihat daftar lapangan
- Melihat jadwal yang tersedia
- Booking lapangan basket
- Upload bukti pembayaran
- Melihat riwayat booking

### Admin

- Login Admin
- Dashboard Admin
- CRUD Data Lapangan
- CRUD Jadwal
- Manajemen Booking
- Verifikasi Pembayaran
- Approve / Reject Booking
- Laporan Transaksi
- Export PDF

---

## Technologies

- Laravel 12
- PHP 8.2
- Bootstrap 5
- MySQL
- Eloquent ORM
- DomPDF
- Vite

---

## Project Structure

```text
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

## Screenshots

### Landing Page

![Landing Page](./public/screenshots/landing-page.png)

---

### Login

![Login](./public/screenshots/login.png)

---

### Register

![Register](./public/screenshots/register.png)

---

### Dashboard Admin

![Dashboard Admin](./public/screenshots/dashboard-admin.png)

---

### Dashboard User

![Dashboard User](./public/screenshots/dashboard-user.png)

---

### Booking

![Booking](./public/screenshots/booking.png)

---

### Report

![Report](./public/screenshots/laporan.png)

---

## Installation

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

Konfigurasi database pada file `.env`

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

```text
http://127.0.0.1:8000
```

---

## Developer

**Muhammad Hilman Akhyar**

Universitas Islam Kalimantan Muhammad Arsyad Al Banjari

Program Studi Teknik Informatika

---

## Course

Pemrograman Web II

---

## License

Project ini dibuat untuk memenuhi tugas akhir (UAS) mata kuiah Pemrograman Web 2.

---

## Thank You

Terima kasih telah mengunjungi repository KisekiCourt.

Semoga project ini dapat menjadi referensi dalam pengembangan aplikasi booking berbasis Laravel.
