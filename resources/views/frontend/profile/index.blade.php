@extends('frontend.app')
@section('content')
<!-- ================================
      START DASHBOARD AREA
  ================================= -->
<section class="dashboard-area">

    @include('frontend.dashboard.sidebar')

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="breadcrumb-content dashboard-bread-content d-flex align-items-center justify-content-between">
                        <div class="user-bread-content d-flex align-items-center">
                            <div class="bread-img-wrap">

                                <img src="{{ \Illuminate\Support\Facades\Auth::user()->image == null
                                          ? asset('frontend/images/student.png')
                                          : filePath(\Illuminate\Support\Facades\Auth::user()->image) }}"
                                    alt="{{\Illuminate\Support\Facades\Auth::user()->name}}">

                            </div>
                            <div class="section-heading">
                                <h2 class="section__title font-size-30">{{ $student->name }}</h2>
                                {{-- WALLET --}}
                                @includeIf('wallet.frontend.profile_balance')
                            </div>
                        </div>

                        <div class="upload-btn-box">
                            <a href="{{ route('student.edit') }}" class="theme-btn">@translate(Edit Profil)</a>
                        </div>

                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-block"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="widget-title">@translate(Profil Saya)</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="profile-detail pb-5">
                        <ul class="list-items">
                            <li>
                                <span class="profile-name">@translate(Tanggal Daftar):</span>
                                @if ($student->created_at)
                                    <span class="profile-desc">{{ $student->created_at->format('D d M Y, h:i:s A') }}</span>
                                @else
                                    <span class="profile-desc">Created at error</span>
                                @endif
                            </li>
                            
                            {{-- <li><span class="profile-name">@translate(Tanggal Daftar):</span><span
                                    class="profile-desc">{{ $student->created_at->format('D d M Y, h:i:s A') }}</span>
                            </li> --}}
                            <li><span class="profile-name">@translate(Nama Lengkap):</span><span class="profile-desc">{{
                                    $student->name }}</span></li>
                            <li><span class="profile-name">Usename</span><span class="profile-desc">{{
                                    $student->email }}</span></li>
                            <li><span class="profile-name">@translate(Phone Number):</span><span class="profile-desc">{{
                                    $student->student->phone ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(Provinsi):</span><span class="profile-desc">{{
                                    $student->student->nama_provinsi ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(Kab/Kota):</span><span class="profile-desc">{{
                                    $student->student->nama_kota ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(Kecamatan):</span><span class="profile-desc">{{
                                    $student->student->nama_kecamatan ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(Kelurahan):</span><span class="profile-desc">{{
                                    $student->student->nama_kelurahan ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(Alamat):</span><span class="profile-desc">{{
                                    $student->student->address ?? '' }}</span></li>
                            <li><span class="profile-name">@translate(KTP):</span><span class="profile-desc">{!!
                                    $student->nik !!}</span></li>
                            {{-- <li><span class="profile-name">@translate(NPWP):</span><span class="profile-desc">{!!
                                    $student->student->about !!}</span></li>
                            <li><span class="profile-name">@translate(Ijazah):</span><span class="profile-desc">{!!
                                    $student->student->about !!}</span></li>
                            <li><span class="profile-name">@translate(Skck):</span><span class="profile-desc">{!!
                                    $student->student->about !!}</span></li> --}}

                        </ul>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->


            @include('frontend.dashboard.footer')


        </div><!-- end container-fluid -->
    </div><!-- end dashboard-content-wrap -->

</section><!-- end dashboard-area -->
<!-- ================================
        END DASHBOARD AREA
    ================================= -->
@endsection