# hubin-app

Aplikasi website **HUBIN SMKN 1 Cimahi** berbasis Laravel dan template Admin LTE untuk mengelola hubungan industri antara sekolah dan mitra industri.

## 🚀 Fitur Utama

1. **Manajemen Pengguna**  
   - Autentikasi dan otorisasi pengguna berdasarkan peran (Admin, Guru HUBIN, Perusahaan, Siswa/Alumni).
   
2. **Manajemen Perusahaan (Industri)**  
   - Menyimpan data mitra industri yang bekerja sama dengan sekolah.
   
3. **Manajemen Kunjungan / Buku Tamu**  
   - Mengatur kunjungan industri ke sekolah dan kunjungan siswa ke perusahaan.
   
4. **Bursa Kerja & Karir**  
   - Info lowongan pekerjaan
   - Rekrutmen
   
5. **Kewirausahaan**  
   - Mencatat dan menampilkan usaha siswa/alumni.
   
6. **Laporan & Statistik**  
   - Menyediakan laporan dan analisis data terkait HUBIN.

---

## 🛠️ Teknologi yang Digunakan

- **Laravel** (PHP Framework)
- **MySQL** (Database Management System)
- **Admin LTE** (Template Dashboard)
- **Bootstrap & jQuery** (Frontend Styling)

---

## 📌 Cara Instalasi

1. **Clone repository ini**
   ```sh
   git clone https://github.com/Code4Zaaa/hubin-app.git
   cd hubin-app
   ```

2. **Install dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Buat file `.env` dan konfigurasi database**
   ```sh
   cp .env.example .env
   ```
   Edit `.env` sesuai dengan konfigurasi database MySQL kamu.

4. **Generate application key**
   ```sh
   php artisan key:generate
   ```

5. **Migrate database**
   ```sh
   php artisan migrate --seed
   ```

6. **Jalankan server lokal**
   ```sh
   php artisan serve
   ```
   Akses aplikasi di `http://127.0.0.1:8000`

---

## 🤝 Kontribusi

1. Fork repository ini.
2. Buat branch baru: `git checkout -b fitur-baru`
3. Commit perubahan: `git commit -m "Menambahkan fitur baru"`
4. Push ke branch: `git push origin fitur-baru`
5. Buat Pull Request.

---

## 📜 Lisensi

Proyek ini menggunakan lisensi **MIT**. Silakan gunakan dan kembangkan lebih lanjut.

---

Jika ada pertanyaan atau saran, silakan hubungi kami melalui email atau buat issue di repository ini! 🎉

