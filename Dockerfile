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

# تثبيت امتدادات PHP للـ Database
RUN docker-php-ext-install pdo pdo_mysql

# تثبيت Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# نسخ المشروع
COPY . /var/www/html

# تعيين مجلد العمل
WORKDIR /var/www/html

# تفعيل Rewrite لمودول Apache
RUN a2enmod rewrite

# تعيين DocumentRoot إلى مجلد public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# تثبيت مكتبات PHP الخاصة بالـ Laravel
RUN composer install --no-dev --optimize-autoloader

# إعداد صلاحيات التخزين و bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# فتح البورت 10000 (Render يستخدم PORT الافتراضي)
EXPOSE 10000

# أمر بدء الخدمة
CMD ["apache2-foreground"]
