<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VercelServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (env('APP_ENV') === 'production') {
            // Paksa folder cache & views pindah ke /tmp yang writable
            $this->app->useStoragePath('/tmp');
            
            // Konfigurasi ulang path compiled views secara dinamis
            config(['view.compiled' => '/tmp/storage/framework/views']);
        }
    }

    public function boot()
    {
        if (env('APP_ENV') === 'production') {
            // Buat folder yang dibutuhkan secara otomatis di /tmp jika belum ada
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
        }
    }
}