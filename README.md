# Cometcast OpenAPI Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cometcast/php-sdk-laravel.svg?style=flat-square)](https://packagist.org/packages/cometcast/php-sdk-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/cometcast/php-sdk-laravel.svg?style=flat-square)](https://packagist.org/packages/cometcast/php-sdk-laravel)
![GitHub Actions](https://github.com/cometcast/php-sdk-laravel/actions/workflows/main.yml/badge.svg)

這是一個為 Laravel 框架設計的 Cometcast OpenAPI SDK 套件，提供 OIDC 認證功能。

## 安裝

透過 Composer 安裝套件：

```bash
composer require cometcast/php-sdk-laravel
```

## 發布配置檔案

發布套件配置檔案到您的應用程式：

```bash
php artisan vendor:publish --provider="Cometcast\OpenApi\Laravel\PhpSdkLaravelServiceProvider" --tag="config"
```

這會在 `config/cometcast-openapi.php` 建立配置檔案。

## 環境變數設定

在您的 `.env` 檔案中設定以下 OIDC 相關環境變數：

```env
# OIDC 客戶端 ID
COMETCAST_OPENAPI_CLIENT_ID=your_client_id

# OIDC 重導向 URI
COMETCAST_OPENAPI_REDIRECT_URI=your_redirect_uri

# OIDC 客戶端密鑰
COMETCAST_OPENAPI_CLIENT_SECRET=your_client_secret

# OIDC 認證伺服器基礎 URL
COMETCAST_OPENAPI_AUTH_BASEURL=https://your-auth-server.com

# OIDC 授權範圍
COMETCAST_OPENAPI_SCOPES=openid,profile,email

# SSL 驗證設定（開發環境可設為 false）
COMETCAST_OPENAPI_SSL_VERIFY=true
```

## 使用方式

## OIDC 登入URL 示範  (Controller)
```php
use Cometcast\Openapi\OpenIdProvider;

public function index(OpenIdProvider $oidcProvider)
{
    $provider->setPkceCode('pkce-code');
    
    $url = $provider->getAuthorizationUrl('authorization_code', [
        'ui_locales' => 'zh_TW'     // 指定語系
    ]);
    
    return redirect()->to($url);
}
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email slps970093@gmail.com instead of using the issue tracker.

## Credits

-   [Chou, Yu-Hsien](https://github.com/cometcast)
-   [All Contributors](../../contributors)

## License

The Apache License 2. Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
