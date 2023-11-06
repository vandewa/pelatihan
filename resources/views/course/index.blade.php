@extends('layouts.master')
@section('title', 'Semua Pelatihan')
@section('parentPageTitle', 'Pelatihan')
@section('css-link')
@include('layouts.include.form.form_css')
@stop
@section('page-style')
@stop
@section('content')
<!-- BEGIN:content -->
<div class="card m-b-30">
    <div class="row px-3 pt-3">
        <h3 class="col-md-6">
            @translate(List Pelatihan)
        </h3>
        <div class="col-md-6">
            <form method="get" action="">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="@translate(Cari Pelatihan)"
                        value="{{ Request::get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            @translate(Search)
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (auth()->user()->user_type != 'Executive')
    <div class="text-right mt-3">
        <a href="{{ route('course.create') }}" class="btn btn-primary">
            <i class="la la-plus"></i>
            @translate(Tambah data baru)
        </a>
    </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class="table foo-filtering-table text-center">
                <thead class="text-center">
                    <tr class="footable-header">
                        <th data-breakpoints="xs" class="footable-first-visible">
                            @translate(S/L)
                        </th>
                        <th>
                            @translate(Judul)
                        </th>
                        <th>
                            @translate(Kategori)
                        </th>
                        <th data-breakpoints="xs">
                            @translate(Info)
                        </th>
                        <th>@translate(Siswa terdaftar)</th>
                        @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Admin')
                        <th data-breakpoints="xs">
                            @translate(Menerbitkan)
                        </th>
                        @endif
                        <th>@translate(Action)</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td class="footable-first-visible">
                            {{ $loop->index + 1 + ($courses->currentPage() - 1) * $courses->perPage() }}
                        </td>
                        <td class="w-45 text-left">
                            <a href="{{ route('course.edit', [$course->id, $course->slug]) }}">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 overflow-auto my-auto">
                                            <img src="{{ filePath($course->image) }}" class="card-img avatar-xl"
                                                alt="Card image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title font-16">{{ $course->title }}</h5>
                                                <p class="text-secondary">{{ $course->level }}</p>

                                                <div class="d-flex justify-content-between">
                                                    {{-- <div> --}}
                                                        <span
                                                            class="badge badge-{{ $course->level == 'Terbuka' ? 'success' : 'danger' }} p-2">{{
                                                            $course->level == 'Terbuka' ? 'Terbuka' : 'Tertutup'
                                                            }}</span>
                                                        <span
                                                            class="badge badge-{{ $course->is_published ? 'primary' : 'secondary' }} p-2">{{
                                                            $course->is_published ? 'Terbit' : 'Draft' }}</span>
                                                        {{--
                                                    </div> --}}
                                                    {{-- @if ($course->is_discount == true)
                                                    <span>{{ formatPrice($course->discount_price) }}</span>
                                                    <span> <del> {{ formatPrice($course->price) }} </del>
                                                    </span>
                                                    @else
                                                    <span>{{ $course->price != null ? formatPrice($course->price) :
                                                        'Free' }}</span>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td><span class="badge badge-info">{{ $course->relationBetweenCategory->name }}</span>
                        </td>
                        <td>
                            Logbook - {{ $course->logbook->count() }}
                        </td>
                        <td> <a href="{{ route('course.pel', [$course->id, $course->slug]) }}">{{ $s =
                                App\Model\Enrollment::where('course_id', $course->id)->count() }}
                        </td>
                        @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Admin')
                        <td>
                            <div class="switchery-list">
                                <input type="checkbox" data-url="{{ route('course.publish') }}"
                                    data-id="{{ $course->id }}" class="js-switch-primary" id="category-switch" {{
                                    $course->is_published == true ? 'checked' : null }} />
                            </div>
                        </td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetRevenue"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal-"></i></button>
                                <div class="dropdown-menu dropdown-menu-right st-drop" aria-labelledby="widgetRevenue"
                                    x-placement="bottom-end">
                                    <a class="dropdown-item font-13"
                                        href="{{ route('course.pel', [$course->id, $course->slug]) }}">
                                        <i class="feather icon-users mr-2"></i>@translate(Peserta)
                                    </a>

                                    <a class="dropdown-item font-13"
                                        href="{{ route('course.edit', [$course->id, $course->slug]) }}">
                                        <i class="feather icon-edit-2 mr-2"></i>@translate(Edit)
                                    </a>
                                    <a class="dropdown-item font-13"
                                        onclick="confirm_modal('{{ route('course.destroy', [$course->id, $course->slug]) }}')"
                                        href="#!">
                                        <i class="feather icon-trash mr-2"></i>@translate(Delete)</a>
                                </div>
                            </div>
                        </td>
                        @endif

                        @if (\Illuminate\Support\Facades\Auth::user()->user_type != 'Admin')
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetRevenue"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal-"></i></button>
                                <div class="dropdown-menu dropdown-menu-right st-drop" aria-labelledby="widgetRevenue"
                                    x-placement="bottom-end">
                                    <a class="dropdown-item font-13"
                                        href="{{ route('course.pel', [$course->id, $course->slug]) }}">
                                        <i class="feather icon-users mr-2"></i>@translate(Peserta)
                                    </a>
                                    @if (auth()->user()->user_type != 'Executive')
                                    <a class="dropdown-item font-13"
                                        href="{{ route('course.edit', [$course->id, $course->slug]) }}">
                                        <i class="feather flaticon-earth-globe mr-2"></i>@translate(Details)
                                    </a>
                                    @endif
                                    @if (auth()->user()->user_type != 'Executive')
                                    <a class="dropdown-item font-13"
                                        href="{{ route('course.edit', [$course->id, $course->slug]) }}">
                                        {{ Auth::user()->user_type == 'Admin' ? '@translate(Details)' :
                                        '@translate(Edit)' }}
                                    </a>
                                    @endif
                                    @if ($s < 0) <a class="dropdown-item font-13"
                                        onclick="confirm_modal('{{ route('course.destroy', [$course->id, $course->slug]) }}"
                                        href="#!">
                                        @translate(Sampah)
                                        </a>
                                        @endif
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <img src="{{ filePath('no-course-found.jpg') }}" class="img-fluid w-100"
                                alt="#No COurse Found">
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <div class="float-left">
                    {{ $courses->links() }}
                </div>
            </table>
        </div>
    </div>
</div>
<!-- END:content -->
@endsection
@section('js-link')

@stop
@section('page-script')
@stop