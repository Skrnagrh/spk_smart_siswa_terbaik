@extends('layouts.dashboard')

@section('content')
<h1 class="mt-4">Nilai Bobot</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12 mt-5">
            <div class="card m-0 border shadow p-3">
                <div class="d-flex align-items-center justify-content-between px-3">
                    <h5 class="mt-3">Tambah Nilai Bobot</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('nilai-bobot.store_all') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="kelas">Wali Kelas</label>
                                            <input type="text" class="form-control" id="kelas" name="kelas"
                                                value="{{ auth()->user()->kelas }}" readonly
                                                onchange="updateAlternatifOptions(this.value)">
                                        </div>

                                        <div class="form-group">
                                            <label for="alternatif">Pilih Siswa</label>
                                            <select class="form-select @error('alternatif') is-invalid @enderror"
                                                id="alternatif" name="alternatif" required>
                                                <option value="" selected>Pilih Siswa</option>
                                            </select>
                                            @error('alternatif')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>
                                        <script>
                                            function updateAlternatifOptions(selectedKelas) {
                                                const selectAlternatif = document.getElementById('alternatif');
                                                selectAlternatif.innerHTML = '<option value="" selected>Pilih Siswa</option>';

                                                if (selectedKelas !== '') {
                                                    @foreach ($allAlternatif as $alternatif)
                                                        @php
                                                            $isDataComplete = true;
                                                            foreach ($allKriteria as $kriteria) {
                                                                $nilaiBobot = $alternatif->nilaiBobot->where('kriteria_id', $kriteria->id)->first();
                                                                if (is_null($nilaiBobot)) {
                                                                    $isDataComplete = false;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        if ("{{ $alternatif->kelas }}" === selectedKelas && !@json($isDataComplete)) {
                                                            const option = document.createElement('option');
                                                            option.value = "{{ $alternatif->id }}";
                                                            option.text = "{{ ucwords($alternatif->nis) }} {{ ucwords($alternatif->nama) }}"; // Perubahan di sini
                                                            selectAlternatif.appendChild(option);
                                                        }
                                                    @endforeach
                                                }
                                            }
                                            // Jalankan fungsi saat halaman pertama kali dimuat
                                            updateAlternatifOptions(document.getElementById('kelas').value);
                                        </script>

                                        <h6 class="mt-3">Kriteria</h6>
                                        <div class="row match-height mb-3">
                                            <div class="col-12">
                                                @foreach ($allKriteria as $key => $kriteria)
                                                <input type="hidden" name="kriteria[]" value={{ $kriteria->id
                                                }}>
                                                <div class="form-group mb-3">
                                                    <label for="nilai" class="m-2">(C{{ strtoupper($kriteria->code)
                                                        }}) {{ ucwords($kriteria->description)
                                                        }}</label>
                                                    <select
                                                        class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                                        id="nilai" name="nilai[]" required>
                                                        <option value="" selected>Pilih Nilai {{
                                                            ucwords($kriteria->description)
                                                            }}</option>
                                                        @foreach ($allSubkriteria as $subkriteria)
                                                        @if ($kriteria->id == $subkriteria->kriteria_id)
                                                        <option value="{{ $subkriteria->nilai }}">{{
                                                            $subkriteria->range }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('nilai.' . $key)
                                                    @include('layouts.partial.invalid-form', ['message' =>
                                                    $message])
                                                    @enderror
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <a href="{{ route('nilai-bobot.index') }}" class="btn btn-secondary me-1 mb-1">
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection