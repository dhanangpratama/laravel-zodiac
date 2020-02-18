# Zodiac
Laravel package to find Zodiac

## Installation
```
composer require dhanangpratama/laravel-zodiac
```

## Usage
```php
<?php

namespace App\Http\Controllers;

use Zodiac;

class WelcomeController extends Controller
{
    public function index()
    {
        return Zodiac::get('1990-02-06');
    }
}
```