# Dekadio - Web-based Sign Language Learning Platform

Dekadio is a web-based platform designed to facilitate sign language learning using a gamified approach. This project is built on the CodeIgniter 4 framework.

:warning: *Warning*

**Attention**: For the time being, the only feature available is the *quiz* feature. User authentication is not yet implemented, and developers currently still use cache/session for session management. Please note that this is a development version and some features may not be fully functional yet.

**Important Note**: All questions have not been implemented in real-time. The correct answer for each question is always the first option.

## System Requirements

- PHP 7.2.5 or newer
- Composer
- Web server (example: Apache or Nginx)


## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/dekadio.git
    ```

2. Navigate to the project directory:

    ```bash
    cd dekadio
    ```

3. Install dependencies using Composer:

    ```bash
    composer install
    ```

4. Copy the `.env` file:

    ```bash
    cp env.example .env
    ```

5. Serve the application:

    ```bash
    php spark serve
    ```

6. Visit `http://localhost:8080` in your browser to access Dekadio.

## Usage

- Register and log in to access the learning materials.
- Complete quizzes to advance to higher levels.
- Enjoy a gamified learning experience tailored for sign language comprehension.

## Contributing

If you'd like to contribute to Dekadio, please fork the repository, create a new branch, make your changes, and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.



# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning**
> The end of life date for PHP 7.4 was November 28, 2022. If you are
> still using PHP 7.4, you should upgrade immediately. The end of life date
> for PHP 8.0 will be November 26, 2023.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
