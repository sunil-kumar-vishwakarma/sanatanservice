<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RunWeeklyHoroscope extends Command
{
    protected $signature = 'run:scheduled-route-weekly';
    protected $description = 'Generate weekly horoscope at scheduled times';

    public function handle()
    {
        $url = 'https://jdresearchcenter.com/admin/generate-weekly-horscope';
        // $url = 'http://127.0.0.1:8000/admin/generate-weekly-horscope';
        $response = Http::get($url);
        $this->info("Executed: {$url} - Status: " . $response->status());
    }
}
