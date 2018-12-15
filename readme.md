# blog

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is a very simple package to support blogging functionality in any web application built on Laravel Framework. If you're interested in contributing, then please take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require itsl/blog:"dev-master"
```

## Usage

``` bash
$ php artisan vendor:publish --provider="itsl\blog\blogServiceProvider"
$ php artisan make:auth
$ php artisan migrate
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Requirements

This package has been developed on Laravel 5.7 and has yet not been tested with the older versions

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Neelam Soni](https://github.com/dev-neelam)

## License

GNU 3.0+. Please see the [license file](https://github.com/dev-neelam/itsl-blog/blob/master/LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/itsl/blog.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/itsl/blog.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/itsl/blog/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/itsl/blog
[link-downloads]: https://packagist.org/packages/itsl/blog
[link-travis]: https://travis-ci.org/itsl/blog
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/dev-neelam
[link-contributors]: ../../contributors]
