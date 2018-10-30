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
use Causelabs\ResourceIndexLink\ResourceIndexLink;

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

## Workaround for Computed Fields
For [Computed Fields](https://nova.laravel.com/docs/1.0/resources/fields.html#computed-fields), Nova
does not pass the record ID, so we cannot build the resource URL for the link. In many cases, the simplest workaround is to add a mutator to your database model and reference that in your Nova Resource Model. For example, if you wanted to combine a first and last name into a single field, rather than using a Computed Field in Nova, you could do so like this:

```php
// app/User.php - Base Model
public function getFullNameAttribute()
{
    return $this->first_name . ' ' . $this->last_name;
}
```

```php
// app/Nova/User.php - Nova Resource Model
ResourceIndexLink::make('Full Name'),
```

In order to make that field sortable, you would need to modify the index query for the Nova Resource Model
```php
public static function indexQuery(NovaRequest $request, $query)
{
    $query->select('users.*, CONCAT(users.first_name, " ", users.last_name) AS full_name');

    return $query;
}
```