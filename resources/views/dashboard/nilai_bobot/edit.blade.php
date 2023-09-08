@extends('layouts.dashboard')

@section('content')
<h1 class="mt-4">Nilai Bobot</h1>
<hr>
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Ubah Nilai Bobot</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"
                            action="{{ route('nilai-bobot.update', $selectedAlternatif[0]->alternatif_id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="alternatif">Kelas</label>
                                            <input type="hidden" name="alternatif" id="alternatif"
                                                value="{{ $selectedAlternatif[0]->alternatif_id }}">
                                            <input type="text" id="alternatif_view"
                                                class="form-control @error('alternatif') is-invalid @enderror"
                                                name="alternatif_view" readonly
                                                value="{{ ucwords($selectedAlternatif[0]->kelas) }}">
                                            @error('alternatif')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="alternatif">Alternatif</label>
                                            <input type="hidden" name="alternatif" id="alternatif"
                                                value="{{ $selectedAlternatif[0]->alternatif_id }}">
                                            <input type="text" id="alternatif_view"
                                                class="form-control @error('alternatif') is-invalid @enderror"
                                                name="alternatif_view" readonly
                                                value="{{ ucwords($selectedAlternatif[0]->nis) }} {{ strtoupper($selectedAlternatif[0]->nama) }}">
                                            @error('alternatif')
                                            @include('layouts.partial.invalid-form', ['message' => $message])
                                            @enderror
                                        </div>

                                        <h6 class="mt-3">Kriteria</h6>
                                        @foreach ($selectedAlternatif as $key => $item)
                                        <input type="hidden" name="kriteria[]" value={{ $item->kriteria_id
                                        }}>
                                        <div class="form-group mb-3">
                                            <label for="nilai">(C{{ strtoupper($item->kriteria_code)
                                                }}) {{ ucwords($item->kriteria_description)
                                                }}</label>
                                            <select class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                                id="nilai" name="nilai[]" required>
                                                @foreach ($allSubkriteria as $subkriteria)
                                                @if ($item->kriteria_id ==
                                                $subkriteria->kriteria_id)
                                                <option value="{{ $subkriteria->nilai }}" {{ $item->
                                                    nilai == $subkriteria->nilai ? 'selected' : ''
                                                    }}>
                                                    {{ $subkriteria->range }}</option>
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
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <a href="{{ route('nilai-bobot.index') }}" class="btn btn-secondary me-1 mb-1">
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Data</button>
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