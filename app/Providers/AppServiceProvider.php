<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Http\Livewire\EditArticleModal;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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
        if (app()->environment('testing')) {
            Vite::useHotFile(null);
            Vite::useBuildDirectory('fake'); // prevent looking for /public/build
        }
    }
}
