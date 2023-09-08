@extends('layouts.dashboard')

@section('content')
@if ($checkHasEmptyData)
@include('data kosong')

@else
<h1 class="mt-4">Perangkingan</h1>
<hr>
<section class="header-menu mb-3">
    <div class="card m-0 border shadow-none p-3 mt-5">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Hasil Ranking</h5>
        </div>
        <hr class="border-dark">
        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilPerankingan as $index=>$item)
                    <tr>
                        <td><strong>{{ ($index + 1) }}</strong></td>
                        <td><strong>A{{ $item['alternatif_code'] }}</strong></td>
                        <td>{{ ucwords($item['kelas']) }}</td>
                        <td>{{ ucwords($item['nis']) }}</td>
                        <td>{{ strtoupper($item['nama']) }}</td>
                        <td><strong>{{ round($item['hasil_rank'], 3) }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif
@endsection
