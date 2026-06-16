<?php

declare(strict_types=1);

namespace Componenta\Http\Psr7\Guzzle;

use GuzzleHttp\Psr7\HttpFactory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

final class ConfigProvider extends \Componenta\Config\ConfigProvider
{
    protected function getFactories(): array
    {
        return [
            HttpFactory::class => static fn(): HttpFactory => new HttpFactory(),
        ];
    }

    protected function getAliases(): array
    {
        return [
            RequestFactoryInterface::class => HttpFactory::class,
            ResponseFactoryInterface::class => HttpFactory::class,
            ServerRequestFactoryInterface::class => HttpFactory::class,
            StreamFactoryInterface::class => HttpFactory::class,
            UploadedFileFactoryInterface::class => HttpFactory::class,
            UriFactoryInterface::class => HttpFactory::class,
        ];
    }
}
