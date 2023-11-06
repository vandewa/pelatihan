@extends('frontend.app')

@section('content')
<!-- ================================
                          START BREADCRUMB AREA
                      ================================= -->
<section class="breadcrumb-area breadcrumb-detail-area" style="background-image: url({{ filePath($s_course->image) }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content breadcrumb-detail-content">
                    <div class="section-heading">
                        @if (bestSellingTags($s_course->id))
                        <div class="card-badge">
                            <span class="badge-label">@translate(paling laris)</span>
                        </div>
                        @endif
                        <h2 class="section__title mt-1">{{ $s_course->title }}</h2>
                        <h5 class="widget-title mt-2">
                            @foreach (json_decode($s_course->outcome) as $item)
                            {{ $item }},
                            @endforeach
                        </h5>
                    </div>
                    <ul class="breadcrumb__list mt-2">
                        {{-- <li>@translate(Dibuat oleh) <a href="{{ route('single.instructor', $s_course->slug) }}">
                                Admin</a>
                        </li> --}}
                        <li><i class="fa fa-users fa-fw"></i> {{ number_format(App\Model\Enrollment::where('course_id',
                            $s_course->id)->count()) }}
                            @translate(Siswa Terdaftar)
                        </li>
                        <li><i class="fa fa-file fa-fw"></i> Pendaftaran
                            {{ \Carbon\Carbon::parse($s_course->mulai_pendaftaran)->format('d M Y') }} s/d
                            {{ \Carbon\Carbon::parse($s_course->berakhir_pendaftaran)->format('d M Y') }}</li>
                        {{-- <li><i class="la la-globe"></i> {{ $s_course->language }}</li> --}}
                        {{-- @if ($s_course->logbook->count() > 0)
                        <li>@translate(Terakhir Diupdate)
                            @if (empty($s_course->classes->last()->contents->last()->created_at))
                            {{ $s_course->classes->last()->created_at->format('d M, Y') }}
                            @else
                            {{ $s_course->classes->last()->contents->last()->created_at->format('d M, Y') }}
                            @endif
                        </li>
                        @endif --}}
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
                            END BREADCRUMB AREA
                        ================================= -->
<div id="mobile-sidebar-preview" class="sidebar-widget sidebar-preview">
    <div class="sidebar-preview-titles">
        <h3 class="widget-title">@translate(Lihat Pelatihan Ini)</h3>
        <span class="section-divider"></span>
    </div>
    <div class="preview-video-and-details">
        <div class="preview-course-video">
            {{-- <a href="javascript:void(0)" data-toggle="modal" data-target=".preview-modal-form">
                <img data-original="{{ filePath($s_course->image) }}" alt="{{ $s_course->title }}">
                <div class="play-button">
                    <div class="square-60 bg-dark p-3 rounded-circle">
                        <i class="la la-play text-white play-icon"></i>
                    </div>
                </div>
            </a> --}}
            <img src="{{ filePath($s_course->image) }}" alt="{{ $s_course->title }}">
        </div>
        <div class="preview-course-content">


            <div class="preview-course-incentives">

                <div class="section-block"></div>
                <div class="video-content-btn d-flex align-items-center justify-content-between pb-3 pt-3">

                    <p class="preview-course__price d-flex align-items-center">

                        <!-- @if ($s_course->is_free)
    {{-- free price --}} -->
                        <!-- <span class="price-current">@translate(Free)</span> -->
                        <!--
@else
    @if ($s_course->is_discount)
    {{-- discounted price --}}
                                                        <span class="price-current f-24">{{ formatPrice($s_course->discount_price) }}</span>
                                                        {{-- actual price --}}
                                                        <span class="price-before f-24">{{ formatPrice($s_course->price) }}</span>
                                                        {{-- percentage of discount --}}
