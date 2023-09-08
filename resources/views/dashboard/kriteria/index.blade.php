@extends('layouts.dashboard')


@section('content')

<h1 class="mt-4">Kriteria</h1>
<hr>

@if (Auth::user()->role == 'operator')
<div class="d-flex align-items-center justify-content-start">
    <a href="{{ route('kriteria.create') }}"><button class="btn btn-primary mt-4">Tambah Kriteria</button></a>
</div>
@endif

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex justify-content-between mx-2">
            <h5 class="mt-3">Kriteria</h5>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Bobot</th>
                        @if (Auth::user()->role == 'operator')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($allKriteria as $kriteria)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>C{{ $kriteria->code }}</td>
                        <td>{{ strtoupper($kriteria->name) }}</td>
                        <td>{{ ucwords($kriteria->description) }}</td>
                        <td>{{ ucwords($kriteria->type) }}</td>
                        <td>{{ $kriteria->bobot }}0</td>
                        @if (Auth::user()->role == 'operator')
                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                    class="btn btn-warning me-3 text-light btn-sm"><i class="bi bi-pencil-square"></i>
                                    Ubah
                                </a>


                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal{{ $kriteria->id }}"><i
                                            class="bi bi-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi -->
                                    <div>
                                        <div class="modal fade" id="confirmationModal{{ $kriteria->id }}" tabindex="-1"
                                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Hapus
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus kriteria {{
                                                            ucwords($kriteria->description) }}?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya,
                                                            Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection