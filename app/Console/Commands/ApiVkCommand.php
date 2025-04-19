<?php

namespace App\Console\Commands;

use App\Services\ParseVkService;
use App\Services\ProfileService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ApiVkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse profile from vk groups';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $choice = $this->choice('parse from where?', ['my.tutor', 'repetitorovnet']);
        ParseVkService::getFriends( 10, $choice);

    }
}
