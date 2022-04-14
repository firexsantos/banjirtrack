<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status;

        $status->alats_id = 1;
        $status->alerts_id = 2;
        $status->ketinggian_air = 300;
        $status->curah_hujan = 200;
        $status->temperatur_udara = 500;
        $status->kelembapan_udara = 400;
        $status->save();

        $status = new Status;
        $status->alats_id = 2;
        $status->alerts_id = 2;
        $status->ketinggian_air = 300;
        $status->curah_hujan = 200;
        $status->temperatur_udara = 500;
        $status->kelembapan_udara = 400;
        $status->save();

        $status = new Status;
        $status->alats_id = 3;
        $status->alerts_id = 1;
        $status->ketinggian_air = 300;
        $status->curah_hujan = 200;
        $status->temperatur_udara = 500;
        $status->kelembapan_udara = 400;
        $status->save();

        $status = new Status;
        $status->alats_id = 4;
        $status->alerts_id = 1;
        $status->ketinggian_air = 300;
        $status->curah_hujan = 200;
        $status->temperatur_udara = 500;
        $status->kelembapan_udara = 400;
        $status->save();

        $status = new Status;
        $status->alats_id = 5;
        $status->alerts_id = 2;
        $status->ketinggian_air = 300;
        $status->curah_hujan = 200;
        $status->temperatur_udara = 500;
        $status->kelembapan_udara = 400;
        $status->save();
    }
}
