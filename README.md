# Componenta HTTP PSR Guzzle

Guzzle PSR-7 and PSR-17 integration for Componenta HTTP. The package registers `GuzzleHttp\Psr7\HttpFactory` and aliases the standard PSR-17 interfaces to it.

## Installation

```bash
composer require componenta/http-psr componenta/http-psr-guzzle
```

## Registered Services

`Componenta\Http\Psr7\Guzzle\ConfigProvider` registers `HttpFactory` and aliases:

- `RequestFactoryInterface`
- `ResponseFactoryInterface`
- `ServerRequestFactoryInterface`
- `StreamFactoryInterface`
- `UploadedFileFactoryInterface`
- `UriFactoryInterface`

## Boundary

This package only supplies concrete factories. Use `componenta/http-psr` for server request creator wiring.
