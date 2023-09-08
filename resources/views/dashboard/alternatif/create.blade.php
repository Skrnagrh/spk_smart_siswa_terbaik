@extends('layouts.dashboard')

@section('content')
<h1 class="mt-4">Alternatif</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mt-3">Tambah Alternatif</h5>
                </div>
                <hr>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('alternatif.index') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="nis">Nomor Induk Siswa</label>
                                            <input type="text" id="nis"
                                                class="form-control @error('nis') is-invalid @enderror bg-white" name="nis"
                                                placeholder="Nomor Induk Siswa" readonly
                                                value="{{ $kode }}">
                                        </div>
                                        @error('code_curug')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                required placeholder="Nama Lengkap" value="{{ old('nama') }}" autofocus>
                                        </div>
                                        @error('nama')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Kelas</label>
                                            <select class="form-select" name="kelas">
                                                <option value="XII AP 1" @if(old('kelas')=='XII AP 1' ) selected @endif>XII
                                                    AP 1
                                                </option>
                                                <option value="XII AP 2" @if(old('kelas')=='XII AP 2' ) selected @endif>XII
                                                    AP 2
                                                </option>
                                                <option value="XII AK 1" @if(old('kelas')=='XII AK 1' ) selected @endif>XII
                                                    AK 1
                                                </option>
                                                <option value="XII AK 2" @if(old('kelas')=='XII AK 2' ) selected @endif>XII
                                                    AK 2
                                                </option>
                                                <option value="XII TKJ 1" @if(old('kelas')=='XII TKJ 1' ) selected @endif>XII
                                                    TKJ 1
                                                </option>
                                                <option value="XII TKJ 2" @if(old('kelas')=='XII TKJ 2' ) selected @endif>XII
                                                    TKJ 2
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="image">Photo</label>
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="previewImage()">
                                        <div class="file-size"></div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary me-1 mb-1">
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

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
