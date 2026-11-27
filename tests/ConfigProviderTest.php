<?php

declare(strict_types=1);

namespace Componenta\Http\Psr7\Guzzle\Tests;

use Componenta\Config\ConfigFactory;
use Componenta\Config\Environment;
use Componenta\DI\ContainerFactory;
use Componenta\Http\Psr7\Guzzle\ConfigProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

final class ConfigProviderTest extends TestCase
{
    public function testCreatesEveryPsr17ServiceThroughConfigurationAndDi(): void
    {
        $composition = (new ConfigFactory())->create(new Environment([]), new ConfigProvider());
        $container = (new ContainerFactory())->create($composition->config, $composition->dependencies);

        self::assertSame('POST', $container->get(RequestFactoryInterface::class)->createRequest('POST', '/orders')->getMethod());
        self::assertSame(202, $container->get(ResponseFactoryInterface::class)->createResponse(202)->getStatusCode());
        self::assertSame('PUT', $container->get(ServerRequestFactoryInterface::class)->createServerRequest('PUT', '/orders')->getMethod());
        $stream = $container->get(StreamFactoryInterface::class)->createStream('abc');
        self::assertSame('abc', (string) $stream);
        $upload = $container->get(UploadedFileFactoryInterface::class)->createUploadedFile($stream, 3, UPLOAD_ERR_OK, 'sample.txt');
        self::assertSame('sample.txt', $upload->getClientFilename());
        self::assertSame('abc', (string) $upload->getStream());
        self::assertSame('/orders', $container->get(UriFactoryInterface::class)->createUri('/orders')->getPath());
    }
}
