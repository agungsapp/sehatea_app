<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use NumberFormatter;
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

        Str::macro('rupiah', function ($value) {
            // Membuat formatter
            $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
            return $formatter->formatCurrency($value, 'IDR');
        });

        Str::macro('tanggal', function ($value) {
            return Carbon::parse($value)->format('d M, Y');
        });

        Str::macro('tanggalWaktu', function ($value) {
            // Ensure the value is a Carbon instance and format it to include time
            return Carbon::parse($value)->format('d M, Y H:i:s');
        });
    }
}
