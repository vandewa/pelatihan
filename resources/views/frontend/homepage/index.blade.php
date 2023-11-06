@extends('frontend.app')
@section('content')


<!--================================
             START SLIDER AREA
    =================================-->
<section class="slider-area slider-area2">
    <div class="homepage-slide2">
        @foreach ($sliders as $item)
        <div class="single-slide-item" style="background-image: url({{ filePath($item->image) }});}">
            <div id="perticles-js-2"></div>
            <div class="slide-item-table">
                <div class="slide-item-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="section-heading">
                                    <h2 class="section__title">{{ $item->title }}</h2>
                                    <p class="section__desc">
                                        {{ $item->sub_title }}
                                    </p>
                                </div>
                                <div class="hero-search-form">
                                    <div class="contact-form-action">
                                        <form>
                                            <div class="input-box">
                                                <div class="form-group mb-0">
                                                    <!-- Search bar -->
                                                    <input class="form-control" id="slider-search" type="text"
                                                        name="search" placeholder="@translate(Pencarian untuk apapun)">
                                                    <span class="la la-search search-icon"></span>

                                                    <!-- Search bar END - -->

                                                    <!-- ======================== Search Suggession ============================= -->
                                                    <div class="overflow-hidden search-list w-100">
                                                        <div id="appendSearchCart2"></div>
                                                    </div>

                                                </div>
                                            </div><!-- end input-box -->
                                        </form>
                                    </div><!-- end contact-form-action -->
                                </div>
                            </div><!-- col-lg-6 -->
                        </div><!-- row -->
                    </div><!-- container -->


                    <div class="our-post-content">
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <div class="how-we-work-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="our-post-item">
                                            <i class="la la-mouse-pointer icon-element"></i>
                                            <div class="our__text">
                                                <h4 class="widget-title">
                                                    {{
                                                    number_format(\App\Model\Course::Published()->where('is_published',
                                                    true)->count()) }}
                                                    @translate(Pelatihan)</h4>
                                                <p>@translate(Jelajahi Berbagai Topik Terbaru)</p>
                                            </div><!-- our__text -->
                                        </div><!-- our-post-item -->
                                    </div><!-- col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="our-post-item">
                                            <i class="la la-users icon-element"></i>
                                            <div class="our__text">
                                                <h4 class="widget-title">@translate(Dari Dinas Wonosobo)</h4>
                                                <p>@translate(Temukan pelatihan yang tepat untuk Anda)</p>
                                            </div><!-- our__text -->
                                        </div><!-- our-post-item -->
                                    </div><!-- col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="our-post-item">
                                            <i class="fa fa-history icon-element"></i>
                                            <div class="our__text">
                                                <h4 class="widget-title">@translate(Akses Pelatihan)</h4>
                                                <p>@translate(Pelajari sesuai jadwal Anda)</p>
                                            </div><!-- our__text -->
                                        </div><!-- our-post-item -->
                                    </div><!-- col-lg-4 -->
                                </div><!-- row -->
                            </div>
                        </div><!-- end how-we-work-wrap -->
                    </div><!-- our-post-content -->
                </div><!-- slide-item-tablecell -->
            </div><!-- slide-item-table -->
        </div><!-- end single-slide-item -->
        @endforeach
    </div><!-- end homepage-slides -->
</section>
<!--================================
                END SLIDER AREA
        =================================-->


<!--======================================
               START LatestCourse AREA
       ======================================-->
