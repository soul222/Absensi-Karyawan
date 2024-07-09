<div align="center">
    

<h1 style="font-weight:900" align="center">Attendance System</h1>

![underconstruction][underconstruction]
<br />

</div>

## ✨ Apasih E-Attend Itu? ✨

E-Attend Sebuah sistem infromasi untuk memantau kehadiran karyawan pada perusaaan PT. Godrej Indonesia. Aplikasi ini menyajikan seluruh data karyawan, hak akses karyawan, permohonan izin ata sakit, kehadiran karyawan dll. 

### 🚀 Fitur Utama E-Attend

Aplikasi ini mampu menyajikan seluruh data karyawan, hak akses karyawan, permohonan izin atau sakit, kehadiran karyawan, melihat lokasi kehadian karyawan dan lain-lain. Berikut fitur utamannya.

-   **Pemantauan Kehadiran**: Memungkinkan manajer untuk memantau kehadiran harian karyawan
-   **Permohonan Izin dan Sakit** : Karyawan dapat mengajukan izin atau permohonan sakit secara online.
-   **Manajemen Hak Akses** : Mengatur hak akses dan peran karyawan dalam sistem.
-   **Laporan Kehadiran** : Menyediakan laporan kehadiran bulanan dan tahunan.
-   **Integrasi dengan Sistem HR**: Terintegrasi dengan sistem HR perusahaan untuk sinkronisasi data karyawan.
-   **Antarmuka User-Friendly**: Antarmuka yang mudah digunakan dan diakses oleh semua karyawan.

### ⚙️ Teknologi yang dipakai dalam Pengembangan

-   Tech :

    ![javascript][javascript]
    ![PHP][PHP]
    ![HTML][HTML]
    ![CSS][CSS]
    ![Laravel][Laravel]
    
-   Database :

    [![MySQL][MySQL]][MySQL-url]
    
## 📙 Panduan Penggunaan 📙

### 📝 Prerequisites

-   PHP 8.1
-   Laravel 10

### 👣 Langkah Instalasi

1.  Buatlah database workers_attendance & Import Database

    Untuk struktur database dapat kamu unduh di [sini](workers_attendance.sql)


2.  Masuk folder laravel-absensi

    Untuk masuk ke dalam folder laravel-absensi, kamu perlu menjalankan perintah:

    ```
    cd laravel-absensi
    ```

3.  Instalasi package

    Untuk menginstall package, kamu perlu menjalankan perintah:

    ```
    composer install
    ```

4. Menjalankan aplikasi

    Untuk menjalankan aplikasi di perangkat, jika kamu tdak mau mengimport databsenya setelah membuat databasenya. kamu hanya perlu menjalankan perintah:

    ```
    php artisan migrate
    ```
    ```
    php artisan db:seed --class=DatabaseSeeder
    ```
    ```
    php artisan serve
    ```
5. Untuk mulai menggunakan aplikasi kita kamu dapat mengunjungi [http:/localhost:8000](http:/localhost:8000)

## 📙 Referensi

Berikut adalah beberapa referensi yang dipakai:

-   [Laravel](https://laravel.com/docs/)
-   [PHP]([https://nodejs.org/en](https://www.php.net/)


## Jangan Lupa Mampir

[![instagram][instagram]](https://www.instagram.com/sultan_amirulmukminin/)


<!-- MARKDOWN LINKS & IMAGES -->
[MySQL-url]: https://www.mysql.com/
[MySQL]: https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white
[javascript]: https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black
[instagram]: https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white
[underconstruction]: https://img.shields.io/badge/Status-FinalStableRelease-FFFF00?style=for-the-badge&logoColor=FFFF00
[website]: https://img.shields.io/badge/Live_Demo-000000?style=for-the-badge&logo=About.me&logoColor=white
[PHP]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[JavaScript]: https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black
[HTML]: https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white
[CSS]: https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white
[Laravel]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
