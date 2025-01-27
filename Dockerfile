# Usa la imagen base oficial de PHP con el servidor FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala Composer (gestor de dependencias de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia el archivo composer.json y composer.lock para instalar dependencias
COPY composer.json composer.lock ./

# Instala las dependencias de PHP especificadas en composer.json
RUN composer install --optimize-autoloader --no-dev

# Instala Node.js y NPM para el manejo de recursos front-end
RUN apt-get install -y nodejs npm \
    && npm install

# Compila los assets front-end si es necesario (como con Laravel Mix)
RUN npm run build

# Copia todo el código fuente de Laravel al contenedor
COPY . .

# Establece los permisos adecuados para los directorios de almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 8000 para la aplicación Laravel
EXPOSE 8000

# Comando para iniciar la aplicación Laravel (usar Artisan para servir)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
