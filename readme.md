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
