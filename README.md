# document store web application

## tech stack

Laravel + bootstrap + postgreSQL

File encryption / decryption in Laravel: https://github.com/soarecostin/file-vault
use return response()->download($pathToFile)->deleteFileAfterSend(true) to delete decrypted file after users view or download file