@else
    {{-- actual price --}}
                                                        <span class="price-current f-24">{{ formatPrice($s_course->price) }}</span>
    @endif
    @endif -->
                    </p>

                    <!-- @auth()
        <a href="#!"
                                                                       onclick="addToCart({{ $s_course->id }},'{{ route('add.to.wishlist') }}')"
                                                                       class="card__collection-icon love-{{ $s_course->id }}"><span
                                                                            class="la la-heart-o love-span-{{ $s_course->id }}"></span></a>
    @endauth -->

                    @guest()
                    <a href="{{ route('login') }}" class="card__collection-icon" data-toggle="tooltip"
                        data-placement="top" title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                    @endguest
                </div>
                <div class="section-block"></div>

            </div><!-- end preview-course-incentives -->
            <div class="buy-course-btn mb-3 text-center">
                @auth()
                @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Student')
                {{-- <a href="#!" class="theme-btn w-100 mb-3 addToCart-{{ $s_course->id }}"
                    onclick="addToCart({{ $s_course->id }},'{{ route('add.to.cart') }}')">Daftar</a> --}}
                @if (countEnrollmentProgress(auth()->user() && auth()->user()->id) < 1) <form
                    action="{{ route('enroll.course', ['id' => $s_course->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="theme-btn w-100 mb-3">Daftar</button>
                    </form>
                    @else
                    <button type="button" disabled class="theme-btn-light w-100 mb-3">Daftar</button>
                    {{-- <div class="small text-secondary">Anda masih memiliki pelatihan yang sedang berjalan.</div>
                    --}}
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="theme-btn w-100 mb-3">Daftar</a>
                    @endif
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="theme-btn w-100 mb-3">Daftar</a>

                    @endguest
            </div>
        </div><!-- end preview-course-content -->
    </div><!-- end preview-video-and-details -->
</div><!-- end sidebar-widget -->

<div id="mobile-sidebar-feature" class="sidebar-widget sidebar-feature">
    <h3 class="widget-title">Fitur Pelatihan</h3>
    <span class="section-divider"></span>
    <ul class="list-items">
        {{-- <li>
            <span><i class="la la-clock-o"></i>@translate(Duration)</span>


            @php
            $total_duration = 0;
            foreach ($s_course->classes as $item){
            $total_duration +=$item->contents->sum('duration');
            }

            @endphp
            {{duration($total_duration)}}

        </li> --}}
        <li>
            <span><i class="la la-play-circle-o"></i> Materi</span>

            <span>{{ $s_course->logbook->count() }}</span>
        </li>

        {{-- <li>
            <span> <i class="la la-language"></i>@translate(Bahasa)</span>
            <span>{{ $s_course->language }}</span>
        </li> --}}
        <li>
            <span><i class="la la-level-up"></i> Tipe</span>
            <span>{{ $s_course->level }}</span>
        </li>
        <li>
            <span> <i class="la la-users"></i> Jumlah Siswa Terdaftar</span>
            <span>{{ App\Model\Enrollment::where('course_id', $s_course->id)->count() }}</span>
        </li>

    </ul>
</div><!-- end sidebar-widget -->

<!--======================================
                                START COURSE DETAIL
                        ======================================-->
