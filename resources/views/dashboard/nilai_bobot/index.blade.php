@extends('layouts.dashboard')

@section('content')
<h1 class="mt-4">Nilai Bobot</h1>
<hr>
<div>
    <a href="{{ route('nilai-bobot.create_all') }}"><button class="btn btn-primary mt-3">Tambah Nilai
            Bobot </button></a>
</div>
<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Nilai Bobot</h5>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center p-2 align-middle" rowspan="2">No</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Kode Alternatif</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Kelas</th>
                        <th class="text-center p-2 align-middle" rowspan="2">NIS</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Nama</th>
                        <th class="text-center p-2" colspan="{{ count($allKriteria) }}">Kriteria</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Action</th>
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center">(C{{ $kriteria->code }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($allDataProcessed as $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->nis}}</td>
                        <td>{{ $item->nama }}</td>
                        @php
                        $hasEmptyData = false;
                        for ($i = 0; $i < count($allKriteria); $i++) { if (is_string($item->
                            dataKriteria[$i]['nilaiBobot']) || $item->dataKriteria[$i]['nilaiBobot'] === '') {
                            $hasEmptyData = true;
                            break;
                            }
                            }
                            @endphp
                            @for ($i = 0; $i < count($allKriteria); $i++) @if (is_string($item->
                                dataKriteria[$i]['nilaiBobot']))
                                <td class="text-danger text-center"><i>{{ $item->dataKriteria[$i]['nilaiBobot'] }}</i>
                                </td>
                                @else
                                <td class="text-cente">{{ $item->dataKriteria[$i]['nilaiBobot'] }}0</td>
                                @endif
                                @endfor
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('nilai-bobot.edit', ['alternatif_id' => $item->alternatif_id]) }}"
                                            class="btn btn-warning me-2 text-light"><i class="bi bi-pencil-square"></i>
                                            Ubah
                                        </a>


                                    </div>
                                </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>


@endsection