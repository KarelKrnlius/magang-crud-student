# 🎓 CRUD Student - Program Magang SMK

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="120">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-red">
  <img src="https://img.shields.io/badge/PHP-Backend-blue">
  <img src="https://img.shields.io/badge/PostgreSQL-Database-blue">
</p>

---

## 📌 Deskripsi

Aplikasi ini merupakan sistem **CRUD (Create, Read, Update, Delete)** untuk mengelola data siswa berbasis web menggunakan Laravel.

Project ini dikembangkan sebagai bagian dari program magang SMK untuk meningkatkan kemampuan dalam:

* Pengembangan backend menggunakan Laravel
* Pengelolaan database menggunakan PostgreSQL
* Implementasi konsep MVC
* Kolaborasi tim menggunakan Git & GitHub

---

## 🎯 Tujuan Project

* Memahami alur kerja pengembangan aplikasi web
* Menerapkan praktik version control dengan Git
* Melatih kerja sama tim dalam pengembangan software
* Membuat aplikasi CRUD sederhana yang terstruktur

---

## 👨‍💻 Tim Pengembang

| Role               | Nama             |
| ------------------ | ---------------- |
| Project Manager    | Muhammad Faqih   |
| Backend Developer  | Neevaxius Kenzie |
| Frontend Developer | Karel Kornelius  |
| QA Tester          | Aidhil Fahim     |

---

## ⚙️ Teknologi yang Digunakan

| Teknologi  | Keterangan         |
| ---------- | ------------------ |
| Laravel    | Framework backend  |
| PHP        | Bahasa pemrograman |
| PostgreSQL | Database           |
| Blade      | Template engine    |
| Bootstrap  | Styling UI         |

---

## 🗂️ Struktur Project (Sederhana)

```bash
app/
routes/
resources/views/
database/migrations/
```

---

## 🚀 Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/magang-crud-student.git
```

### 2. Masuk ke Folder

```bash
cd magang-crud-student
```

### 3. Install Dependency

```bash
composer install
```

### 4. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Konfigurasi Database (.env)

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=magang_crud_student
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 6. Jalankan Migration

```bash
php artisan migrate
```

### 7. Jalankan Server

```bash
php artisan serve
```

Akses:

```
http://127.0.0.1:8000
```

---

## ✨ Fitur Utama

* Menampilkan daftar siswa
* Menambahkan data siswa
* Mengedit data siswa
* Menghapus data siswa
* Validasi input (tidak boleh duplikat)
* Pagination data

---

## 📂 Routing

| Endpoint            | Fungsi           |
| ------------------- | ---------------- |
| /students           | Menampilkan data |
| /students/create    | Form tambah      |
| /students/{id}/edit | Form edit        |

---

## 🔀 Workflow Kolaborasi Tim

### 1. Buat Branch

```bash
git checkout -b feature/nama-fitur
```

### 2. Coding & Commit

```bash
git add .
git commit -m "feat: deskripsi fitur"
```

### 3. Push

```bash
git push origin feature/nama-fitur
```

### 4. Pull Request

* Buat PR di GitHub
* Tunggu review dari Project Manager
* Merge ke `main`

---

## 👥 Pembagian Tugas

| Role            | Branch                    | Tugas         |
| --------------- | ------------------------- | ------------- |
| Project Manager | feature/readme            | Dokumentasi   |
| Backend         | feature/validasi-duplikat | Validasi data |
| Frontend        | feature/styling-table     | UI tabel      |
| QA Tester       | feature/tambah-pagination | Pagination    |

---

## 📌 Aturan Tim

* Dilarang commit langsung ke `main`
* Wajib menggunakan branch `feature/...`
* Wajib Pull Request sebelum merge
* Selalu `git pull` sebelum mulai kerja
* Jangan upload `.env`

---

## ⚠️ Troubleshooting

### ❌ Error database

* Pastikan PostgreSQL aktif
* Pastikan database sudah dibuat

### ❌ Migration gagal

```bash
php artisan migrate:fresh
```

---

## 📊 Status Project

🚧 Sedang dalam tahap pengembangan

---

## 📎 Catatan

Project ini dibuat untuk keperluan pembelajaran dan pengembangan skill di bidang web development.
