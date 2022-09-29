<?php

namespace PalauaAndSons\TagsField\Tests;

use Cartalyst\Tags\TagsServiceProvider;
use Illuminate\Support\Facades\{Gate, Route};
use Orchestra\Testbench\TestCase as Orchestra;
use PalauaAndSons\TagsField\TagsFieldServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            TagsServiceProvider::class,
            TagsFieldServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $path = \realpath(__DIR__.'/../vendor/cartalyst/tags/resources/migrations/2014_10_29_202547_migration_cartalyst_tags_create_tables.php');

        $this->artisan('migrate:fresh', ['--realpath' => true, '--path' => $path]);
    }
}
