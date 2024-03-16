<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SavePhotosForCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-photos-for-cards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save photos for pokemon cards local public directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cards = DB::table('card_list_basic_info')->get();

        foreach ($cards as $card) {
            try {
                $imageContent = file_get_contents($card->image_url_small);
                File::put( public_path( 'cards/' . $card->card_id . '.png'), $imageContent);

            } catch (\Exception $exception) {
                echo 'failed small ' . $card->id . PHP_EOL;
                try {
                    $imageContent = file_get_contents($card->image_url_big);
                    File::put( public_path( 'cards/' . $card->card_id . '.png'), $imageContent);
                } catch (\Exception $exception) {
                    echo 'failed big ' . $card->id . PHP_EOL;

                }
            }
        }
    }
}
