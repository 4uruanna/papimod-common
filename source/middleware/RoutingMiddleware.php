<?php

namespace Papimod\Common\middleware;

use Papi\interface\PapiMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;

final class RoutingMiddleware implements PapiMiddleware
{
    public static function register(App $app, array &$middlewares_map): bool
    {
        $app->addRoutingMiddleware();
        return true;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}
