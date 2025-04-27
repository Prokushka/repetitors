<?php

namespace App\Console\Commands;

use DiDom\Document;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AvitoParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avito:parse';

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
        $response = Http::withoutVerifying()->get('https://www.avito.ru/kazan/predlozheniya_uslug?q=репетиторы')
        ->body();
        dd($response);
        $parser = Document::create($response);
        $posts = $parser->find('.items-items-Iy89l .iva-item-body-GQomw');
        foreach ($posts as $post){
            dd($post->first('.iva-item-listTopBlock-K5zdG a')->innerHtml());
        }
    }
}
