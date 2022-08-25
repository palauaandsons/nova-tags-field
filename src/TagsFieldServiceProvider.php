<?php

namespace PalauaAndSons\TagsField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class TagsFieldServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        Nova::serving(function () {
            Nova::script('nova-tags-field', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-tags-field', __DIR__.'/../dist/css/field.css');
        });
    }
}
