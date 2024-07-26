<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FiltroProduto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', FiltroProduto::class);
