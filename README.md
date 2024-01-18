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

4. Serve the application:

    ```bash
    php spark serve
    ```

5. Visit `http://localhost:8080` in your browser to access Dekadio.

## Website screenshots
1. Registration
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/7d10a46b-b129-4c92-8540-8743ddfa446b)
2. Login
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/9260f813-f9b7-490b-aabf-d5e294abc5e2)
3. Home Page / Practice
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/0ce70283-c971-418a-8779-43fcbd1d9e6f)
4. Leaderboard
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/9c217eb3-109e-412a-95fe-9133725dabdd)
5. Course
   - Module
     ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/dc14cd83-4cfb-4af2-ae3d-9371574ba02b)
   - Video
     ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/43784b0c-735f-4fb8-9ac8-a4bea21491c5)
6. Profile
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/bccd7854-7213-4b5b-b324-33b6d060bcc9)
7. Quiz
 - Quiz question
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/9544f0ec-2970-415d-9f67-355787eb2f14)
 - If the answer is correct
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/c40ab69f-e256-4601-8d4d-4b8ed3272eea)
 - If the answer is incorrect
   ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/5e802835-a2ec-4aad-b540-792eb0139b2b)
8. Quiz Result
   - Complete
     ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/a762bf6c-b44d-4c1c-8899-8824f64d2a98)
   - Failed
     ![image](https://github.com/dzikrimaulana87/dekadio_NARIHARKRI/assets/107752721/d2290c54-d56e-4d2c-8d31-2849603dd509)

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
