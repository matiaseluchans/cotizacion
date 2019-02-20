# el aplicativo esta configurado para correr bajo el directorio cotizacion

crear archivo .htaccess con la siguiente configuracion

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]



