<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RunScheduledRoute extends Command
{
    protected $signature = 'run:scheduled-route';
    protected $description = 'Generate horoscopes at scheduled times';

    public function handle()
    {
        $url = 'https://jdresearchcenter.com/public/admin/generate-daily-horscope';
        // $url = 'http://127.0.0.1:8000/admin/generate-daily-horscope';
        // $urls = [
        //     'daily'  => 'https://jdresearchcenter.com/admin/generate-daily-horscope',
        //     'weekly' => 'https://jdresearchcenter.com/admin/generate-weekly-horscope',
        //     'yearly' => 'https://jdresearchcenter.com/admin/generate-yearly-horscope',
        // ];

        $response = Http::get($url);
        $this->info("Executed: {$url} - Status: " . $response->status());
    }
}
