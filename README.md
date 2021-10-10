# document store web application

## tech stack

Laravel + bootstrap + postgreSQL

-Instead of using 'php artisan make:auth', manuelly write user authentication

-Use Mailtrap.io for email verification

-File encryption / decryption in Laravel: https://github.com/soarecostin/file-vault

-Use return response()->download($pathToFile)->deleteFileAfterSend(true) to delete decrypted file after users view or download file

-Introduce ckeditor for description textarea