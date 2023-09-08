@extends('layouts.dashboard')

@section('content')
<h1 class="mt-4">Subkriteria</h1>
<hr>
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm p-3">
                <div class="d-flex justify-content-between mx-2">
                    <h5 class="mt-3"><i class="bi bi-pencil-square"></i> Ubah Data Subkriteria</h5>
                </div>
                <hr>

                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('subkriteria.update', $subkriteria->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-12">
                                <label for="kriteria">Pilih Kriteria</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="kriteria_id" value="{{ $subkriteria->kriteria_id }}">
                                    <select class="form-select @error('selectedKriteria') is-invalid @enderror"
                                        disabled>
                                        <option value="{{ $subkriteria->id }}" selected>Pilih Kriteria...</option>
                                        @foreach ($allKriteria as $kriteria)
                                        <option value="{{ $subkriteria->kriteria_id }}" @if($subkriteria->kriteria_id ==
                                            $kriteria->id) selected @endif>{{ $kriteria->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('selectedKriteria')
                                @include('layouts.partial.invalid-form', ['message' => $message])
                                @enderror
                            </div>

                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="range">Range</label>
                                            <input type="text" id="range"
                                                class="form-control @error('range') is-invalid @enderror" name="range"
                                                placeholder="Range" autofocus required
                                                value="{{ $subkriteria->range }}">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="nilai">nilai</label>
                                            <select class="form-select @error('nilai') is-invalid @enderror" id="nilai"
                                                name="nilai" required>
                                                @for ($i = 1; $i <= 5; $i++) <option value='{{ $i }}' {{ $i==(int)
                                                    $subkriteria->nilai ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                                    @endfor
                                            </select>
                                            @error('nilai')
                                            @include('layouts.partial.invalid-form', ['message' =>
                                            $message])
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-end mx-1">
                                    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary mx-1">Ubah</button>
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