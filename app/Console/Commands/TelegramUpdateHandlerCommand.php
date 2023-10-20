<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use Illuminate\Console\Command;

class TelegramUpdateHandlerCommand extends Command
{
    public function __construct(protected TelegramService $service){}

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $updates = $this->service->getUpdates(0);

        dd($updates);
    }
}
