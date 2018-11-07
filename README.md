# A tags field for Nova apps

This package contains a Nova field to add tags to resources. Under the hood it uses the [cartalyst/tags](https://cartalyst.com/manual/tags) package.

This package is based on [spatie/nova-tags-field](https://github.com/spatie/nova-tags-field). All credit to [Spatie](https://spatie.be)'s team.

## Installation

First you must install [cartalyst/tags](https://github.com/cartalyst/tags) into your Laravel app. Here are [the installation instructions](https://cartalyst.com/manual/tags#installation) for that package.

Next, you can install this package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require palauaandsons/nova-tags-field
```

## Usage

To make an Eloquent model taggagle add the `\Cartalyst\Tags\TaggableTrait` trait and implement the `\Cartalyst\Tags\TaggableInterface` interface:

```php
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model implements TaggableInterface
{
    use TaggableTrait;
    
    ...
}
```

Next you can use the `PalauaAndSons\TagsField\Tags` field in your Nova resource:

```php
namespace App\Nova;

use PalauaAndSons\TagsField\Tags;

class BlogPost extends Resource
{
    // ...
    
    public function fields(Request $request)
    {
        return [
            // ...
            
            Tags::make('Tags'),

            // ...
        ];
    }
}
```

Now you can view and add tags on the blog posts screen in your Nova app. 

## Limiting suggestions

By default a tags field will display a maximum of 5 suggestions when typing into it. If you don't want to display any suggestions, tag on `withoutSuggestions()`.

```php
Tags::make('Tags')->withoutSuggestions(),
```

You can change the number of suggestions with `limitSuggestions()`.

```php
Tags::make('Tags')->limitSuggestions($maxNumberOfSuggestions),
```

## Allowing only one tag

If the user is only allowed to select one tag for your resource you can call the `single` method.

```php
// in your Nova resource

public function fields(Request $request)
{
    return [
        // ...
        
        Tags::make('Tags')->single(),

        // ...
    ];
}
```

The field will be rendered as a select form element. It will be populated by the names of the tags already saved.

## Working with tags

For more info on how to work with the saved tags, head over to [the docs of cartalyst/tags](https://cartalyst.com/manual/tags#usage).

## Administering tags in Nova

If you want to perform crud actions on the save tags, just create a Nova resource for it. Here's an example.

```php
namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Cartalyst\Tags\IlluminateTag as TagModel;

class Tag extends Resource
{
    public static $model = TagModel::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Namespace')->sortable()->hideWhenUpdating(),
            Text::make('Name')->sortable(),
            Text::make('Slug')->sortable(),
        ];
    }
}
```

### Testing

``` bash
phpunit
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email isern@palauaandsons.com instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [Spatie](https://spatie.be)
- [Isern Palaus](https://github.com/ipalaus)

The Vue components that render the tags are based upon the tag Vue components created by [Adam Wathan](https://twitter.com/adamwathan) as shown in [his excellent Advanced Vue Component Design course](https://adamwathan.me/advanced-vue-component-design/).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
