# PHP Api for Simply Suggest

## Requirements

PHP 5.3 with curl support or later

## Installation

First download the latest release from [github](https://github.com/SimplySuggest/simply_suggest_php/archive/master.zip)

```php
require_once '/path/to/simply_suggest_php/init.php';
```

## Usage

Basic usage looks like this

```php
\SimplySuggest\SimplySuggest::getInstance()->setPrivateKey("secret-2")->setPublicKey("public-2");

$user    = new \SimplySuggest\User(1);
$objects = $user->loadRecommendations();

$user    = new \SimplySuggest\Object(1, "article");
$objects = $user->loadRecommendations();
```

## Documentation

To get more information about the Simply Suggest Api, head over to the [documentation](https://www.simply-suggest.com/en/documentation)