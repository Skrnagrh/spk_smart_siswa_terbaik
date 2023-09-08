<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiBobot;
use App\Models\User;
use Illuminate\Database\Seeder;

class NilaiBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allKriteria = Kriteria::all();
        $allAlternatif = Alternatif::all();
        $users = User::pluck('id'); // Mengambil daftar user id
        $data = [
            'alternatif1' => [2, 2, 2, 5, 2],
            'alternatif2' => [3, 2, 3, 1, 5],
            'alternatif3' => [1, 1, 1, 1, 5],
            'alternatif4' => [5, 3, 5, 5, 2],
            'alternatif5' => [2, 1, 2, 1, 5],
            'alternatif6' => [1, 1, 3, 3, 3],
            'alternatif7' => [1, 2, 2, 1, 5],
            'alternatif8' => [3, 1, 1, 1, 1],
            'alternatif9' => [1, 1, 1, 1, 5],
            'alternatif10' => [5, 1, 1, 1, 1],
            'alternatif11' => [5, 1, 1, 1, 1],
            'alternatif12' => [1, 1, 1, 1, 5],
            'alternatif13' => [4, 1, 2, 1, 1],
            'alternatif14' => [4, 1, 3, 1, 5],
            'alternatif15' => [2, 1, 2, 1, 5],
            'alternatif16' => [5, 1, 1, 1, 4],
            'alternatif17' => [5, 1, 1, 1, 1],
            'alternatif18' => [4, 3, 4, 1, 5],
            'alternatif19' => [2, 3, 3, 3, 5],
            'alternatif20' => [5, 1, 3, 1, 3],
            'alternatif21' => [5, 3, 3, 1, 3],
            'alternatif22' => [1, 1, 1, 1, 4],
            'alternatif23' => [5, 3, 4, 1, 5],
            'alternatif24' => [1, 2, 4, 1, 2],
            'alternatif25' => [1, 1, 2, 2, 5],
            'alternatif26' => [3, 1, 1, 1, 5],
            'alternatif27' => [1, 1, 1, 1, 5],
            'alternatif28' => [5, 3, 5, 1, 4],
            'alternatif29' => [1, 1, 1, 1, 5],
            'alternatif30' => [5, 2, 4, 4, 5],
            'alternatif31' => [3, 2, 4, 5, 4],
            'alternatif32' => [1, 1, 1, 1, 1],
            'alternatif33' => [4, 2, 1, 3, 4],
            'alternatif34' => [3, 1, 4, 5, 2],
            'alternatif35' => [3, 2, 3, 5, 2],
            'alternatif36' => [3, 2, 2, 5, 5],
            'alternatif37' => [1, 1, 1, 1, 5],
            'alternatif38' => [2, 3, 5, 1, 5],
            'alternatif39' => [5, 3, 5, 5, 1],
            'alternatif40' => [5, 5, 5, 5, 1],
        ];

        foreach ($allAlternatif as $keyAlt => $alternatif) {
            $user_id = ($keyAlt < 20) ? $users[1] : $users[2];

            foreach ($allKriteria as $keyKrit => $kriteria) {
                NilaiBobot::create([
                    'user_id' => $user_id,
                    'nilai' => $data['alternatif' . ($keyAlt + 1)][$keyKrit],
                    'kriteria_id' => $kriteria->id,
                    'alternatif_id' => $alternatif->id
                ]);
            }
        }
    }
}
