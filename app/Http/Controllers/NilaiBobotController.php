<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\NilaiBobot;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NilaiBobotController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userID = $user->id;

        $allKriteria = Kriteria::all();
        $allDataProcessed = $this->process_index_data();
        $checkHasEmptyData = $this->check_nilai_bobot_has_empty_data();
        $nilaiBobotGroupByAlternatifId = [];
        $matrixTernormalisasi = [];

        if (!$checkHasEmptyData) {
            $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
                ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
                ->select('nilai_bobot.alternatif_id', 'alternatif.code', 'alternatif.nis')
                ->where('nilai_bobot.user_id', $userID) // Filter by user_id
                ->orderBy('nilai_bobot.alternatif_id')
                ->groupBy('nilai_bobot.alternatif_id')
                ->get();

            $matrixTernormalisasi = $this->matrix_ternormalisasi($nilaiBobotGroupByAlternatifId);
        }

        return view('dashboard.nilai_bobot.index', compact('allDataProcessed', 'allKriteria', 'nilaiBobotGroupByAlternatifId', 'matrixTernormalisasi', 'checkHasEmptyData'));
    }

    protected function process_index_data()
    {
        $user = auth()->user();
        $userID = $user->id;

        $result = [];

        // Get all the Kriteria
        $allKriteria = Kriteria::all();

        // Get all the NilaiBobot records for the user
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'nis', 'nama', 'kelas')
            ->where('nilai_bobot.user_id', $userID)
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $dataKriteria = [];

            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            foreach ($selectedNilaiBobot as $itemKriteria) {
                $dataKriteria[] = [
                    'kriteria_id' => $itemKriteria->kriteria_id,
                    'nilaiBobot' => $itemKriteria->nilai
                ];
            }

            $item->dataKriteria = $dataKriteria;
            $result[] = $item;
        }

        return $result;
    }

    protected function check_nilai_bobot_has_empty_data()
    {
        $user = auth()->user();
        $userID = $user->id;

        $condition = false;
        $EMPTY_VALUE = 'Empty';
        $allKriteria = Kriteria::all();

        // Get all the NilaiBobot records for the user
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'nis', 'nama', 'kelas')
            ->where('nilai_bobot.user_id', $userID)
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            $selectedKriteriaIds = $selectedNilaiBobot->pluck('kriteria_id')->all();

            $emptyKriteriaIds = $allKriteria->pluck('id')->diff($selectedKriteriaIds)->all();

            if (!empty($emptyKriteriaIds)) {
                $condition = true;
                break;
            }
        }

        return $condition;
    }


    // Perhitungan Nilai Matrix Normalisasi
    protected function matrix_ternormalisasi($arrayNilaiBobotByAlternatifId = [])
    {
        $result = [];

        foreach ($arrayNilaiBobotByAlternatifId as $item) {
            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            $result[] = $selectedNilaiBobot;
        }

        return $result;
    }


    // Create ALL Nilai Bobot
    public function create_all()
    {
        $allKriteria = Kriteria::all();
        $allSubkriteria = Subkriteria::all();
        $allAlternatif = Alternatif::all();

        return view('dashboard.nilai_bobot.create_all', compact('allKriteria', 'allSubkriteria', 'allAlternatif'));
    }

    public function store_all(Request $request)
    {
        try {
            $userID = auth()->user()->id;

            // Cek keberadaan data yang sudah terisi
            $existingData = NilaiBobot::whereIn('kriteria_id', $request->kriteria)
                ->where('alternatif_id', $request->alternatif)
                ->where('user_id', $userID) // Add the condition to filter by user_id
                ->first();

            if ($existingData) {
                return redirect()->route('nilai-bobot.index')
                    ->with(['error' => 'Data dengan kriteria yang sama sudah ada. Mohon masukkan data yang berbeda.']);
            }

            if (!empty($request->nilai)) {
                // Simpan data baru
                for ($i = 0; $i < count($request->nilai); $i++) {
                    NilaiBobot::create([
                        'nilai' => $request->nilai[$i],
                        'kriteria_id' => (int) $request->kriteria[$i],
                        'alternatif_id' => (int) $request->alternatif,
                        'user_id' => $userID, // Assign the user_id to the created data
                    ]);
                }
            }

            return redirect()
                ->route('nilai-bobot.index')
                ->with([
                    'success' => 'Nilai Bobot berhasil dibuat'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('nilai-bobot.index')
                ->withErrors('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }




    // Edit Nilai Bobot
    public function edit($alternatifId)
    {
        $selectedAlternatif = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->join('kriteria', 'nilai_bobot.kriteria_id', '=', 'kriteria.id')
            ->select('nilai_bobot.*', 'alternatif.nis', 'alternatif.kelas', 'alternatif.nama', 'kriteria.description AS kriteria_description', 'kriteria.code AS kriteria_code')
            ->orderBy('kriteria.id')
            ->where('nilai_bobot.alternatif_id', '=', $alternatifId)
            ->get();
        $allSubkriteria = Subkriteria::all();

        return view('dashboard.nilai_bobot.edit', compact('selectedAlternatif', 'allSubkriteria'));
    }

    // Update Nilai Bobot
    public function update(Request $request, $alternatifId)
    {
        $nilaiBobot = DB::table('nilai_bobot')
            ->where('alternatif_id', '=', (int) $alternatifId)
            ->orderBy('kriteria_id')
            ->get();

        for ($i = 0; $i < count($nilaiBobot); $i++) {
            DB::table('nilai_bobot')
                ->where('alternatif_id', '=', (int) $alternatifId)
                ->where('kriteria_id', '=', $request->kriteria[$i])
                ->update(['nilai' => $request->nilai[$i]]);
        }

        return redirect()
            ->route('nilai-bobot.index')
            ->with([
                'success' => 'Nilai Bobot berhasil diubah'
            ]);
    }

    public function destroy($alternatif_id)
    {
        NilaiBobot::where('alternatif_id', $alternatif_id)->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus.');
    }
}
