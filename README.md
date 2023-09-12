[![My_x_Blog](https://lh3.googleusercontent.com/u/3/drive-viewer/AITFw-ydSqCU5UXLZFm8j80YeDuB-AwkKjyG-xcsWDCX7em0x72OmbvCR1WCjBf5cx8PU8cu9L6AtPG07X2AbhbhcEHr4ULF=w3840-h2017)](https://github.com/a-hakim)

## My_x_Blog

Minimal blog project made with Laravel 10 & Fillament 3

### Getting start

After setting up your .env file, run the following:

```
composer install
php artisan migrate --seed
php artisan storage:link
php artisan key:generate
npm run dev
```

### Default user

The admin user seeded with some initial dummy data

```
email: admin@admin.com
password: password
```

### Configs

List of preset configs that you can use to customize the blog


| key            | value                       |
| ---------------- | ----------------------------- |
| name           | My_x_Blog                   |
| header         | This is my blog header      |
| subheader      | This is my blog subheader   |
| description    | This is my blog description |
| footer         | This is my blog footer      |
| author         | My Name                     |
| email          | myname@email.com            |
| link_facebook  | https://facebook.com        |
| link_twitter   | https://twitter.com         |
| link_instagram | https://instagram.com       |
| link_linkedin  | https://linkedin.com        |
| color_theme    | #ff6600                     |
| logo_image     | null                        |
| icon_image     | null                        |
| keywords       | My_x_blog, keywords,        |
| hero_image     | null                        |
| hero_bg_image  | null                        |
