# Laravel Nova Resource Index Field
An text input that displays as a link to a resource when indexed.

## Installation

Install the package into a Laravel app that uses [Nova](https://nova.laravel.com) with Composer:

```bash
composer require causelabs/resource-index-link
```

## Usage

Add the field to your resource in the ```fields``` method:
```php
use CauseLabs\ResourceIndexLink\ResourceIndexLink;

ResourceIndexLink::make('name')
    ->rules(/* ... */),
```

The field extends the `Laravel\Nova\Fields\Text` field, so all the usual methods are available.

### Options
#### Open in a new tab
Make the link open the resource in a new tab

```php
ResourceIndexLink::make('name')
    ->newTab(),
```
## Example
Make the resource name a link to the resource.

![Sample Index Page](docs/index_screenshot.png?raw=true "Title")