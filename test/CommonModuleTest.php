<?php

namespace Papimod\Date\Test;

use Papi\enumerator\HttpMethod;
use Papi\PapiBuilder;
use Papi\Test\mock\FooGet;
use Papi\Test\PapiTestCase;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Routing\CommonModule;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CommonModule::class)]
final class CommonModuleTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("PAPI_DOTENV_DIRECTORY") || define("PAPI_DOTENV_DIRECTORY", __DIR__);
        defined("PAPI_DOTENV_FILE") || define("PAPI_DOTENV_FILE", ".test.env");
        $this->builder = new PapiBuilder();
        $this->builder->addModules(DotEnvModule::class);
    }

    public function testLoadModule(): void
    {
        $request = $this->createRequest(HttpMethod::GET, "/");

        $response = $this->builder
            ->addModules(CommonModule::class)
            ->addAction(FooGet::class)
            ->build()
            ->handle($request);

        $this->assertEquals("foo", (string) $response->getBody());
    }
}
