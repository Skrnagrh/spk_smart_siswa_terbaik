@extends('layouts.dashboard')

@section('content')

<h1 class="mt-4">Alternatif</h1>
<hr>

<div>
    @if (Auth::user()->role == 'operator')
    <a href="{{ route('alternatif.create') }}"><button class="btn btn-primary mt-4">Tambah
            Alternatif</button></a>
    @endif
</div>

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="table-responsive">
            <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                <thead class="text-center table-border">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Kelas</th>
                        @if (Auth::user()->role == 'operator')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allAlternatif as $alternatif)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td><strong>A{{ $alternatif->code }}</strong></td>
                        <td>{{ strtoupper($alternatif->nis) }}</td>
                        <td class="text-capitaize">{{ ucwords($alternatif->nama) }}</td>
                        <td>{{ ucwords($alternatif->kelas) }}</td>
                        @if (Auth::user()->role == 'operator')
                        <td>

                            <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                                class="btn btn-warning text-light me-3 btn-flat btn-sm"><i class="bi bi-pencil-square"></i>  Ubah
                            </a>

                            <form method="POST" action="{{ route('alternatif.destroy', $alternatif->id) }}"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $alternatif->id }}"><i class="bi bi-trash"></i> Hapus
                                </button>
                                <div class="modal fade" id="confirmDeleteModal{{ $alternatif->id }}" tabindex="-1"
                                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data {{ $alternatif->nama }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('sweetalert::alert')

@endsection
