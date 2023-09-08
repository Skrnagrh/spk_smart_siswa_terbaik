<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Ap 1
            ['nis' => '001', 'nama' => 'Andi', 'kelas' => 'XII AP 1'],
            ['nis' => '002', 'nama' => 'Budi', 'kelas' => 'XII AP 1'],
            ['nis' => '003', 'nama' => 'Cindy', 'kelas' => 'XII AP 1'],
            ['nis' => '004', 'nama' => 'Dewi', 'kelas' => 'XII AP 1'],
            ['nis' => '005', 'nama' => 'Eka', 'kelas' => 'XII AP 1'],
            ['nis' => '006', 'nama' => 'Faisal', 'kelas' => 'XII AP 1'],
            ['nis' => '007', 'nama' => 'Gita', 'kelas' => 'XII AP 1'],
            ['nis' => '008', 'nama' => 'Hadi', 'kelas' => 'XII AP 1'],
            ['nis' => '009', 'nama' => 'Indra', 'kelas' => 'XII AP 1'],
            ['nis' => '010', 'nama' => 'Joko', 'kelas' => 'XII AP 1'],
            ['nis' => '011', 'nama' => 'Kartika', 'kelas' => 'XII AP 1'],
            ['nis' => '012', 'nama' => 'Lia', 'kelas' => 'XII AP 1'],
            ['nis' => '013', 'nama' => 'Mita', 'kelas' => 'XII AP 1'],
            ['nis' => '014', 'nama' => 'Nanda', 'kelas' => 'XII AP 1'],
            ['nis' => '015', 'nama' => 'Oki', 'kelas' => 'XII AP 1'],
            ['nis' => '016', 'nama' => 'Pradana', 'kelas' => 'XII AP 1'],
            ['nis' => '017', 'nama' => 'Qori', 'kelas' => 'XII AP 1'],
            ['nis' => '018', 'nama' => 'Rizka', 'kelas' => 'XII AP 1'],
            ['nis' => '019', 'nama' => 'Sonia', 'kelas' => 'XII AP 1'],
            ['nis' => '020', 'nama' => 'Tegar', 'kelas' => 'XII AP 1'],

            // Ap 2
            ['nis' => '021', 'nama' => 'Adit', 'kelas' => 'XII AP 2'],
            ['nis' => '022', 'nama' => 'Bella', 'kelas' => 'XII AP 2'],
            ['nis' => '023', 'nama' => 'Candra', 'kelas' => 'XII AP 2'],
            ['nis' => '024', 'nama' => 'Dani', 'kelas' => 'XII AP 2'],
            ['nis' => '025', 'nama' => 'Elisa', 'kelas' => 'XII AP 2'],
            ['nis' => '026', 'nama' => 'Farhan', 'kelas' => 'XII AP 2'],
            ['nis' => '027', 'nama' => 'Gisela', 'kelas' => 'XII AP 2'],
            ['nis' => '028', 'nama' => 'Hanif', 'kelas' => 'XII AP 2'],
            ['nis' => '029', 'nama' => 'Ida', 'kelas' => 'XII AP 2'],
            ['nis' => '030', 'nama' => 'Jaya', 'kelas' => 'XII AP 2'],
            ['nis' => '031', 'nama' => 'Kiki', 'kelas' => 'XII AP 2'],
            ['nis' => '032', 'nama' => 'Luki', 'kelas' => 'XII AP 2'],
            ['nis' => '033', 'nama' => 'Mira', 'kelas' => 'XII AP 2'],
            ['nis' => '034', 'nama' => 'Nana', 'kelas' => 'XII AP 2'],
            ['nis' => '035', 'nama' => 'Oki', 'kelas' => 'XII AP 2'],
            ['nis' => '036', 'nama' => 'Prima', 'kelas' => 'XII AP 2'],
            ['nis' => '037', 'nama' => 'Qori', 'kelas' => 'XII AP 2'],
            ['nis' => '038', 'nama' => 'Rina', 'kelas' => 'XII AP 2'],
            ['nis' => '039', 'nama' => 'Sonia', 'kelas' => 'XII AP 2'],
            ['nis' => '040', 'nama' => 'Tina', 'kelas' => 'XII AP 2'],

        ];


        foreach ($data as $key => $item) {
            Alternatif::create([
                'code' => $key + 1,
                'nis' => $item['nis'],
                'nama' => $item['nama'],
                'kelas' => $item['kelas'],
            ]);
        }
    }
}
