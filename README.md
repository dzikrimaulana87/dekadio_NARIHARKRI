# Dekadio - Web-based Sign Language Learning Platform

Dekadio is a web-based platform designed to facilitate sign language learning using a gamified approach. This project is built on the CodeIgniter 4 framework.

This web-based sign language learning platform aims to provide quality and equitable access to sign language education for the wider community, particularly for our deaf and speech-impaired peers. The platform employs gamification strategies to make sign language learning more enjoyable and engaging. The gamification strategies include:

Educational Games: Utilizing educational games to teach the fundamentals of sign language, covering aspects such as letters, words, and sentences.

Achievements and Rewards: Users will receive achievements and rewards to enhance learning motivation and provide recognition for their progress.

Competitions: Periodic competitions will be organized to encourage users to enhance their sign language proficiency.

The goal is to create an inclusive and interactive learning experience that contributes to making sign language education accessible to a broader audience.

# contributors
Hacker<br>
Dzikri Maulana, 
Nadindra Maulana Aziz


Hipster<br>
Muhammad Hanif

Hustler<br>
Muhammad Rizqi Fadhilah

# Configuration <br>

please replace the **App/Controller/dekadio-firebase-adminsdk-env38-e696477d86.json** file with your own firebase configuration

*json for firebase realtime database:*

[JSON](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/blob/main/dekadio-default-rtdb-export%20(1).json)


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
    git clone https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/
    ```

2. Navigate to the project directory:

    ```bash
    cd dekadio_NARIHARKRI
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

## Screenshot Website
1. Home Page
![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/01b07068-fed3-4200-aa52-f703ac351010)
2. Modul Pembelajaran
![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/7efcbba5-654e-4f30-abe3-f36e8671cc9f)
3. Quiz
 - Level Page
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/11e858d4-d6a5-4e73-b936-125ffcbbb736)
 - Quiz question
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/c2e8f40c-6e3d-40b9-8464-585f461a58da)
 - If the answer is correct
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/b2488fb5-ddb3-48d4-92e6-b150673e6c31)
 - If the answer is incorrect
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/eb9fb7a2-877a-4ffa-9410-ed3b576a92ec)
 - Feedback
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/974f8305-1674-4ec5-baa7-c1fa008f70b2)
4. Video Pembelajaran
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/0db43b00-12f0-46fb-a73d-f1a0d69b5caf)

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
