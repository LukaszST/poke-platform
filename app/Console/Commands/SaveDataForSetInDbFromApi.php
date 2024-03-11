<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

class SaveDataForSetInDbFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-data-for-set-in-db-from-api';

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
        /** @var Set $list */
        $list = Pokemon::Set()->all();

        /** @var Set $set */
        foreach ($list as $set) {
            $this->saveSetToDb(
                $set->getId(),
                $set->getName(),
                $set->getSeries(),
                $set->getImages()->getLogo()
            );
        }
    }

    private function saveSetToDb(
        string $setId,
        string $setName,
        string $series,
        string $logoUrl
    ) {
        DB::table('set_list_basic_info')->where('set_id', '==', $setId)->updateOrInsert([
            "set_id" => $setId,
            "set_name" => $setName,
            "series" => $series,
            "logo_url" => $logoUrl,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
