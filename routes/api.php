<?php


use Illuminate\Support\Facades\Route;
use PalauaAndSons\TagsField\Http\Controllers\TagsFieldController;

Route::get('/', [TagsFieldController::class, 'index']);
