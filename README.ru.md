# Componenta HTTP PSR Guzzle

Интеграция Guzzle PSR-7 и PSR-17 для Componenta HTTP. Пакет регистрирует `GuzzleHttp\Psr7\HttpFactory` и назначает на него стандартные интерфейсы PSR-17.

## Установка

```bash
composer require componenta/http-psr componenta/http-psr-guzzle
```

## Что регистрирует пакет

`Componenta\Http\Psr7\Guzzle\ConfigProvider` регистрирует `HttpFactory` и псевдонимы:

- `RequestFactoryInterface`
- `ResponseFactoryInterface`
- `ServerRequestFactoryInterface`
- `StreamFactoryInterface`
- `UploadedFileFactoryInterface`
- `UriFactoryInterface`

## Граница пакета

Пакет только предоставляет конкретные фабрики. Связку создателя серверного запроса выполняет `componenta/http-psr`.
