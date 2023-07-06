# Installation

Install the module using composer:

```bash
composer require clickrain/stratus-blitz-integration
```

Add the following to the `modules` section of your `config/app.php` file:

```php
'modules' => [
    // ...
    'stratus-blitz-integration' => \clickrain\stratus\blitz\Module::class,
],
```

Bootstrap the module by adding the following to the `bootstrap` section of your `config/app.php` file:

```php
'bootstrap' => [
    // ...
    'stratus-blitz-integration',
],
```
