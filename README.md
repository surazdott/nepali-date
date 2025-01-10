# Laravel Nepali Date

<p align="center">
    <img src="https://raw.githubusercontent.com/surazdott/nepali-date/main/art/image.png" width="600" alt="Laravel Nepali Date">
    <p align="center"><a href="https://github.com/surazdott/nepali-date/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/surazdott/nepali-date/tests.yml?branch=main&label=tests&style=round-square"></a> <a href="https://packagist.org/packages/surazdott/nepali-date"><img alt="Latest Version" src="https://img.shields.io/packagist/v/surazdott/nepali-date"></a> <a href="https://www.codefactor.io/repository/github/surazdott/nepali-date"> <img alt="CodeFactor" src="https://www.codefactor.io/repository/github/surazdott/nepali-date/badge"></a> <a href="https://packagist.org/packages/surazdott/nepali-date"><img alt="License" src="https://img.shields.io/github/license/surazdott/nepali-date"></a>
    </p>
</p>

## Introduction
Laravel Nepali Date package is a package integrates seamlessly with Laravel, allowing developers to effortlessly manage date conversions according to the Nepali calendar system.

## Installation
You can install the package via composer. Run the following command in your terminal:

```bash
composer require surazdott/nepali-date
```

## Basic usages
Laravel will automatically discover this package. Hence, you don't need to add the service provider manually. It supports Nepali dates up to 2100 BS.

Let's look at a simple example using Facade:

```php
use Carbon\Carbon;
use NepaliDate\Facades\NepaliDate;

NepaliDate::create(Carbon::now())->toBS(); // 2080-12-20
NepaliDate::create(Carbon::now())->toFormattedBSDate(); // 21 Chaitra 2080, Wednesday
NepaliDate::create(Carbon::now())->toFormattedNepaliDate(); // २१ चैत २०८०, बुधवार
```

Using Carbon Macroable Trait:

```php
$user->created_at->toBS(); // 2080-12-20
$user->created_at->toFormattedNepaliDate(); // २१ चैत २०८०, बुधवार
```

## Format Specifiers
Here are some commonly used format specifiers.
- `Y` - Year in four digits (2080)
- `m` - Month in digit (12)
- `F` - Month in full name (January/बैशाख)
- `d` - Day in digit
- `l` - Day in full name (Sunday/आइतबार)

```php
NepaliDate::create(Carbon::now())->toNepaliFormat('Y-m-d'); // २०८०-१२-२१
NepaliDate::create(Carbon::now())->toBSformat('d F Y'); // 21 Chaitra 2080
```

## Testing

```bash
composer test
```

## Contributing
If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request. Contributions are welcome!

## License
This package is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).
