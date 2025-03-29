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
        $urls = [
            'daily'  => 'https://jdresearchcenter.com/admin/generate-daily-horscope',
            'weekly' => 'https://jdresearchcenter.com/admin/generate-weekly-horscope',
            'yearly' => 'https://jdresearchcenter.com/admin/generate-yearly-horscope',
        ];

        foreach ($urls as $key => $url) {
            $response = Http::get($url);
            $this->info("Executed: {$url} - Status: " . $response->status());
        }
        
        $this->info('All horoscope generation tasks completed successfully.');
    }
}
