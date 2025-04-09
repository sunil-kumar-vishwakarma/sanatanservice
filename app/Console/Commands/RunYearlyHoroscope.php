<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RunYearlyHoroscope extends Command
{
    protected $signature = 'run:scheduled-route-yearly';
    protected $description = 'Generate yearly horoscope at scheduled times';

    public function handle()
    {
        $url = 'https://jdresearchcenter.com/public/admin/generate-yearly-horscope';
        // $url = 'http://127.0.0.1:8000/admin/generate-yearly-horscope';
        $response = Http::get($url);
        $this->info("Executed: {$url} - Status: " . $response->status());
    }
}
