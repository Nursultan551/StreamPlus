<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\OnboardingWizard;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/onboarding', OnboardingWizard::class)->name('onboarding');
