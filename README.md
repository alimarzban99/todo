<p align="center">
<a href="https://www.karlancer.com" target="_blank">
<img src="https://www.karlancer.com/blog/wp-content/uploads/2022/07/Background-3.png" width="400" alt="Laravel Logo">
</a></p>

## KarLancer Test Project Installation

Clone the repository-
```
git clone https://github.com/alimarzban99/todo.git
```

Then cd into the folder with this command-
```
cd todo
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todo` and then do a database migration using this command-
```
php artisan migrate
```

Then change permission of storage folder using thins command-
```
(sudo) chmod 777 -R storage
```








