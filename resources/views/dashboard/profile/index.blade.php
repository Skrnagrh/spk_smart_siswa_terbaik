@extends('layouts.dashboard')

@section('content')

<h1 class="mt-4 text-capitalize">Profile {{ auth()->user()->name }}</h1>
<hr>

<div class="row justify-content-center mt-3">

    <div class="col-md-4">
        <div class="card border-primary shadow p-2 m-2" style="background-color: #0D6EFD">
            <div class="row justify-content-center p-1" style="border: 2px solid #ffff">
                <h6 class="text-center text-light text-uppercase">Yayasan Pendidikan Islam Bina Insani</h6>
            </div>

            <div class="row justify-content-center mt-3">
                <img src="/logo/Default.png" class="img-fluid" style="max-width: 70%;">
            </div>

            <div class="row justify-content-center mt-3 p-1">
                <div class="col-md-12">
                    <h5 class="text-center text-light text-uppercase"><strong>{{ auth()->user()->name }}</strong></h5>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-light" style="margin-top: -2%">{{ auth()->user()->induk }}</p>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-light" style="margin-top: -5%">{{ auth()->user()->jabatan_id}}</p>
                </div>
            </div>
            <div class="row justify-content-center p-1" style="border: 2px solid #ffff">
                <h6 class="text-center text-light text-uppercase">Profile Petugas</h6>
            </div>
        </div>
    </div>


    <div class="col-md-5 mt-2">
        <div class="card border-primary shadow">
            <div class="card-body">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mt-2" href="{{ route('profile.edit') }}" data-bs-toggle="modal"
                    data-bs-target="#userprofileEdit">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item mt-2" data-bs-toggle="modal" data-bs-target="#editpassword">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ubah Password
                </a>

                <div class="dropdown-divider"></div>
                @include('dashboard.profile.password')
                @include('dashboard.profile.edit')
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
<style>
    input[type='file'] {
        color: rgba(0, 0, 0, 0)
    }
</style>

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