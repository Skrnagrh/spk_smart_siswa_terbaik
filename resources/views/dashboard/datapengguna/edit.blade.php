<div class="modal fade" id="penggunaedit{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><strong>E</strong>dit <strong>D</strong>ata
                    <strong>P</strong>etugas
                </h1>
            </div>
            <form method="post" action="{{ route('datapengguna.update', $user->id) }}" class="mb-3 p-3"
                id="editdatapetugas" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="modal-body justify-content-start">

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap<span
                                style="color: red">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $user->name }}" placeholder="Nama Lengkap">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Alamat Email<span
                                style="color: red">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" required
                            value="{{ $user->email }}" placeholder="Alamat Email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan<span
                                style="color: red">*</span></label>
                        <div class="col-sm-12">
                            <select class="form-select" name="role" onchange="updateKelasField(this.value)">
                                <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator
                                </option>
                                <option value="walikelas" {{ $user->role == 'walikelas' ? 'selected' : '' }}>Walikelas
                                </option>
                            </select>
                        </div>
                    </div>

                    <div id="kelasField" class="mb-3" style="{{ $user->role == 'operator' ? 'display: none;' : '' }}">
                        <label for="password" class="form-label text-dark">Kelas<span
                                style="color: red">*</span></label>
                        <div class="col-sm-12">
                            <select class="form-select" name="kelas">
                                <option value="" selected>Pilih Kelas</option>
                                @php
                                $kelasOptions = ['XII AP 1', 'XII AP 2', 'XII AK 1', 'XII AK 2', 'XII TKJ 1', 'XII TKJ
                                2'];
                                $usedKelas = App\Models\User::where('role', '!=',
                                'operator')->pluck('kelas')->toArray();
                                $selectedKelas = old('kelas');
                                @endphp
                                @foreach ($kelasOptions as $kelas)
                                @if (!in_array($kelas, $usedKelas))
                                <option value="{{ $kelas }}" @if($kelas==$selectedKelas) selected @endif>{{ $kelas }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function updateKelasField(selectedRole) {
        const kelasField = document.getElementById('kelasField');
        const kelasSelect = kelasField.querySelector('select[name="kelas"]');

        if (selectedRole === 'operator') {
            kelasField.style.display = 'none';
            kelasSelect.selectedIndex = 0;
        } else {
            kelasField.style.display = 'block';

            // Tampilkan select kelas jika peran diubah ke walikelas
            if (kelasSelect.selectedIndex === 0) {
                kelasSelect.selectedIndex = 1;
            }
        }
    }

    // Jalankan fungsi saat halaman pertama kali dimuat
    updateKelasField(document.querySelector('select[name="role"]').value);
</script>