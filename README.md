# About Laravel

<!-- Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

on a utilisé Laravel pour creer un MINI-CRM qui relie une entreprise à ses employés, et installer auth UI bootstrap pour creer un design simple et propre.

Nous avons employé Laravel pour élaborer un MINI-CRM et intégré Auth UI Bootstrap pour concevoir une interface simple et épurée.

Nous avons utilisé Laravel pour élaborer un MINI-CRM et intégré Auth UI Bootstrap pour concevoir un design simple et propre. -->

Nous avons utilisé Laravel pour créer un MINI-CRM qui relie une entreprise à ses employés, Et installé Laravel UI Bootstrap pour concevoir un design simple et propre.

prérequis : PHP >= 8.1 | node v16.14.0 

## Sommaire

- Configuration du projet .
- Configuration de la base de données .
- Configuration SMTP (utilisation de [Mailtrap](https://mailtrap.io/) - dev environment) .
- Testing .
- Notes .
<!-- - [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting). -->


## Configuration du projet

- Clone GitHub repo
`` git clone linktogithubrepo.com/ projectName `` , cd Into It.
```console
# git clone linktogithubrepo.com/ miniCRM
# cd miniCRM
```
- Install Composer Dependencies
```console
# composer install
```
- Install NPM Dependencies
```console
# npm install
```
<!-- Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch. -->
<!-- 
If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library. -->

## Configuration de la base de données.
- run mysql
- .env file

Créez une nouvelle base de données``crm_db`` dans phpmyadmin et entrez les détails de la base de données dans le fichier .env comme indiqué ci-dessous.
```code 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crm_db
DB_USERNAME=root
DB_PASSWORD=
```
- Generate an app encryption key.

```console
# php artisan key:generate
```

- Migrate the database.
```console
# php artisan migrate
```

- Seed the database.
```console
# php artisan db:seed
```

## Configuration SMTP (utilisation de Mailtrap - dev environment) 
- accéder à [mailtrap](https://mailtrap.io/) et inscrivez-vous.

- vous pouvez choisir le plan gratuit pour tester la partie mail dans l'application.


- choisir laravel 7 +
- mettre le code donnee dans le fichier .env
```code 
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=67d3604dd2cd5d
MAIL_PASSWORD=d7f83ce409d2a7
MAIL_ENCRYPTION=tls
```

<!-- 
### - Run Seeders: Users(Admin/Employe) & Companies 🎯
### - Run Seeders: Users(Admin/Employe) & Companies 🎯
We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
<!-- - **[DevSquad](https://devsquad.com)** 
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)** -->

## Testing
#### Pour finaliser tout cela, exécutez les commandes suivantes sur votre terminal :

```console
# npm run dev
```

```console
# php artisan server
```
Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


