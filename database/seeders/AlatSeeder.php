<?php

namespace Database\Seeders;

use App\Models\Alats;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alat = new Alats;
        $alat->kode_alat = "001";
        $alat->nm_alat = "Darurat Rumbai 1";
        $alat->alamat = "Jl. Buaya Darat, Pinggir Kanan";
        $alat->lat = "0.5428738096201973";
        $alat->lng = "101.42608056811082";
        $alat->jarak_normal = "400";
        $alat->jarak_warning = "200";
        $alat->jarak_danger = "100";
        $alat->gambar = "sungai1.jpg";
        $alat->save();

        $alat = new Alats;
        $alat->kode_alat = "002";
        $alat->nm_alat = "Darurat Rumbai 2";
        $alat->alamat = "Jl. Buaya Darat, Pinggir Kanan";
        $alat->lat = "0.5422669222756394";
        $alat->lng = "101.45581938265106";
        $alat->jarak_normal = "300";
        $alat->jarak_warning = "200";
        $alat->jarak_danger = "100";
        $alat->gambar = "sungai2.jpg";
        $alat->save();

        $alat = new Alats;
        $alat->kode_alat = "003";
        $alat->nm_alat = "Darurat Rumbai 3";
        $alat->alamat = "Jl. Buaya Darat, Pinggir Kanan";
        $alat->lat = "0.5415386573818672";
        $alat->lng = "101.43700503059499";
        $alat->jarak_normal = "500";
        $alat->jarak_warning = "200";
        $alat->jarak_danger = "100";
        $alat->gambar = "sungai3.jpg";
        $alat->save();

        $alat = new Alats;
        $alat->kode_alat = "004";
        $alat->nm_alat = "Darurat Panam 1";
        $alat->alamat = "Jl. Buaya Darat, Pinggir Kanan";
        $alat->lat = "0.5558176739355328";
        $alat->lng = "101.45497277581593";
        $alat->jarak_normal = "350";
        $alat->jarak_warning = "200";
        $alat->jarak_danger = "100";
        $alat->gambar = "sungai4.jpg";
        $alat->save();

        $alat = new Alats;
        $alat->kode_alat = "005";
        $alat->nm_alat = "Darurat Panam 2";
        $alat->alamat = "Jl. Buaya Darat, Pinggir Kanan";
        $alat->lat = "0.5509202491941215";
        $alat->lng = "101.40017200545631";
        $alat->jarak_normal = "600";
        $alat->jarak_warning = "200";
        $alat->jarak_danger = "100";
        $alat->gambar = "sungai5.jpg";
        $alat->save();
    }
}
