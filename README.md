# cotizacion

crear archivo .htaccess con la siguiente configuracion

RewriteEngine On

# Some hosts may require you to use the `RewriteBase` directive.
# If you need to use the `RewriteBase` directive, it should be the
# absolute physical path to the directory that contains this htaccess file.
#
# RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]


el aplicativo esta configurado para correr bajo el directorio cotizacion
