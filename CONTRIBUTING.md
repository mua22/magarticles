# Contribution Guide

Consistency is of paramount importance. To maintain consistency, please make sure you follow the following guidelines.

## Coding Style
Laravel follows the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard and the [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) autoloading standard.

## Project Specific
1. Every Frontend controller and view specific files will be in the **Frontend** namespace.
2. Every Backend controller and view specific files will be in the **Backend** namespace.
3. Every route should be **named route** and whenever you want to gernerate a URL, you should generate it by it's route name. ```{{route('backend.article.index')}}```
4. Handle all HTML forms natively. (Don't use laravelcollective/html package)

## Note
If you feel something is missing, please share.