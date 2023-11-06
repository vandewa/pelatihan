@extends('install.app')
@section('content')
    <div class="text-center">
        <h1 class="ont-weight-bold">Menganalisa Izin File di Server</h1>
        <h5>Kami menganalisa apakah server anda telah sesuai. Review kembali apabila ada tanda merah di poin berikut. <br> Jika semuanya hijau, kamu bisa melanjutkan ke tahap selanjutnya.</h5>
    </div>

    <div class="m-5">
        <ul class="list-group">
            <li class="list-group-item text-semibold">
                Php version 7.3 +
                @php
                    $phpVersion = number_format((float)phpversion(), 2, '.', '');
                @endphp
                @if ($phpVersion >= 7.30)
                    <i class="fa fa-check text-success pull-right"></i>
                @else
                    <i class="fa fa-close text-danger pull-right"></i>
                @endif
            </li>
            <li class="list-group-item text-semibold">
                Curl Enabled

                @if ($permission['curl_enabled'])
                    <i class="fa fa-check text-success pull-right"></i>
                @else
                    <i class="fa fa-close text-danger pull-right"></i>

                @endif
            </li>
            <li class="list-group-item text-semibold">
                <b>.env</b> File Permission

                @if ($permission['db_file_write_perm'])
                    <i class="fa fa-check text-success pull-right"></i>
                @else
                    <i class="fa fa-close text-danger pull-right"></i>

                @endif
            </li>
        </ul>
    </div>

    <p class="m-2">
        @if ($permission['curl_enabled'] == 1 && $permission['db_file_write_perm'] == 1 &&  $phpVersion >= 7.20)
            <a href = "{{ route('create') }}" class="btn btn-block btn-info">Lanjut ke tahap selanjutnya</a>
        @endif
    </p>

@endsection
