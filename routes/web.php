<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/features', 'pages.features')->name('features');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/pricing', 'pages.pricing')->name('pricing');
Route::view('/example', 'pages.example')->name('example');
Route::view('/checkin', 'pages.checkin-example')->name('checkin-example');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
