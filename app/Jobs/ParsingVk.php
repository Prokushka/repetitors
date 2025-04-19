<?php

namespace App\Jobs;

use App\Models\Profile;
use App\Services\ParseVkService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ParsingVk implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected int $count,
        protected string $domain
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ParseVkService::getFriends($this->count,$this->domain);
    }
}
