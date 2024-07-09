@extends('layouts.app', ['title' => 'Permit - E-Attend'])

@section('header')
    {{-- Css Date Picker --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <style>
        .datepicker-modal {
            max-height: 430px !important;
        }

        .datepicker-date-display {
            background-color: #1e74fd !important;
        }
    </style>
    {{-- App Header --}}
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="{{ route('izin.index') }}" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Permit</div>
        <div class="right"></div>
    </div>
    {{-- App Header --}}
@endsection

@section('content')
    <div class="row" style="margin-top: 70px">
        <div class="col">
            <form method="POST" action="{{ route('izin.store') }}" id="formIzin">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="tgl_izin" id="tgl_izin" class="form-control datepicker"
                                placeholder="Date">
                        </div>
                        <div class="form-group">
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Reason</option>
                                <option value="i">Izin</option>
                                <option value="s">Sakit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" placeholder="Detail"></textarea>
                        </div>
                        <div class="form-control">
                            <button class="btn btn-primary w-100">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endSection

@push('date-picker')
    <script>
        var currYear = (new Date()).getFullYear();
        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd"
            });

            $("#tgl_izin").change(function(e) {
                var tgl_izin = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('izin.cekpengajuanizin') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        tgl_izin: tgl_izin
                    },
                    cache: false,
                    success: function(response) {
                        if (response == 1) {
                            Swal.fire({
                                title: "Oops!",
                                text: "Have you submitted a leave / sick request on that date!",
                                icon: "warning",
                            }).then((result) => {
                                $("#tgl_izin").val("");
                                $("#tgl_izin").focus();
                            });
                            return false;
                        }
                    }
                });
            });

            $("#formIzin").submit(function() {
                var tgl_izin = $("#tgl_izin").val();
                var status = $("#status").val();
                var keterangan = $("#keterangan").val();
                if (tgl_izin == "") {
                    Swal.fire({
                        title: "Oops!",
                        text: "The permit date cannot be empty!",
                        icon: "error",
                    });
                    return false;
                } else if (status == "") {
                    Swal.fire({
                        title: "Oops!",
                        text: "Status cannot be empty!",
                        icon: "error",
                    });
                    return false;
                } else if (keterangan == "") {
                    Swal.fire({
                        title: "Oops!",
                        text: "Detail cannot be empty!",
                        icon: "error",
                    });
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script>
@endpush
