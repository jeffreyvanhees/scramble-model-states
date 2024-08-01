# Spatie Model States support for Scramble (Laravel OpenAPI (Swagger) Documentation Generator)
This package adds support for [laravel-model-states](https://github.com/spatie/laravel-model-states) to [dedoc/scramble](https://github.com/dedoc/scramble) by providing an extension. After installing the extension, all possible states are added as possible values to the response body, like Scramble does with an enum.


![Screenshot_2024-08-01_at_11 02 47](https://github.com/user-attachments/assets/54c27db5-54ef-4f03-a79d-a08788425725)

![Screenshot_2024-08-01_at_11 02 20](https://github.com/user-attachments/assets/c8126ff7-8fab-43bd-9e59-cb4a6ee17d3a)


## Installation
Install the extention with composer via `composer require jeffreyvanhees/scramble-model-states`

## Usage
Add the extenstion to `config/scramble.php`:

```php
<?php

return [

    // ...

    'extensions' => [
       \JeffreyVanHees\ScrambleModelStates\ModelStateToSchema::class
    ],
];
