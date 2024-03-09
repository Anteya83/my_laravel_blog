<?php

namespace App\Console\Commands;

use App\Components\ImportDataHttp;
use App\Models\Article;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataHttp();
        $response = $import->client->request('GET', 'posts');
        $data=json_decode($response->getBody()->getContents());
        foreach ($data as $item){
            Article::firstOrCreate([
                'title' => $item->title,
            ], [
                'title' => $item->title,
                'article_content' => $item->body,
                'category_id' => 1
            ]);

        }
    }
}
