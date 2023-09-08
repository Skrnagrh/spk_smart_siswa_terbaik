@extends('layouts.dashboard')

@section('content')
<style>
    .colom-kartu {
        margin-top: -20%;
        border: none
    }

    .colom-kartu-1 {
        margin-top: -13%;
        border: none
    }

    .kartu {
        width: 80px;
        height: 50px;
        justify-content: center;
        text-align: center;
        border: none
    }

    a {
        text-decoration: none
    }
</style>

<h1 class="mt-4">Dashboard {{ auth()->user()->name }}</h1>
<hr>

<div class="row">
    <div class="col-md-3 mt-5">
        <a href="/dashboard/alternatif" class="text-primary">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-primary text-light">
                            <i class="fas fa-person"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h3 class="text-sm mb-0 text-capitalize">Alternatif</h3>
                            <p class="text-sm mb-0 text-capitalize">{{ $alternatif }} Siswa</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row row-cols-2" style="justify-content: space-around">
                    <div class="col-md-10">Read More</div>
                    <div class="col-md-2"> <i class="fas fa-arrow-right"></i></div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/kriteria" class="text-primary">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-primary text-light">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h3 class="text-sm mb-0 text-capitalize">Kriteria</h3>
                            <p class="text-sm mb-0 text-capitalize">{{ $kriteria }} Kriteria</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row row-cols-2 justify-content-between">
                    <div class="col-md-10">Read More</div>
                    <div class="col-md-2"> <i class="fas fa-arrow-right"></i></div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/subkriteria" class="text-primary">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-primary text-light">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h3 class="text-sm mb-0 text-capitalize">Subkriteria</h3>
                            <p class="text-sm mb-0 text-capitalize">{{ $subkriteria }} Subkriteria</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row row-cols-2" style="justify-content: space-around">
                    <div class="col-md-10">Read More</div>
                    <div class="col-md-2"> <i class="fas fa-arrow-right"></i></div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/smart/hasil" class="text-primary">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-primary text-light">
                            <i class="fas fa-award"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h3 class="text-sm mb-0 text-capitalize">Perangkingan</h3>
                            @if(count($hasilPerankingan) > 0)
                            <div class="d-flex align-items-end">
                                <div class="ps-3">
                                    @foreach ($hasilPerankingan as $item)
                                    <h6>A{{ $item['alternatif_code'] }} <small class="text-muted"
                                            style="font-size: 12px">{{
                                            $item['nama'] }} <span class="text-primary small pt-1 fw-bold">(Peringkat Ke
                                                1)</span></small></h6>
                                    @break
                                    @endforeach

                                </div>
                            </div>
                            @else
                            <div class="d-flex align-items-end">
                                <div class="card-icon rounded-circle d-flex align-items-end justify-content-end">
                                    <i class="bi bi-trophy-fill text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <span class="text-success small pt-1 fw-bold">Belum ada data peringkat.</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row row-cols-2 justify-content-between">
                    <div class="col-md-10">Read More</div>
                    <div class="col-md-2"> <i class="fas fa-arrow-right"></i></div>
                </div>
            </div>
        </a>
    </div>
</div>


@include('sweetalert::alert')
@endsection