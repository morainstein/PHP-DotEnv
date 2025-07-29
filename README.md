# DotEnv Component
A simple way to use your environment variables in PHP

## Getting Started

```
composer require morainstein/dotenv
```

```php 
use Morainstein\DotEnv;

//You may also ommit the $envFilePath param, so it finds the .env in the working directory of application  
$dotenv = new DotEnv($envFilePath);

//Just simple as it looks!
$envValue = $dotenv->get('envKey')
```

## Recomendation
Load the DotEnv class in your bootstrap file, then use it everywhere in your application

