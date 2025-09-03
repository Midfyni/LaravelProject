<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Http\Livewire\EditArticleModal;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Livewire::component('edit-article-modal', EditArticleModal::class);
    }
}