<section class="course-area padding-top-120px">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta">@translate(Kursus Baru Kami Untuk Anda)</h5>
                        <h2 class="section__title">@translate(Pelatihan Terbaru)</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row margin-top-28px">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="course-carousel">
                            @foreach ($latestCourses as $l_course)
                            <div class="card-item card-preview"
                                data-tooltip-content="#tooltip_content_{{ $l_course->id }}">
                                <div class="card-image">
                                    <a href="{{ route('course.single', $l_course->slug) }}" class="card__img"><img
                                            src="{{ filePath($l_course->image) }}" alt="{{ $l_course->title }}"></a>
                                    @if (bestSellingTags($l_course->id))
                                    <div class="card-badge">
                                        <span class="badge-label">@translate(paling laris)</span>
                                    </div>
                                    @endif
                                </div><!-- end card-image -->
                                <div class="card-content">
                                    <p class="card__label">
                                        <span class="card__label-text">{{ $l_course->level }}</span>
                                        @auth()
                                        <a href="#!"
                                            onclick="addToCart({{ $l_course->id }},'{{ route('add.to.wishlist') }}')"
                                            class="card__collection-icon love-{{ $l_course->id }}"><span
                                                class="la la-heart-o love-span-{{ $l_course->id }}"></span></a>
                                        @endauth

                                        @guest()
                                        <a href="{{ route('login') }}" class="card__collection-icon"
                                            data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                                                class="la la-heart-o"></span></a>
                                        @endguest
                                    </p>
                                    <h3 class="card__title">
                                        <a href="{{ route('course.single', $l_course->slug) }}">{{
                                            \Illuminate\Support\Str::limit($l_course->title, 58) }}</a>
                                    </h3>
                                    <p class="card__author">

                                    </p>
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            @translate(Kategori) <span class="star__count">{{
                                                \Illuminate\Support\Str::limit($l_course->category_id, 58) }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    </p>
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            @translate(Peserta Terdaftar : ) <span class="star__count">{{
                                                $l_course->classes->count() }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                            <span class="card__price">
                                                @translate(Jadwal Pendaftaran)
                                            </span>
                                        </div>
                                    </div><!-- end rating-wrap -->
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            {{ \Carbon\Carbon::parse($l_course->mulai_pendaftaran)->format('d F Y') }}
                                            - <span class="star__count">{{
                                                \Carbon\Carbon::parse($l_course->berakhir_pendaftaran)->format('d F Y')
                                                }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->

                                    <!--there are the login-->
                                    @auth()
                                    @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Student')
                                    <a href="#!" class="text-btn addToCart-{{ $l_course->id }}"
                                        onclick="addToCart({{ $l_course->id }},'{{ route('add.to.cart') }}')">@translate(Daftar)</a>
                                    @else
                                    <a href="{{ route('login') }}" class="text-btn">@translate(Daftar)</a>
                                    @endif
                                    @endauth

                                    @guest()
                                    <a href="{{ route('login') }}" class="text-btn">@translate(Daftar)</a>
                                    @endguest


                                </div><!-- end card-price-wrap -->
                            </div><!-- end card-content -->

                            @endforeach
                        </div><!-- end course-carousel -->
                    </div><!-- end tab-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
</section><!-- end courses-area -->
@foreach ($latestCourses as $l_c_tooltip)
<div class="tooltip_templates">
    <div id="tooltip_content_{{ $l_c_tooltip->id }}">
        <div class="card-item">
            <div class="card-content">
                {{-- <p class="card__author">
                    @translate(Oleh) <a>
                    </a>
                </p> --}}
                <h3 class="card__title">
                    <a href="{{ route('course.single', $l_c_tooltip->slug) }}">{{
                        \Illuminate\Support\Str::limit($l_c_tooltip->title, 58) }}</a>
                </h3>
                <p class="card__label">
                    <span class="mr-1">@translate(di)</span><a
                        href="{{ route('course.category', $l_c_tooltip->category->slug) }}" class="mr-1">{{
                        $l_c_tooltip->category->name }}</a>
                </p>
                <div class="rating-wrap d-flex mt-2 mb-3">

                    <span class="star-rating-wrap">
                        @translate(Kategori) <span class="star__count">{{ \App\Model\Enrollment::where('course_id',
                            $l_c_tooltip->id)->count() }}</span>
                    </span>
                </div><!-- end rating-wrap -->
                <ul class="list-items mb-3 font-size-14">
                    @foreach (json_decode($l_c_tooltip->requirement) as $requirement)
                    <li>{{ $requirement }}</li>
                    @endforeach

                </ul>
                <div class="card-action">
                    <ul class="card-duration d-flex justify-content-between align-items-center">
                        <li><span class="meta__date"><i class="la la-play-circle"></i>
                                {{ $l_c_tooltip->logbook->count() }} Materi</span>
                        </li>
                        {{-- <li><span class="meta__date">
                                @php
                                $total_duration = 0;
                                foreach ($l_c_tooltip->classes as $item){
                                $total_duration +=$item->contents->sum('duration');
                                }
                                @endphp
                                <i class="la la-clock-o"></i>{{duration($total_duration)}}
                            </span> --}}
                        </li>
                    </ul>
                </div><!-- end card-action -->
                <div class="btn-box w-100 text-center mb-3">
                    <a href="{{ route('course.single', $l_c_tooltip->slug) }}" class="theme-btn d-block">
                        @translate(Lihat Pelatihan Ini)</a>
                </div>
            </div><!-- end card-content -->
        </div><!-- end card-item -->
    </div>
</div>
@endforeach
<!--======================================
                END LatestCourse AREA
        ======================================-->


<!--======================================
                START CATEGORY AREA
        ======================================-->
<section class="category-area padding-bottom-90px padding-top-90px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h5 class="section__meta">@translate(Kategori)</h5>
                    <h2 class="section__title">@translate(Kategori Terpopuler)</h2>
                    <span class="section-divider"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="btn-box h-100 d-flex align-items-center justify-content-end">
                    <a href="{{ route('course.filter') }}" class="theme-btn">@translate(Semua Kategori)</a>
                </div><!-- end btn-box-->
            </div>
        </div><!-- end row -->
        <div class="category-wrapper margin-top-28px">
            <div class="row">
                @foreach ($popular_cat as $item)
                <div class="col-lg-4 column-td-half">
                    <div class="category-item">
                        <img data-original="{{ filePath($item->icon) }}" alt="" width="auto" height="200">
                        <div class="category-content">
                            <div class="category-inner">
                                <h3 class="cat__title"><a href="{{ route('course.category', $item->slug) }}">{{
                                        $item->name }}</a>
                                </h3>
                                <p class="cat__meta">{{ $item->courses->count() }} @translate(Pelatihan)</p>
                                <a href="{{ route('course.category', $item->slug) }}"
                                    class="theme-btn">@translate(Jelajahi Sekarang)</a>
                            </div>
                        </div><!-- end category-content -->
                    </div><!-- end category-item -->
                </div><!-- end col-lg-4 -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end category-wrapper -->
    </div><!-- end container -->
    </div><!-- end course-wrapper -->
</section>
<!-- end courses-area -->
<!--======================================
                END CATEGORY AREA
        ======================================-->
<!--======================================
                START COURSE AREA
        ======================================-->
<section class="course-area">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta">@translate(Pilih Pelatihanmu)</h5>
                        <h2 class="section__title">@translate(Cari Pelatihan Dari Kami)</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tab margin-top-28px margin-bottom-55px">
                        <ul class="nav nav-tabs justify-content-center text-center" role="tablist" id="review">
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($cat as $item)
                            <li role="presentation">
                                <a href="#tab{{ $loop->index++ }}" role="tab" data-toggle="tab"
                                    class="theme-btn {{ $i == 0 ? 'active' : 'rumon' }}"
                                    aria-selected="{{ $loop->index++ == 0 ? 'true' : 'false' }}">
                                    {{ $item }}
                                </a>
                            </li>
                            <span class="invisible">{{ $i++ }}</span>
                            @endforeach
                        </ul>
                    </div><!-- end section-tab -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div> <!-- end course-wrapper -->
    <div class="card-content-wrapper section-bg padding-top-60px padding-bottom-110px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($course as $items)
                        <div role="tabpanel" class="tab-pane fade {{ $i == 0 ? 'show active' : 'rumon' }}"
                            id="tab{{ $loop->index++ }}">
                            @if ($items->count() > 0)
                            <div class="row">
                                @foreach ($items as $course)
                                <div class="col-lg-4">
                                    <div class="column-td-half">
                                        <div class="card-item card-preview"
                                            data-tooltip-content="#tooltip_content_{{ $course->id }}">
                                            <div class="card-image">
                                                <a href="{{ route('course.single', $course->slug) }}"
                                                    class="card__img"><img src="{{ filePath($course->image) }}"
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
                                                    @auth()
                                                    <a href="#!"
                                                        onclick="addToCart({{ $course->id }},'{{ route('add.to.wishlist') }}')"
                                                        class="card__collection-icon love-{{ $course->id }}"><span
                                                            class="la la-heart-o love-span-{{ $course->id }}"></span></a>
                                                    @endauth

                                                    @guest()
                                                    <a href="{{ route('login') }}" class="card__collection-icon"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                                                    @endguest
                                                </p>
                                                <h3 class="card__title">
                                                    <a href="{{ route('course.single', $course->slug) }}">{{
                                                        \Illuminate\Support\Str::limit($course->title, 58) }}</a>
                                                </h3>
                                                <p class="card__author">

                                                </p>
                                                <div class="rating-wrap d-flex mt-2 mb-3">
                                                    <span class="star-rating-wrap">
                                                        @translate(Kategori) <span class="star__count">{{
                                                            \Illuminate\Support\Str::limit($course->category_id, 58)
                                                            }}</span>
                                                    </span>
                                                </div><!-- end rating-wrap -->
                                                </p>
                                                <div class="rating-wrap d-flex mt-2 mb-3">
                                                    <span class="star-rating-wrap">
                                                        @translate(Peserta Terdaftar : ) <span class="star__count">{{
                                                            $course->classes->count() }}</span>
                                                    </span>
                                                </div><!-- end rating-wrap -->
                                                <div class="rating-wrap d-flex mt-2 mb-3">
                                                    <div
                                                        class="card-price-wrap d-flex justify-content-between align-items-center">
                                                        <span class="card__price">
                                                            @translate(Jadwal Pendaftaran)
                                                        </span>
                                                    </div>
                                                </div><!-- end rating-wrap -->
                                                <div class="rating-wrap d-flex mt-2 mb-3">
                                                    <span class="star-rating-wrap">
                                                        {{ \Carbon\Carbon::parse($course->mulai_pendaftaran)->format('d
                                                        F Y') }}
                                                        - <span class="star__count">{{
                                                            \Carbon\Carbon::parse($course->berakhir_pendaftaran)->format('d
                                                            F
                                                            Y') }}</span>
                                                    </span>
                                                </div><!-- end rating-wrap -->
                                                <div
                                                    class="card-price-wrap d-flex justify-content-between align-items-center">
                                                    <!--there are the login-->
                                                    @auth()
                                                    @if (\Illuminate\Support\Facades\Auth::user()->user_type ==
                                                    'Student')
                                                    <a href="#!" class="text-btn addToCart-{{ $course->id }}"
                                                        onclick="addToCart({{ $course->id }},'{{ route('add.to.cart') }}')">@translate(Daftar)</a>
                                                    @else
                                                    <a href="{{ route('login') }}"
                                                        class="text-btn">@translate(Daftar)</a>
                                                    @endif
                                                    @endauth

                                                    @guest()
                                                    <a href="{{ route('login') }}"
                                                        class="text-btn">@translate(Daftar)</a>
                                                    @endguest


                                                </div><!-- end card-price-wrap -->
                                            </div><!-- end card-content -->
                                        </div>
                                    </div>
                                </div><!-- end col-lg-4 -->
                                @endforeach
                                @foreach ($items as $c_tooltip)
                                <div class="tooltip_templates">
                                    <div id="tooltip_content_{{ $c_tooltip->id }}">
                                        <div class="card-item">
                                            <div class="card-content">
                                                {{-- <p class="card__author">
                                                    @translate(Oleh) <a
                                                        href="{{route('single.instructor',$c_tooltip->slug)}}">{{$c_tooltip->name}}</a>
                                                </p> --}}
                                                <h3 class="card__title">
                                                    <a href="{{ route('course.single', $c_tooltip->slug) }}">{{
                                                        \Illuminate\Support\Str::limit($c_tooltip->title, 58) }}</a>
                                                </h3>
                                                <p class="card__label">
                                                    <span class="mr-1">@translate(di)</span><a
                                                        href="{{ route('course.category', $c_tooltip->category->slug) }}"
                                                        class="mr-1">{{ $c_tooltip->category->name }}</a>
                                                </p>
                                                <div class="rating-wrap d-flex mt-2 mb-3">

                                                    <span class="star-rating-wrap">
                                                        @translate(Kategori) <span class="star__count">{{
                                                            \App\Model\Enrollment::where('course_id',
                                                            $c_tooltip->id)->count() }}</span>
                                                    </span>
                                                </div><!-- end rating-wrap -->
                                                <ul class="list-items mb-3 font-size-14">
                                                    @foreach (json_decode($c_tooltip->requirement) as $requirement)
                                                    <li>{{ $requirement }}</li>
                                                    @endforeach

                                                </ul>
                                                <div class="card-action">
                                                    <ul
                                                        class="card-duration d-flex justify-content-between align-items-center">
                                                        <li><span class="meta__date"><i class="la la-play-circle"></i>
                                                                {{ $c_tooltip->logbook->count() }} Materi</span>
                                                        </li>
                                                        {{-- <li><span class="meta__date">
                                                                @php
                                                                $total_duration = 0;
                                                                foreach ($c_tooltip->classes as $item) {
                                                                $total_duration += $item->contents->sum('duration');
                                                                }
                                                                @endphp
                                                                <i class="la la-clock-o"></i>{{
                                                                duration($total_duration) }}
                                                            </span>
                                                        </li> --}}
                                                    </ul>
                                                </div><!-- end card-action -->
                                                <div class="btn-box w-100 text-center mb-3">
                                                    <a href="{{ route('course.single', $c_tooltip->slug) }}"
                                                        class="theme-btn d-block">
                                                        @translate(Lihat Pelatihan Ini)</a>
                                                </div>

                                            </div><!-- end card-content -->
                                        </div><!-- end card-item -->
                                    </div>
                                </div><!-- end tooltip_templates -->
                                @endforeach
                            </div><!-- end course-block -->

                            @if ($i != 0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="btn-box mt-4 text-center">
                                        <a href="{{ route('course.category', $c_tooltip->first()->category->slug) }}"
                                            class="theme-btn"> @translate(Cari Semua Pelatihan)</a>
                                    </div><!-- end btn-box -->
                                </div><!-- end col-lg-12 -->
                            </div>
                            @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="btn-box mt-4 text-center">
                                        <a href="{{ route('course.filter') }}" class="theme-btn">
                                            @translate(Cari Semua Pelatihan)</a>
                                    </div><!-- end btn-box -->
                                </div><!-- end col-lg-12 -->
                            </div>
                            @endif
                            @endif
                        </div>
                        <span class="invisible">{{ $i++ }}</span>
                        @endforeach
                        <!-- end tab-pane -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end card-content-wrapper -->
        </div><!-- end card-content-wrapper -->
    </div><!-- end card-content-wrapper -->


</section><!-- end courses-area -->
<!--======================================
                END COURSE AREA
        ======================================-->

<!--======================================
                START COURSE AREA
        ======================================-->
<section class="course-area padding-top-120px">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta">@translate(Pelajari Sesuai Jadwal Anda)</h5>
                        <h2 class="section__title">@translate(Pelatihan Paling Diminati)</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row margin-top-28px">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="course-carousel">
                            @foreach ($trading_courses as $t_courses)
                            <div class="card-item card-preview"
                                data-tooltip-content="#tooltip_content_{{ $t_courses->id }}">
                                <div class="card-image">
                                    <a href="{{ route('course.single', $t_courses->slug) }}" class="card__img"><img
                                            src="{{ filePath($t_courses->image) }}" alt="{{ $t_courses->title }}"></a>
                                    @if (bestSellingTags($t_courses->id))
                                    <div class="card-badge">
                                        <span class="badge-label">@translate(paling laris)</span>
                                    </div>
                                    @endif
                                </div><!-- end card-image -->
                                <div class="card-content">
                                    <p class="card__label">
                                        <span class="card__label-text">{{ $t_courses->level }}</span>
                                        @auth()
                                        <a href="#!"
                                            onclick="addToCart({{ $t_courses->id }},'{{ route('add.to.wishlist') }}')"
                                            class="card__collection-icon love-{{ $t_courses->id }}"><span
                                                class="la la-heart-o love-span-{{ $t_courses->id }}"></span></a>
                                        @endauth

                                        @guest()
                                        <a href="{{ route('login') }}" class="card__collection-icon"
                                            data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                                                class="la la-heart-o"></span></a>
                                        @endguest
                                    </p>
                                    <h3 class="card__title">
                                        <a href="{{ route('course.single', $t_courses->slug) }}">{{
                                            \Illuminate\Support\Str::limit($t_courses->title, 58) }}</a>
                                    </h3>
                                    <p class="card__author">

                                    </p>
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            @translate(Kategori) <span class="star__count">{{
                                                \Illuminate\Support\Str::limit($t_courses->category_id, 58) }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    </p>
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            @translate(Peserta Terdaftar : ) <span class="star__count">{{
                                                $t_courses->classes->count() }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                            <span class="card__price">
                                                @translate(Jadwal Pendaftaran)
                                            </span>
                                        </div>
                                    </div><!-- end rating-wrap -->
                                    <div class="rating-wrap d-flex mt-2 mb-3">
                                        <span class="star-rating-wrap">
                                            {{ \Carbon\Carbon::parse($t_courses->mulai_pendaftaran)->format('d F Y') }}
                                            - <span class="star__count">{{
                                                \Carbon\Carbon::parse($t_courses->berakhir_pendaftaran)->format('d F Y')
                                                }}</span>
                                        </span>
                                    </div><!-- end rating-wrap -->
                                    {{-- <div class="rating-wrap d-flex mt-2 mb-3">
                                        <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                            <span class="card__price">
                                                @translate(Tahapan Seleksi)
                                            </span>
                                        </div>
                                    </div><!-- end rating-wrap --> --}}
                                    <!-- <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                                    <span class="card__price">@translate(Jadwal Seleksi)</span>
                                                </div>end rating-wrap -->
                                    {{-- <div class="card-action">
                                        <ul class="card-duration d-flex justify-content-between align-items-center">
                                            <li>
                                                <span class="meta__date">
                                                    Tes Tulis
                                                </span>
                                            </li>
                                            <li>
                                                <span class="meta__date">
                                                    Wawancara
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="card-action">
                                        <ul class="card-duration d-flex justify-content-between align-items-center">
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($t_courses->tanggaltulis)->format('d F Y')
                                                    }}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($t_courses->tanggalwawancara)->format('d F
                                                    Y') }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="card-action">
                                        <ul class="card-duration d-flex justify-content-between align-items-center">
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($t_courses->jamtulis)->format('H:i') }}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($t_courses->jamwawancara)->format('H:i') }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end card-action -->
                                    <div class="card-action">
                                        <ul class="card-duration d-flex justify-content-between align-items-center">
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-map-marker"></i> {{ $t_courses->lokasitulis }}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="meta__date">
                                                    <i class="la la-map-marker"></i>
                                                    {{ $t_courses->lokasiwawancara }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end card-action --> --}}
                                    <div class="card-price-wrap d-flex justify-content-between align-items-center">
                                        <!--if free-->
                                        {{-- @if ($t_courses->is_free)
                                        <span class="card__price">@translate(Gratis)</span>
                                        @else
                                        @if ($t_courses->is_discount)
                                        <span class="card__price">{{ formatPrice($t_courses->discount_price) }}</span>
                                        <span class="card__price"><del>{{ formatPrice($t_courses->price) }}</del></span>
                                        @else
                                        <span class="card__price">{{ formatPrice($t_courses->price) }}</span>
                                        @endif
                                        @endif --}}
                                        <!--there are the login-->
                                        @auth()
                                        @if (\Illuminate\Support\Facades\Auth::user()->user_type == 'Student')
                                        <a href="#!" class="text-btn addToCart-{{ $t_courses->id }}"
                                            onclick="addToCart({{ $t_courses->id }},'{{ route('add.to.cart') }}')">@translate(Daftar)</a>
                                        @else
                                        <a href="{{ route('login') }}" class="text-btn">@translate(Daftar)</a>
                                        @endif
                                        @endauth

                                        @guest()
                                        <a href="{{ route('login') }}" class="text-btn">@translate(Daftar)</a>
                                        @endguest


                                    </div><!-- end card-price-wrap -->
                                </div><!-- end card-content -->
                            </div>
                            @endforeach
                        </div><!-- end course-carousel -->
                    </div><!-- end tab-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
</section><!-- end courses-area -->
@foreach ($trading_courses as $t_tooltip)
<div class="tooltip_templates">
    <div id="tooltip_content_{{ $t_tooltip->id }}">
        <div class="card-item">
            <div class="card-content">
                {{-- <p class="card__author">
                    @translate(Oleh) <a href="{{route('single.instructor',$t_tooltip->slug)}}">{{$t_tooltip->name}}</a>
                </p> --}}
                <h3 class="card__title">
                    <a href="{{ route('course.single', $t_tooltip->slug) }}">{{
                        \Illuminate\Support\Str::limit($t_tooltip->title, 58) }}</a>
                </h3>
                <p class="card__label">
                    <span class="mr-1">@translate(Di)</span><a
                        href="{{ route('course.category', $t_tooltip->category->slug) }}" class="mr-1">{{
                        $t_tooltip->category->name }}</a>
                </p>
                <div class="rating-wrap d-flex mt-2 mb-3">

                    <span class="star-rating-wrap">
                        @translate(Kategori) <span class="star__count">{{ \App\Model\Enrollment::where('course_id',
                            $t_tooltip->id)->count() }}</span>
                    </span>
                </div><!-- end rating-wrap -->
                <ul class="list-items mb-3 font-size-14">
                    <!--todo::need to change-->
                    {!! $t_tooltip->short_discription !!}

                </ul>
                <div class="card-action">
                    <ul class="card-duration d-flex justify-content-between align-items-center">
                        <li><span class="meta__date"><i class="la la-play-circle"></i>
                                {{ $t_tooltip->logbook->count() }} Materi</span>
                        </li>
                        {{-- <li><span class="meta__date">
                                @php
                                $total_duration = 0;
                                foreach ($t_tooltip->classes as $item){
                                $total_duration +=$item->contents->sum('duration');
                                }
                                @endphp
                                <i class="la la-clock-o"></i>{{duration($total_duration)}}
                            </span>
                        </li> --}}
                    </ul>
                </div><!-- end card-action -->
                <div class="btn-box w-100 text-center mb-3">
                    <a href="{{ route('course.single', $t_tooltip->slug) }}" class="theme-btn d-block">
                        @translate(Lihat Kursus Ini)</a>
                </div>
            </div><!-- end card-content -->
        </div><!-- end card-item -->
    </div>
</div>
@endforeach
<!--======================================
                    END COURSE AREA
            ======================================-->
<div class="section-block my-lg-5"></div>
<!-- ================================
               START FUNFACT AREA
        ================================= -->
<section class="funfact-area text-center overflow-hidden padding-top-85px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 column-td-half">
                <div class="counter-item">
                    <span class="la la-bullhorn count__icon"></span>
                    <h4 class="count__title text-color-2 count-up" data-from="0"
                        data-to="{{ \App\User::where('user_type', 'Instructor')->get()->count() }}" data-time="1000">0
                    </h4>
                    <p class="count__meta">@translate(Dinas)</p>
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-half">
                <div class="counter-item">
                    <span class="la la-globe count__icon"></span>
                    <h4 class="count__title  count__title text-color-2 count-up1" data-from="0"
                        data-to="{{ \App\User::where('user_type', 'Student')->get()->count() }}" data-time="1000">0
                    </h4>
                    <p class="count__meta">@translate(Peserta)</p>
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-half">
                <div class="counter-item">
                    <span class="la la-users count__icon"></span>
                    <h4 class="count__title  count__title text-color-2 count-up2" data-from="0"
                        data-to="{{ \App\Model\Enrollment::count() }}" data-time="1000">0</h4>
                    <p class="count__meta">@translate(Jumlah Terdaftar)</p>
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-td-half">
                <div class="counter-item">
                    <span class="la la-certificate count__icon"></span>
                    <h4 class="count__title count__title text-color-2 count-up3" data-from="0"
                        data-to="{{ \App\Model\Course::Published()->count() }}" data-time="1000">0</h4>
                    <p class="count__meta">@translate(Jumlah Pelatihan)</p>
                </div><!-- end counter-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end funfact-area -->
<!-- ================================
               START FUNFACT AREA
        ================================= -->

<div class="section-block"></div>

<!--======================================
                START PACKAGE AREA
        ======================================-->
<!-- end package-area -->
<!--======================================
                END PACKAGE AREA
        ======================================-->

<div class="section-block"></div>





<!--======================================
                START SUBSCRIPTION AREA
        ======================================-->
@if (subscriptionActive())
<section class="package-area section--padding">
    <div class="container">
        <div class="row">

            @foreach ($subscriptions as $subscription)
            <div class="col-lg-4 column-td-half">
                <div class="package-item package-item-active">

                    @if ($subscription->popular == true)
                    <div class="package-tooltip">
                        <span class="package__tooltip">Recommended</span>
                    </div><!-- end package-tooltip -->
                    @endif

                    <div class="package-title text-center">
                        <h3 class="package__price"><span>{{ formatPrice($subscription->price) }}</span>
                        </h3>
                        <h3 class="package__title">{{ $subscription->name }}</h3>
                    </div><!-- end package-title -->

                    <ul class="list-items margin-bottom-35px">
                        @foreach (json_decode($subscription->description) as $item)
                        <li><i class="la la-check"></i> {{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="btn-box">
                        <a href="{{ route('subscription.frontend', $subscription->duration) }}" class="theme-btn">{{
                            App\SubscriptionCourse::where('subscription_duration', 'LIKE', '%' . $subscription->duration
                            . '%')->count() }}
                            Courses</a>
                        <form action="{{ route('subscription.cart') }}" method="get">
                            @csrf

                            <input type="hidden" value="{{ $subscription->duration }}" name="subscription_package">
                            <input type="hidden" value="{{ $subscription->price }}" name="subscription_price">
                            <input type="hidden" value="{{ $subscription->id }}" name="subscription_id">
                            @foreach (App\SubscriptionCourse::where('subscription_duration', 'LIKE', '%' .
                            $subscription->duration . '%')->get() as $item)
                            <input type="hidden" name="course_id[]" value="{{ $item->course_id }}">
                            @endforeach

                            @auth
                            @if (!App\SubscriptionEnrollment::where('user_id',
                            Auth::user()->id)->where('subscription_package', $subscription->duration)->exists())
                            <button type="submit" class="theme-btn mt-3">choose plan</button>
                            @else
                            <button type="button" disabled class="theme-btn mt-3">Purchased</button>
                            @endif
                            @endauth

                            @guest
                            <a href="{{ route('login') }}" class="theme-btn mt-3">choose plan</a>
                            @endguest




                        </form>
                        <p class="package__meta">no hidden charges!</p>
                    </div>

                </div><!-- end package-item -->
            </div><!-- end col-lg-4 -->
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endif
<!--======================================
                END SUBSCRIPTION AREA
        ======================================-->
@endsection