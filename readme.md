# Twitch Events
Twitch Events is just a quick project to create events and allow users to sign up with their Twitch account.

It doesn't have very many features, as it's core idea was just to have a headcount of who would want to attend to the events, but eventually more features will be added.

## Requirements
The following things are required for setting this up:
- [Laravel's requirements](https://laravel.com/docs/5.2/installation#server-requirements)
- [A database system that Laravel supports](https://laravel.com/docs/5.2/database#introduction)
- [Composer](https://getcomposer.org/)

## Setup
- Rename `.env.example` to `.env`, database information and Twitch application information is the most important.
    - You can create a Twitch application here: https://www.twitch.tv/settings/connections. The redirect URL has to be `http://example.com/auth/twitch/callback` (where `example.com` is **your domain**) and needs to be set the same under `TWITCH_REDIRECT_URI` in the `.env` file.
    - If you want to modify `TIMEZONE`, then it has to be a [timezone name that PHP supports](https://secure.php.net/manual/en/timezones.php).
- Open the project directory via the command-line, e.g: `cd /var/www/Twitch-Events`
    - Run `composer install` to install all the dependencies.
    - Run `php artisan key:generate` to generate the application key.
    - Run database migrations using `php artisan migrate`.
- Login with Twitch via the webpage.
    - **Admin access**: As a proper method has not been added yet, you have to log in first and manually edit the `users` table in your database.
        - Find the user(s) you wish to make an admin, and set the `admin` column to `1`.

## License
[MIT License](LICENSE)