<section class="course-detail margin-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-detail-content-wrap margin-top-100px">
                    <div class="post-overview-card margin-bottom-50px">

                        {!! $s_course->short_description !!}

                    </div><!-- end post-overview-card -->
                    <div class="requirement-wrap margin-bottom-40px">
                        <h3 class="widget-title">@translate(Persyaratan)</h3>

                        <ul class="list-items mt-3">
                            @foreach (json_decode($s_course->requirement) as $requirement)
                            <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>


                    </div><!-- end requirement-wrap -->
                    <div class="description-wrap margin-bottom-40px">

                        {{-- big_description goes here --}}
                        {!! $s_course->big_description !!}
                        {{-- big_description goes here END --}}

                    </div><!-- end description-wrap -->

                    <div class="curriculum-wrap margin-bottom-60px">
                        <div class="curriculum-header d-flex align-items-center justify-content-between">
                            <div class="curriculum-header-left">
                                <h3 class="widget-title"> Materi Pelatihan</h3>
                            </div>
                            <div class="curriculum-header-right">
                                <span class="curriculum-total__text"><strong> Total:</strong>
                                    {{ $s_course->logbook->count() }} materi
                                </span>
                                {{-- <span class="curriculum-total__text"><strong>@translate(Total):</strong>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($s_course->classes as $item)
                                    <span class="invisible">{{ $total += $item->contents->count() }}</span>
                                    @endforeach
                                    {{ $total }} @translate(lectures)
                                </span> --}}
                                {{-- <span class="curriculum-total__hours"><strong>@translate(Total hours):</strong>
                                    @php
                                    $total_duration = 0;
                                    foreach ($s_course->classes as $item) {
                                    $total_duration += $item->contents->sum('duration');
                                    }

                                    @endphp
                                    {{ duration($total_duration) }}
                                </span> --}}
                            </div>
                        </div><!-- end curriculum-header -->
                        <div class="curriculum-content">
                            <div class="accordion-shared">
                                <div class="accordion" id="accordionExample">
                                    @forelse ($s_course->logbook as $item)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button
                                                    class="btn btn-link d-flex align-items-center justify-content-between"
                                                    type="button" data-toggle="collapse"
                                                    data-target="#collapse-{{ $item->id }}" aria-expanded="true"
                                                    aria-controls="collapse-{{ $item->id }}">
                                                    <i class="fa fa-angle-up"></i>
                                                    <i class="fa fa-angle-down"></i>
                                                    {{ $item->name }}
                                                </button>
                                            </h2>
                                        </div><!-- end card-header -->

                                        {{-- <div id="collapse-{{ $item->id }}"
                                            class="collapse {{ $loop->first ? 'show' : '' }}"
                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul class="list-items">
                                                    @forelse ($item->contents as $content)
                                                    <li>


                                                        @if ($content->is_preview === 1)
                                                        <a href="javascript:void(0)"
                                                            class="primary-color-2 d-flex align-items-center justify-content-between"
                                                            onclick="forModal('{{ route('content.video.preview', $content->id) }}', '{{ $content->title }}')">
                                                            <span><i class="fa fa-play-circle mr-2"></i>{{
                                                                $content->title }}
                                                                <span class="badge-label">@translate(Lihat)</span>
                                                                @else
                                                                <a href="javascript:void(0)"
                                                                    class="primary-color-2 d-flex align-items-center justify-content-between">
                                                                    <span><i class="fa fa-play-circle mr-2"></i>{{
                                                                        $content->title }}
                                                                        <span
                                                                            class="badge-label badge-secondary">@translate(Terkunci)</span>
                                                                        @endif

                                                                    </span>

                                                                    <span class="course-duration">{{
                                                                        duration($content->duration) }}
                                                                    </span>
                                                                </a>

                                                    </li>
                                                    @empty
                                                    @translate(Tidak ada isi)
                                                    @endforelse
                                                </ul>
                                            </div><!-- end card-body -->
                                        </div> --}}
                                        <!-- end collapse -->

                                    </div><!-- end card -->

                                    @empty

                                    @translate(No Items)
                                    @endforelse

                                </div><!-- end accordion -->
                            </div>
                        </div><!-- end curriculum-content -->
                    </div><!-- end curriculum-wrap -->

                    <div class="section-block"></div>
                    <div class="view-more-courses mt-5">
                        <h3 class="widget-title">@translate(Siswa juga membeli)</h3>
                        <div class="view-more-carousel margin-top-30px margin-bottom-50px">
                            @foreach ($sug_courses as $course)
                            <div class="column-td-half">
                                <div class="card-item card-preview"
                                    data-tooltip-content="#tooltip_content_{{ $course->id }}">
                                    <div class="card-image">
                                        <a href="{{ route('course.single', $course->slug) }}" class="card__img"><img
                                                data-original="{{ filePath($course->image) }}"
                                                alt="{{ $course->title }}"></a>
                                        @if (bestSellingTags($course->id))
                                        <div class="card-badge">
                                            <span class="badge-label">@translate(paling laris)</span>
                                        </div>
                                        @endif
                                    </div><!-- end card-image -->
                                    <div class="card-content">
                                        <p class="card__label">
                                            <span class="card__label-text">{{ $course->level }}</span>
                                            <!-- @auth()
        <a href="#!"
                                                                                                   onclick="addToCart({{ $course->id }},'{{ route('add.to.wishlist') }}')"
                                                                                                   class="card__collection-icon love-{{ $course->id }}"><span

                                                                                                        class="la la-heart-o love-span-{{ $course->id }}"></span></a>
    @endauth -->

                                            @guest()
                                            <a href="{{ route('login') }}" class="card__collection-icon"
                                                data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                                                    class="la la-heart-o"></span></a>
                                            @endguest
                                        </p>
                                        <h3 class="card__title">
                                            <a href="{{ route('course.single', $course->slug) }}">{{ $course->title
                                                }}</a>
                                        </h3>
                                        <p class="card__author">
                                            <a href="{{ route('single.instructor', $course->slug) }}"> Admin</a>
                                        </p>
                                        <div class="rating-wrap d-flex mt-2 mb-3">
                                            <span class="star-rating-wrap">
                                                @translate(Terdaftar) <span class="star__count">{{
                                                    \App\Model\Enrollment::where('course_id', $course->id)->count()
                                                    }}</span>
                                            </span>
                                        </div><!-- end rating-wrap -->
                                        <div class="card-action">
                                            <ul class="card-duration d-flex justify-content-between align-items-center">
                                                <li>
                                                    <span class="meta__date">
                                                        <i class="la la-play-circle"></i>
                                                        {{ $course->logbook->count() }} Materi Pelatihan
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="meta__date">
                                                        @php
                                                        $total_duration = 0;
                                                        foreach ($course->classes as $item) {
                                                        $total_duration += $item->contents->sum('duration');
                                                        }
                                                        @endphp
                                                        {{-- <i class="la la-clock-o"></i>{{duration($total_duration)}}
                                                        --}}

                                                    </span>
                                                </li>
                                            </ul>
                                        </div><!-- end card-action -->
                                        <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                            <!--if free-->
                                            @if ($course->is_free)
                                            <span class="card__price">@translate(Gratis)</span>
                                            @else
                                            @if ($course->is_discount)
                                            <span class="card__price"><del>{{ formatPrice($course->price)
                                                    }}</del></span>
                                            <span class="card__price">{{ formatPrice($course->discount_price) }}</span>
                                            @else
                                            <span class="card__price">{{ formatPrice($course->price) }}</span>
                                            @endif
                                            @endif
                                            <!--there are the login-->
                                            @auth()
                                            @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Student')
                                            {{-- <a href="#!" class="text-btn addToCart-{{ $course->id }}"
                                                onclick="addToCart({{ $course->id }},'{{ route('add.to.cart') }}')">Daftar</a>
                                            --}}
                                            @if (countEnrollmentProgress(auth()->user() && auth()->user()->id) < 1)
                                            <form action="{{ route('enroll.course', ['id' => $s_course->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="theme-btn mb-3">Daftar</button>
                                            </form>
                                        @else
                                            @php
                                                $enrollmentOrder = getEnrollmentOrder(auth()->user()->id); // Replace with your actual function to get enrollment order
                                            @endphp
                                            <button type="button" disabled class="theme-btn-light mb-3">Daftar</button>
                                            <div class="small text-secondary">
                                                Anda sudah terdaftar dengan urutan ke-{{ $enrollmentOrder }}.
                                            </div>
                                        @endif

                                                <a href="{{ route('login') }}" class="text-btn">Daftar</a>
                                                @endif
                                                @endauth

                                                @guest()
                                                <a href="{{ route('login') }}" class="text-btn">Daftar</a>
                                                @endguest


                                        </div><!-- end card-price-wrap -->
                                    </div><!-- end card-content -->
                                </div>
                            </div>
                            @endforeach

                        </div><!-- end view-more-carousel -->
                    </div><!-- end view-more-courses -->


                    @foreach ($sug_courses as $tooltip)
                    <div class="tooltip_templates">
                        <div id="tooltip_content_{{ $tooltip->id }}">
                            <div class="card-item">
                                <div class="card-content">
                                    {{-- <p class="card__author">
                                        @translate(Oleh) <a href="{{ route('single.instructor', $tooltip->slug) }}">{{
                                            $tooltip->name }}</a>
                                    </p> --}}
                                    <h3 class="card__title">
                                        <a href="{{ route('course.single', $tooltip->slug) }}">{{
                                            \Illuminate\Support\Str::limit($tooltip->title, 58) }}</a>
                                    </h3>
                                    <p class="card__label">
                                        <span class="mr-1">@translate(di)</span><a
                                            href="{{ route('course.category', $tooltip->category->slug) }}"
                                            class="mr-1">{{ $tooltip->category->name }}</a>
                                    </p>
                                    <div class="rating-wrap d-flex mt-2 mb-3">

                                        <span class="star-rating-wrap">
                                            @translate(Terdaftar) <span class="star__count">{{
                                                \App\Model\Enrollment::where('course_id', $item->id)->count() }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    <ul class="list-items mb-3 font-size-14">
                                        @foreach (json_decode($tooltip->requirement) as $requirement)
                                        <li>{{ $requirement }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="card-action">
                                        <ul class="card-duration d-flex justify-content-between align-items-center">
                                            <li><span class="meta__date"><i class="la la-play-circle"></i>
                                                    {{ $tooltip->logbook->count() }} Materi</span>
                                            </li>
                                            <li><span class="meta__date">
                                                    @php
                                                    $total_duration = 0;
                                                    foreach ($tooltip->classes as $item) {
                                                    $total_duration += $item->contents->sum('duration');
                                                    }
                                                    @endphp
                                                    {{-- <i class="la la-clock-o"></i>{{ duration($total_duration) }}
                                                    --}}
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="btn-box w-100 text-center mb-3">
                                        <a href="{{ route('course.single', $tooltip->slug) }}"
                                            class="theme-btn d-block">
                                            @translate(Lihat Pelatihan Ini)</a>
                                    </div>

                                </div><!-- end card-content -->
                            </div><!-- end card-item -->
                        </div>
                    </div><!-- end tooltip_templates -->
                    @endforeach



                    <div class="section-block"></div>


                </div><!-- end course-detail-content-wrap -->
            </div><!-- end col-lg-8 -->
            @foreach (App\Model\Course::Published()->where('user_id', $s_course->user_id)->latest()->get()->take(6)
            as $tooltip)
            <div class="tooltip_templates">
                <div id="tooltip_content_{{ $tooltip->id }}">
                    <div class="card-item">
                        <div class="card-content">
                            {{-- <p class="card__author">
                                @translate(Oleh) <a href="{{ route('single.instructor', $tooltip->slug) }}">{{
                                    $tooltip->name }}</a>
                            </p> --}}
                            <h3 class="card__title">
                                <a href="{{ route('course.single', $tooltip->slug) }}">{{
                                    \Illuminate\Support\Str::limit($tooltip->title, 58) }}</a>
                            </h3>
                            <p class="card__label">
                                <span class="mr-1">@translate(di)</span><a
                                    href="{{ route('course.category', $tooltip->category->slug) }}" class="mr-1">{{
                                    $tooltip->category->name }}</a>
                            </p>
                            <div class="rating-wrap d-flex mt-2 mb-3">

                                <span class="star-rating-wrap">
                                    @translate(Terdaftar) <span class="star__count">{{
                                        \App\Model\Enrollment::where('course_id', $item->id)->count() }}</span>
                                </span>
                            </div><!-- end rating-wrap -->
                            <ul class="list-items mb-3 font-size-14">
                                @foreach (json_decode($tooltip->requirement) as $requirement)
                                <li>{{ $requirement }}</li>
                                @endforeach

                            </ul>
                            <div class="card-action">
                                <ul class="card-duration d-flex justify-content-between align-items-center">
                                    <li><span class="meta__date"><i class="la la-play-circle"></i>
                                            {{ $tooltip->logbook->count() }} materi</span>
                                    </li>
                                    {{-- <li><span class="meta__date">
                                            @php
                                            $total_duration = 0;
                                            foreach ($tooltip->classes as $item) {
                                            $total_duration += $item->contents->sum('duration');
                                            }
                                            @endphp
                                            <i class="la la-clock-o"></i>{{ duration($total_duration) }}
                                        </span>
                                    </li> --}}
                                </ul>
                            </div><!-- end card-action -->
                            <div class="btn-box w-100 text-center mb-3">
                                <a href="{{ route('course.single', $tooltip->slug) }}" class="theme-btn d-block">
                                    @translate(Lihat Pelatihan Ini)</a>
                            </div>

                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div>
            </div><!-- end tooltip_templates -->
            @endforeach
            <div class="col-lg-4">
                <div class="sidebar-component">
                    <div class="sidebar">
                        <div id="sidebar-preview" class="sidebar-widget sidebar-preview">
                            <div class="sidebar-preview-titles">
                                <h3 class="widget-title">@translate(Lihat Pelatihan Ini)</h3>
                                <span class="section-divider"></span>
                            </div>
                            <div class="preview-video-and-details">
                                <div class="preview-course-video">
                                    {{-- <a href="javascript:void(0)" data-toggle="modal"
                                        data-target=".preview-modal-form">
                                        <img data-original="{{ filePath($s_course->image) }}"
                                            alt="{{ $s_course->title }}">
                                        <div class="play-button">
                                            <div class="square-60 bg-dark p-3 rounded-circle">
                                                <i class="la la-play text-white play-icon"></i>
                                            </div>
                                        </div>
                                    </a> --}}
                                    <img src="{{ filePath($s_course->image) }}" alt="{{ $s_course->title }}">
                                </div>
                                <div class="preview-course-content">

                                    @if (enrollmentCourse($s_course->slug, auth()->user() && auth()->user()->id) < 1)
                                        <div class="preview-course-incentives">

                                        <div class="section-block"></div>
                                        <div
                                            class="video-content-btn d-flex align-items-center justify-content-between pb-3 pt-3">

                                            <p class="preview-course__price d-flex align-items-center mb-0">Tambah ke
                                                Wishlist</p>

                                            @auth()
                                            <a href="#!"
                                                onclick="addToCart({{ $s_course->id }},'{{ route('add.to.wishlist') }}')"
                                                class="card__collection-icon love-{{ $s_course->id }}"><span
                                                    class="la la-heart-o love-span-{{ $s_course->id }}"></span></a>
                                            @endauth

                                            @guest()
                                            <a href="{{ route('login') }}" class="card__collection-icon"
                                                data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                                                    class="la la-heart-o"></span></a>
                                            @endguest
                                        </div>
                                        <div class="section-block"></div>

                                </div>
                                <!-- end preview-course-incentives -->
                                @endif

                                <div class="buy-course-btn mb-3 text-center">
                                    @auth()
                                    @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Student')
                                    {{-- <a href="#!" class="theme-btn w-100 mb-3 addToCart-{{ $s_course->id }}"
                                        onclick="addToCart({{ $s_course->id }},'{{ route('add.to.cart') }}')">Daftar</a>
                                    --}}
                                    @if (countEnrollmentProgress(auth()->user()->id) < 1) <form
                                        action="{{ route('enroll.course', ['id' => $s_course->id]) }}" method="post">
                                        @csrf

                                        <button type="submit" class="theme-btn w-100 mb-3">Daftar</button>
                                        </form>
                                        @else
                                        <button type="button" disabled
                                            class="theme-btn-light w-100 mb-3">Daftar</button>
                                        <div class="small text-secondary">Anda masih memiliki pelatihan yang sedang
                                            berjalan.</div>
                                        @endif
                                        @else
                                        <a href="{{ route('login') }}" class="theme-btn w-100 mb-3">Daftar</a>
                                        @endif
                                        @endauth
                                        @guest
                                        <a href="{{ route('login') }}" class="theme-btn w-100 mb-3">Daftar</a>

                                        @endguest
                                </div>

                            </div><!-- end preview-course-content -->
                        </div><!-- end preview-video-and-details -->
                    </div><!-- end sidebar-widget -->

                    <div id="sidebar-feature" class="sidebar-widget sidebar-feature">
                        <h3 class="widget-title">Fitur Pelatihan</h3>
                        <span class="section-divider"></span>
                        <ul class="list-items">
                            {{-- <li>
                                <span><i class="la la-clock-o"></i>@translate(Duration)</span>


                                @php
                                $total_duration = 0;
                                foreach ($s_course->classes as $item){
                                $total_duration +=$item->contents->sum('duration');
                                }

                                @endphp
                                {{duration($total_duration)}}

                            </li> --}}
                            <li>
                                <span><i class="la la-play-circle-o"></i> Materi</span>

                                <span>{{ $s_course->logbook->count() }}</span>
                            </li>

                            {{-- <li>
                                <span> <i class="la la-language"></i> @translate(Language)</span>
                                <span>{{ $s_course->language }}</span>
                            </li> --}}
                            <li>
                                <span><i class="la la-level-up"></i> Tipe</span>
                                <span>{{ $s_course->level }}</span>
                            </li>
                            <li>
                                <span> <i class="la la-users"></i> Siswa Terdaftar</span>
                                <span>{{ App\Model\Enrollment::where('course_id', $s_course->id)->count() }}</span>
                            </li>

                        </ul>
                    </div><!-- end sidebar-widget -->

                    <div class="sidebar-widget recent-widget">
                        <h3 class="widget-title"> Pelatihan Terbaru</h3>
                        <span class="section-divider"></span>
                        {{-- latest courses: START --}}
                        @foreach ($l_courses as $l_course)
                        <div class="recent-item">
                            <div class="recent-img">
                                <a href="{{ route('course.single', $l_course->slug) }}">
                                    <img data-original="{{ filePath($l_course->image) }}" alt="{{ $l_course->titlw }}">
                                </a>
                            </div><!-- end recent-img -->
                            <div class="recentpost-body">
                                <span class="recent__meta"> {{ $l_course->created_at->format('d M, Y') }}
                                    @translate(by) <a href="{{ route('single.instructor', $l_course->slug) }}">{{
                                        $l_course->name }}</a></span>
                                <h4 class="recent__link">
                                    <a href="{{ route('course.single', $l_course->slug) }}">{{
                                        \Illuminate\Support\Str::limit($l_course->title, 58) }}</a>
                                </h4>

                                @if ($l_course->is_free)
                                {{-- free price --}}
                                <p class="recent-course__price">@translate(Gratis)</p>
                                @else
                                @if ($l_course->is_discount)
                                {{-- discounted price --}}
                                <p class="recent-course__price">
                                    <del>{{ formatPrice($l_course->price) }}</del>
                                </p>
                                {{-- actual price --}}
                                <p class="recent-course__price">
                                    {{ formatPrice($l_course->discount_price) }}</p>
                                @else
                                {{-- actual price --}}
                                <p class="recent-course__price">{{ formatPrice($l_course->price) }}
                                </p>
                                @endif
                                @endif

                            </div><!-- end recent-img -->
                        </div><!-- end recent-item -->
                        @endforeach
                        {{-- latest courses: END --}}

                        <div class="btn-box text-center">
                            <a href="{{ route('course.filter') }}" class="theme-btn d-block">@translate(Lihat
                                semua pelatihan)</a>
                        </div><!-- end btn-box -->
                    </div><!-- end sidebar-widget -->
                    {{-- <div class="sidebar-widget tag-widget">
                        <h3 class="widget-title">@translate(Pelatihan Tags)</h3>
                        <span class="section-divider"></span>
                        <ul class="list-items">
                            @foreach (json_decode($s_course->tag) as $tag)
                            <li><a href="javascript:void()">{{ $tag ?? '' }}</a></li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <!-- end sidebar-widget -->
                </div><!-- end sidebar -->
            </div><!-- end sidebar-component -->
        </div><!-- end col-lg-4 -->
    </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end course-detail -->
<!--======================================
                                END COURSE DETAIL
                        ======================================-->


{{-- ======================================= Course Preview: START ===================================== --}}

<div class="modal-form">
    <div class="modal fade preview-modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-top">
                    <h5 class="modal-title">@translate(Pelatihan Preview): {{ $s_course->title }}</h5>
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (isset($s_course->overview_url))
                    @if ($s_course->provider === 'Youtube')
                    <iframe width="100%" height="600"
                        src="https://www.youtube.com/embed/{{ Str::after($s_course->overview_url, 'https://youtu.be/') }}"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    @elseif($s_course->provider === 'Vimeo')
                    <iframe
                        src="https://player.vimeo.com/video/{{ Str::after($s_course->overview_url, 'https://vimeo.com/') }}"
                        width="100%" height="600" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    @else
                    <video controls crossorigin playsinline id="player">
                        <source src="{{ $s_course->overview_url }}" type="video/mp4" size="100%" />

                    </video>
                    @endif
                    @endif

                </div>
            </div>
        </div>
    </div><!-- end modal -->
</div>

{{-- ======================================= Course Preview: END ===================================== --}}

@endsection