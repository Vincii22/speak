
Serve Stored Files via a Symlink: If you haven't already, create a symbolic link for serving files from the public disk:

php artisan storage:link


chmod -R 775 storage
chmod -R 775 bootstrap/cache


composer require google/apiclient
composer require guzzlehttp/guzzle
