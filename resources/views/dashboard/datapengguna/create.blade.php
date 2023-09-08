<div class="modal fade" id="mocreat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-dark" id="exampleModalLabel"><strong>R</strong>egister
                    <strong>P</strong>etugas
                    <strong>B</strong>aru
                </h3>
                <i class="bi bi-x-lg text-danger" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form method="post" action="/datapengguna" class="mb-3" enctype="multipart/form-data" id="createsuratmasuk">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap<span
                                style="color: red">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
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
                            value="{{ old('email') }}" placeholder="Alamat Email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan<span
                                style="color: red">*</span></label>
                        <div class="col-sm-12">
                            <select class="form-select" name="role" onchange="updateKelasOptions(this.value)">
                                <option value="operator" @if(old('role')=='operator' ) selected @endif>Operator</option>
                                <option value="walikelas" @if(old('role')=='walikelas' ) selected @endif>Walikelas
                                </option>
                            </select>
                        </div>
                    </div>

                    <div id="kelasField" class="mb-3" style="display: none;">
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

                    <label for="password" class="form-label text-dark">Password<span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required autofocus value="{{ old('password') }}"
                            placeholder="Password" style="height: 40px;">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="height: 40px;">
                                <i id="togglePasswordIcon" class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateKelasOptions(selectedRole) {
        const kelasField = document.getElementById('kelasField');
        if (selectedRole === 'walikelas') {
            kelasField.style.display = 'block';
        } else {
            kelasField.style.display = 'none';
        }
    }
    // Jalankan fungsi saat halaman pertama kali dimuat
    updateKelasOptions(document.querySelector('select[name="role"]').value);
</script>


<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var togglePasswordIcon = document.getElementById("togglePasswordIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePasswordIcon.classList.remove("fa-eye-slash");
            togglePasswordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            togglePasswordIcon.classList.remove("fa-eye");
            togglePasswordIcon.classList.add("fa-eye-slash");
        }
    }
</script>
