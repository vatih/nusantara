# 🇮🇩 Nusantara API - Data Wilayah Indonesia

[![Deploy to GitHub Pages](https://github.com/vatih/nusantara/actions/workflows/deploy.yml/badge.svg)](https://github.com/vatih/nusantara/actions/workflows/deploy.yml)

Pusat data wilayah administratif Indonesia (Provinsi, Kota/Kabupaten, Kecamatan, dan Kelurahan) yang disajikan dalam bentuk **Static REST API**. Proyek ini dikelola dan diperbarui secara otomatis menggunakan infrastruktur GitHub Actions.

**📍 Live Demo & API Endpoint:**  
[https://vatih.github.io/nusantara/](https://vatih.github.io/nusantara/)

---

## 🚀 Keunggulan
- **Tanpa Database**: Seluruh data disajikan lewat file JSON statis.
- **Blazing Fast**: Performa maksimal karena hanya menyajikan file statis dari GitHub CDN.
- **Otomatis**: Cukup update file CSV di folder `data/`, sistem akan men-generate API secara otomatis.
- **Developer Friendly**: Mudah diintegrasikan ke aplikasi web, mobile, maupun backend.

## 🛠️ Cara Kerja
1.  **Sumber Data**: Daftar wilayah disimpan dalam format `.csv` di folder `/data`.
2.  **Generator**: Script `generate.php` mengubah CSV menjadi ribuan file JSON yang terstruktur.
3.  **CI/CD**: Menggunakan GitHub Actions untuk memproses data setiap kali ada perubahan data (push ke master).

## 📡 Endpoints (Contoh Penggunaan)

### 1. Daftar Provinsi
`GET https://vatih.github.io/nusantara/api/provinces.json`

### 2. Daftar Kota/Kabupaten (berdasarkan ID Provinsi)
`GET https://vatih.github.io/nusantara/api/regencies/{province_id}.json`
*Contoh (Jawa Barat):* `api/regencies/32.json`

### 3. Daftar Kecamatan (berdasarkan ID Kota)
`GET https://vatih.github.io/nusantara/api/districts/{regency_id}.json`
*Contoh (Kota Depok):* `api/districts/3276.json`

### 4. Daftar Kelurahan (berdasarkan ID Kecamatan)
`GET https://vatih.github.io/nusantara/api/villages/{district_id}.json`
*Contoh (Cimanggis):* `api/villages/3276040.json`

---

## 👨‍💻 Kontribusi
Jika Anda menemukan data yang kurang akurat atau ingin menambahkan kelurahan baru (seperti Kelurahan Tugu yang baru saja ditambahkan), silakan buka **Pull Request** atau edit langsung file CSV pada branch `master`.

Maintained with ❤️ by **[Ibrahim Vatih](https://github.com/vatih)**
