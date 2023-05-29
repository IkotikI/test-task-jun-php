@echo on
rem pushd "C:\Development\Web\Projects\Junior Web Test App\server\php-8.2.6"
pushd "%~dp0\server\php-8.2.6"
rem start cmd.exe /k "php -v"
start cmd.exe /k "php -S localhost:4000 -t ^"../../public_html^""
start cmd.exe /k "php -S localhost:8080 -t ^"../phpmyadmin^""
popd