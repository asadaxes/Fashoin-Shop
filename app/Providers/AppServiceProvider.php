<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\SubCategory;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $view->with(['categories' => $categories, 'sub_categories' => $subCategories]);
        });
    }
}