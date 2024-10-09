# Menggunakan image dasar
FROM php:8.0-apache

# Menyalin semua file dari direktori saat ini ke dalam image
COPY . /var/www/html/

# Mengatur direktori kerja
WORKDIR /var/www/html
