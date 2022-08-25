<?php

use Illuminate\Support\Facades\Route;
use PalauaAndSons\TagsField\Http\Controllers\TagsFieldController;

Route::get('/nova-vendor/palauaandsons/nova-tags-field', TagsFieldController::class)->middleware(config('nova.api_middleware'));
