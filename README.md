## Requirements
Çalışma ortamı bilgileri aşağıda yer almaktadır.
- Windows 10
- Mysql version: 5.7.33
- Php 8.1.6
- Apche 2.4.47
- Laragon 5

## Install
- Github üzerinden kodu klonlayın.
```php
git clone https://github.com/serdargulum7/case.git
```
- Yükleme tamamlanınca yüklenen klasörde Composer'ı update edin.
```php
composer update
```
- Ana dizindeki **.env.example** dosyasının ismini **.env** olarak değiştirin.
- **.env** dosyası içindeki mysql erişim bilgilerinizi güncelleyin ve  belirttiğiniz veritabanını oluşturun. 
- Konsolda aşağıdaki komutu çalıştrın.

```php
php artisan key:generate
```
- Veritabanını migrate edin.
```php
php artisan migrate
```
