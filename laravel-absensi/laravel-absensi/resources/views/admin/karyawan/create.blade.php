@extends('layouts.admin.app', ['title' => 'Add Employee - E-Attend'])

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    {{-- Page Title --}}
                    <h2 class="page-title">
                        Form Employee
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- content --}}
                            <form method="POST" action="{{ route('karyawan.store') }}" id="formKaryawan">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 space-y-3">
                                        <div class="form-group">
                                            <label for="name">Full Name:</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Full Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Email">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nip">NIP:</label>
                                            <input type="text" name="nip" id="nip" class="form-control"
                                                value="{{ old('nip') }}" placeholder="NIP">
                                            @error('nip')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nik">NIK:</label>
                                            <input type="text" name="nik" id="nik" class="form-control"
                                                value="{{ old('nik') }}" placeholder="NIK">
                                            @error('nik')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 space-y-3">
                                        <div class="form-group">
                                            <label for="no_hp">No HP:</label>
                                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                                value="{{ old('no_hp') }}" placeholder="No HP">
                                            @error('no_hp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_lahir">TDate Of Birth:</label>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                                value="{{ old('tgl_lahir') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Address:</label>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Address">{{ old('alamat') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <select name="roles[]" id="roles" class="form-select">
                                                @foreach ($roles as $role)
                                                    <option {{ Request('roles[]') == $role->name ? 'selected' : '' }}
                                                        value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {
            $("#formKaryawan").submit(function() {
                var name = $("#name").val();
                var email = $("#email").val();
                var nip = $("#nip").val();
                var nik = $("#nik").val();
                var no_hp = $("#no_hp").val();
                var tgl_lahir = $("#tgl_lahir").val();
                var alamat = $("#alamat").val();
                var roles = $("#roles").val();

                if (name == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'Name Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#nik").focus();
                    });
                    return false;
                }

                if (email == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'Email Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#email").focus();
                    });
                    return false;
                }

                if (nip == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'NIP Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#nip").focus();
                    });
                    return false;
                }

                if (nik == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'NIK Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#nik").focus();
                    });
                    return false;
                }

                if (no_hp == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'No HP Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#no_hp").focus();
                    });
                    return false;
                }

                if (tgl_lahir == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'Date Of Birth Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#tgl_lahir").focus();
                    });
                    return false;
                }

                if (alamat == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'Address Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#alamat").focus();
                    });
                    return false;
                }

                if (roles == "") {
                    Swal.fire({
                        title: 'Warning',
                        text: 'Roles Cannot Be Empty!',
                        icon: 'warning',
                    }).then((result) => {
                        $("#roles").focus();
                    });
                    return false;
                }

                return true;

            });
        });
    </script>
@endpush
