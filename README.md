# twitch-response-bundle
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mrgoodbytes8667/twitch-response-bundle?style=flat)](https://packagist.org/packages/mrgoodbytes8667/twitch-response-bundle)
[![Packagist Version](https://img.shields.io/packagist/v/mrgoodbytes8667/twitch-response-bundle?style=flat)](https://packagist.org/packages/mrgoodbytes8667/twitch-response-bundle)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/twitch-response-bundle/release?style=flat&label=stable)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/mrgoodbytes8667/twitch-response-bundle/tests?style=flat)
![Packagist License](https://img.shields.io/packagist/l/mrgoodbytes8667/twitch-response-bundle?style=flat)    
A Symfony bundle for Twitch API Response objects and enums

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
$ composer require mrgoodbytes8667/twitch-response-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require mrgoodbytes8667/twitch-response-bundle
```
Note: this bundle depends on the [Enum-Serializer-Bundle](https://github.com/mrgoodbytes8667/enum-serializer-bundle) as well, but Flex should take care of this for you.

#### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Bytes\EnumSerializerBundle\BytesEnumSerializerBundle::class => ['all' => true],
    Bytes\TwitchResponseBundle\BytesTwitchResponseBundle::class => ['all' => true],
];
```
Note: this bundle depends on the [Enum-Serializer-Bundle](https://github.com/mrgoodbytes8667/enum-serializer-bundle) and [setup instructions](https://github.com/mrgoodbytes8667/enum-serializer-bundle/blob/main/README.md#applications-that-dont-use-symfony-flex) for it must be followed as well.

## License
[![License](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)]("http://creativecommons.org/licenses/by-nc/4.0/)  
twitch-response-bundle by [MrGoodBytes](https://www.goodbytes.live) is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](http://creativecommons.org/licenses/by-nc/4.0/).  
Based on a work at [https://github.com/mrgoodbytes8667/twitch-response-bundle](https://github.com/mrgoodbytes8667/twitch-response-bundle).