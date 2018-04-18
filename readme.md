## What is this?

This is a website for booking tickets to a LAN event.

##### Status

| Branch  | Master                                                                                                                    | pixelity                                                                                                                    |
|---------|---------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------|
| Travis  | [![Build Status](https://travis-ci.org/mirorauhala/tickets.svg?branch=master)](https://travis-ci.org/mirorauhala/tickets) | [![Build Status](https://travis-ci.org/mirorauhala/tickets.svg?branch=pixelity)](https://travis-ci.org/mirorauhala/tickets) |
| StyleCI | [![StyleCI](https://styleci.io/repos/129506361/shield?branch=master)](https://styleci.io/repos/129506361)                 | [![StyleCI](https://styleci.io/repos/129506361/shield?branch=pixelity)](https://styleci.io/repos/129506361)                 |


## Why?

At [PIXELITY](https://pixelity.fi) we needed an ecommerce solution for selling tickets online with specific requirements.

- Payments via Finnish bank transfer
- Simple ticket generation and sale
- Seat reservation for certain ticket types.

I also made this for my own curiosity in web development.

## Installation

To install this you need the following.

- PHP 7.1 / 7.2
- Database (MySQL/MariaDB/PostgreSQL)
- Nginx
- [Composer](https://getcomposer.org)

### Steps to install

1. Clone the project master.
2. Install dependencies by running `composer install`
3. Open .env file in the project root and change database configs.
4. Run `php artisan migrate` to run database migrations.

## Contributing

If you want, you can! Just send in an issue or pull request.

## Built on

Laravel 5.6 & Bootstrap 4

## License

This project is licensed under [MIT license](http://opensource.org/licenses/MIT).
