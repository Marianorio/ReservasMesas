<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Nose bien porque se agrego esto segun chtaGPT es por: use Illuminate\Support\Facades\Schema;: Se importa la clase Schema para poder trabajar con los métodos relacionados con el esquema de la base de datos.
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        Schema::defaultStringLength(191); //Nose bien porque se agrego esto segun chtaGPT es por: Schema::defaultStringLength(191);: Establece una longitud máxima de 191 caracteres para las columnas de tipo VARCHAR por defecto, asegurando la compatibilidad con versiones antiguas de MySQL y MariaD
        
        if (env('APP_DEBUG')) {
            DB::listen(function ($query) {
                Log::info($query->sql);
                Log::info($query->bindings);
                Log::info($query->time);
            });
        }
    }


}
