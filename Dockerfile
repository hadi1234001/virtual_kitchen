# استخدم PHP 8.2 مع Apache
FROM php:8.2-apache

# تثبيت ملحقات PHP المطلوبة
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev

# تثبيت Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# نسخ المشروع
COPY . /var/www/html

# تعيين مجلد العمل
WORKDIR /var/www/html

# تثبيت مكتبات PHP
RUN composer install --no-dev --optimize-autoloader

# إعداد صلاحيات التخزين والـ cache
RUN chown -R www-data:www-data storage bootstrap/cache

# تفعيل Rewrite لمودول Apache
RUN a2enmod rewrite

# فتح البورت 10000 (Render يستخدم PORT الافتراضي)
EXPOSE 10000

# أمر بدء الخدمة
CMD ["apache2-foreground"]
