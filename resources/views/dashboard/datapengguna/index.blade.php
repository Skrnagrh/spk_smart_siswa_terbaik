@extends('layouts.dashboard')

@section('content')
<h1 class="mt-3 text-capitalize">Data Pengguna</h1>
<hr>

<a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#mocreat" data-bs-whatever="@mdo">Tambah
    Pengguna</a>
@include('dashboard.datapengguna.create')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Pengguna
            </div>
            <div class="card-body">
                <div class="horizontal-scroll">
                    <table class="table mb-0 table-hover table-striped border-dark" id="datatablesSimple">
                        <thead class=" text-center">
                            <tr style="text-transform: capitalize">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user1 as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center" style="text-transform: capitalize">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center" style="text-transform: capitalize">{{ $user->role }}</td>
                                <td class="text-center" style="text-transform: uppercase">
                                    @if($user->role === 'walikelas' && $user->kelas === 'operator')
                                    Harap pilih kelas
                                    @else
                                    {{ $user->kelas }}
                                    @endif
                                </td>


                                <td class="d-flex justify-content-center">
                                    <a href="/datapengguna/{{ $user->id }}/edit"
                                        class="btn btn-warning text-light me-2 btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#penggunaedit{{ $user->id }}"><i
                                            class="bi bi-pencil-square"></i> Ubah
                                    </a>
                                    @include('dashboard.datapengguna.edit')

                                    <form method="POST" action="{{ route('datapengguna.destroy', $user->id) }}"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" class="btn btn-sm btn-danger btn-flat"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $user->id }}"><i
                                                class="bi bi-trash"></i> Hapus
                                        </button>
                                        <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data {{ $user->name }}?
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')

@endsection