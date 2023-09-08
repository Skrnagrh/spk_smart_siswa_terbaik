@extends('layouts.dashboard')

@section('content')
@if ($checkHasEmptyData)
@include('data kosong')

@else
<h1 class="mt-4">Perhitungan</h1>
<hr>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3 mt-5">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Normalisasi Bobot Kriteria</h5>
        </div>

        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Bobot (W<sub>j</sub>)</th>
                        <th class="text-center">Normalisasi (W<sub>i</sub>)</th>
                    </tr>
                </thead>
                <tbody style="background-color: var(--bg-body)">
                    @foreach ($persentaseBobot as $index => $item)
                    <tr>
                        <td class="text-center">{{ ucwords($item['description']) }} ({{ strtoupper($item['name']) }})
                        </td>
                        <td class="text-center">{{ ucwords($item['type']) }}</td>
                        <td class="text-center">{{ $item['bobot'] }}0</td>
                        <td class="text-center">{{ $item['bobot'] }}0 / {{ $totalBobot }}0 = {{
                            round($item['persentase_bobot'], 3) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center font-weight-bold">Total (&Sigma;<i>w<sub>j</sub></i>)</td>
                        <td></td>
                        <td class="text-center font-weight-bold">{{ $totalBobot }}0</td>
                        <td class="text-center font-weight-bold">{{ array_sum(array_column($persentaseBobot,
                            'persentase_bobot')) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Perhitungan</h5>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple1">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="3">No</th>
                        <th class="text-center align-middle" rowspan="3">Alternatif</th>
                        <th class="text-center align-middle" rowspan="3">Kelas</th>
                        <th class="text-center align-middle" rowspan="3">NIS</th>
                        <th class="text-center align-middle" rowspan="3">Nama Siswa</th>
                        @if (!empty($matrixTernormalisasi))
                        <th class="text-center" colspan="{{ count($matrixTernormalisasi[0]) }}">Kriteria</th>
                        @endif
                        <th class="text-center align-middle" rowspan="3">Nilai Total</th>
                    </tr>
                    <tr>
                        @if (!empty($matrixTernormalisasi))
                        @foreach ($matrixTernormalisasi[0] as $kriteria)
                        <th class="text-center">{{ strtoupper($kriteria['krit_code']) }} (C{{ $loop->index + 1 }})</th>
                        @endforeach
                        @endif
                    </tr>

                </thead>

                <tbody class="bg-white">
                    @foreach ($nilaiBobotGroupByAlternatifId as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center"><strong>A{{ $item->code }}</strong></td>
                        <td class="text-center">{{ $item->kelas }}</td>
                        <td class="text-center">{{ $item->nis }}</td>
                        <td class="text-center">{{ $item->nama }}</td>
                        @php $total = 0; @endphp
                        @foreach ($matrixTernormalisasi[$loop->index] as $kriteria )
                        <td class="text-center">{{ round($kriteria['hasil_utiliti'], 3) }} * {{
                            round($hasilBobot[$loop->index]['persentase_bobot'], 3) }}</td>
                        @php $total += round($kriteria['hasil_utiliti'] *
                        $hasilBobot[$loop->index]['persentase_bobot'], 3); @endphp
                        @endforeach
                        <td class="text-center font-weight-bold">{{ $total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


@endif


@endsection