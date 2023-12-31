@extends('layouts.master')
@section('title','Language')
@section('parentPageTitle', 'Translate')

@section('css-link')

@stop

@section('page-style')

@stop
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <h3 class="panel-title text-center">@translate(Terjemahkan Bahasa)</h3>
        <p class="text-muted">@translate(Anda bisa menerjemahkan ke segala bahasa dengan dua tahap,) @translate(Ikuti
            ini),
            <br>
            @translate(Tambahkan Google Translate ke extension browser, kemudian buka bahasa untuk menerjemahkan)
            @translate(halaman, kemudian klik google translate extension, dan terjemahkan halamannya dan klik copy
            tombol terjemahan dan simpan.)
        </p>
    </div>
    <div class="card-body scrollbar" id="style-2">
        <div class="force-overflow"></div>
        <form id="trans-form" class="form-horizontal" action="{{ route('language.translate.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$lang->id}}">
            <div class="panel-body">
                <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%"
                    id="tranlation-table">
                    <tbody>
                        @foreach (openJSONFile('en') as $key => $value)
                        <tr class="">
                            <td>{{ $loop->index+1 }}</td>
                            <td class="key w-25">{{ $key }}</td>
                            <td>
                                <input type="text" class="form-control value w-100" name="translations[{{ $key }}]"
                                    @isset(openJSONFile($lang->code)[$key])
                                value="{{ openJSONFile($lang->code)[$key] }}"
                                @endisset>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <div class="form-group">
        <div class="col-lg-12 text-right">
            <button class="btn btn-primary" type="button" onclick="copy()">@translate(Copy Terjemahan)
            </button>
            <button class="btn btn-primary" id="trans-save" type="submit">@translate(Simpan)</button>
        </div>
    </div>
</div>
@endsection

@section('js-link')

@stop

@section('page-script')

@stop