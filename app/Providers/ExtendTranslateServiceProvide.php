<?php

namespace App\Providers;

use Barryvdh\TranslationManager\ManagerServiceProvider;
use Barryvdh\TranslationManager\Translator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ExtendTranslateServiceProvide extends ManagerServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(base_path().'/routes/tranlator.php');
    }
}
