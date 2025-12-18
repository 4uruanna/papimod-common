# Common Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Help configuring middlewares provided by Slim in your [papi](https://github.com/4uruanna/papi).

## Prerequisites Modules

- [Papimod/Dotenv](https://github.com/4uruanna/papimod-dotenv)

## Configuration

### `ALLOW_BODY_PARSING` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | int                                               |
|Description    | Allow [body parsing middleware](https://www.slimframework.com/docs/v4/middleware/body-parsing.html) |
|Default        | 1                                                 |

### `ALLOW_ROUTING` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | int                                               |
|Description    | Allow [routing middleware](https://www.slimframework.com/docs/v4/middleware/routing.html) |
|Default        | 1                                                 |

## Definitions

- [(middleware) BodyParsingMiddleware](./source/middleware/BodyParsingMiddleware.php)
- [(middleware) RoutingMiddleware](./source/middleware/RoutingMiddleware.php)

## Usage

### Module

You can add the following options to your  `.env` file:

```Env
ALLOW_ROUTING=1
ALLOW_BODY_PARSING=1
```

Import the module when creating your application:

```php
require __DIR__ . "/../vendor/autoload.php";

use Papi\PapiBuilder;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Common\CommonModule;
use function DI\create;

$builder = new PapiBuilder();

$builder
    ->setModule(
        DotEnvModule::class, # Prerequisite
        CommonModule::class
    )
    ->build()
    ->run();
```

### Custom implementation

You can also import only the items of your choice:

```php
require __DIR__ . "/../vendor/autoload.php";

use Papi\PapiBuilder;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Common\middleware\RoutingMiddleware;
use function DI\create;

$builder = new PapiBuilder();

$builder
    ->setMiddleware(RoutingMiddleware::class)
    ->build()
    ->run();
```