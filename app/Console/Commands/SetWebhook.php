<?php

namespace App\Console\Commands;

use App\Models\Bot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webhook:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting webhook';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bot = Bot::query()->first();
        $url = route('telegraph.webhook', ['token' => $bot->token]);
        $response = Http::get("https://api.telegram.org/bot{$bot->token}/setWebhook?url={$url}");
       $this->info($url);
        $this->info($response->body());
    }
}
