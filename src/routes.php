<?php

use Fcdniproua\Contacts\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', ContactsController::class);
