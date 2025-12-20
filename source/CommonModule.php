<?php

namespace Papimod\Common;

use Papi\PapiModule;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Common\middleware\BodyParsingMiddleware;
use Papimod\Common\middleware\RoutingMiddleware;

final class CommonModule extends PapiModule
{
    public static function getPrerequisites(): array
    {
        return [DotEnvModule::class];
    }

    public static function getMiddlewares(): array
    {
        $middlewares = [];

        if (PAPI_ALLOW_BODY_PARSING) {
            $middlewares[] = BodyParsingMiddleware::class;
        }

        if (PAPI_ALLOW_ROUTING) {
            $middlewares[] = RoutingMiddleware::class;
        }

        return $middlewares;
    }

    /**
     * Configure the module
     */
    public static function configure(): void
    {
        if (defined("PAPI_ALLOW_ROUTING") === false) {
            $disabled = (int) ($_ENV["ALLOW_ROUTING"] ?? 1);
            define("PAPI_ALLOW_ROUTING", $disabled);
        }

        if (defined("PAPI_ALLOW_BODY_PARSING") === false) {
            $disabled = (int) ($_ENV["ALLOW_BODY_PARSING"] ?? 1);
            define("PAPI_ALLOW_BODY_PARSING", $disabled);
        }
    }
}
