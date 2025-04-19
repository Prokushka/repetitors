<?php

namespace App\Console\Commands;

use http\Env;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class JWTSecretKeyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jwt:secret';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'give a secret key';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = base64_encode(fake()->realTextBetween(150, 160));

        try {

            $envPath = base_path('.env');


            $content = file_get_contents($envPath);


            if (strpos($content, 'JWT_SECRET=') !== false) {

                $content = preg_replace('/^JWT_SECRET=.*$/m', 'JWT_SECRET=' . $key, $content);
            } else {

                $content .= "\nJWT_SECRET=" . $key;
            }
             file_put_contents($envPath, $content);

            $this->info('Your key was create: ' . $key);

            Artisan::call('config:clear');
        } catch (\Exception $exception) {
            echo "Error: " . $exception->getMessage();
        }

    }
}
