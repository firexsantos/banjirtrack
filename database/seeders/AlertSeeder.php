<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alerts;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alert = new Alerts;

        $alert->nm_alert = "Danger";
        $alert->desk = "Bajir";
        $alert->icon = "danger.gif";
        $alert->color = "f54242";
        $alert->save();

        $alert = new Alerts;
        $alert->nm_alert = "Normal";
        $alert->desk = "Normal";
        $alert->icon = "normal.gif";
        $alert->color = "42a1f5";
        $alert->save();
    }
}
