<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Pokemon\Models\Card;

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

                $this->info('Photo saved for ' . $card->card_name);
            } catch (\Exception $exception) {
                $this->warn('failed small for card id ' . $card->card_id);

                try {
                    $imageContent = file_get_contents($card->image_url_big);
                    File::put( public_path( 'cards/' . $card->card_id . '.png'), $imageContent);

                    $this->info('Photo saved for ' . $card->card_name);
                } catch (\Exception $exception) {
                    $this->error('error for ' . $card->card_id);
                }
            }
        }
    }
}
