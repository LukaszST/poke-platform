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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cards = DB::table('card_list_basic_info')->get();

        foreach ($cards as $card) {
            $imageContent = file_get_contents($card->image_url_small);
            File::put( public_path( 'cards/' . $card->card_id . '.png'), $imageContent);
        }
    }
}
