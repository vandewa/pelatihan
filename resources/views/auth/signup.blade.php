@extends(themeManager().'.app')
@section('content')
<!-- ================================
         START SIGN UP AREA
  ================================= -->
@if(themeManager() == 'rumbok')
<!-- Breadcrumb Section Starts -->
<section class="breadcrumb-section">
    <div class="breadcrumb-shape">
        <img src="{{asset('asset_rumbok/images/round-shape-2.png')}}" alt="shape"
            class="hero-round-shape-2 item-moveTwo">
        <img src="{{asset('asset_rumbok/images/plus-sign.png')}}" alt="shape" class="hero-plus-sign item-rotate">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>@translate(Daftar )</h2>
                <div class="breadcrumb-link margin-top-10">
                    <span><a href="{{url('/')}}">@translate(home)</a> / @translate(Daftar)</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Section Starts -->
<section class="login-section padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login-image">
                    <img src="{{asset('asset_rumbok/images/login-image.jpg')}}" alt="image">
                </div>
            </div>
            <div class="col-lg-6">

                <div class="login-form">
                    <h3>@translate(daftar) <span>@translate(sekarang)</span></h3>

                    @if(env('GOOGLE_APP_ID') != "")
                    <div class="google-button">
                        <a href="{{ url('/auth/redirect/google') }}" class="template-button"><i
                                class="fa fa-google"></i> @translate(google)</a>
                    </div>
                    <span class="separator">@translate(or)</span>

                    @endif
                    <div class="login-tab d-none">
                        <div class="tab">
                            <ul>
                                <li class="tab-one active">
                                    <a href="#" class="template-button-2">admin</a>
                                </li>
                                <li class="tab-second">
                                    <a href="#" class="template-button-2">dinas</a>
                                </li>
                                <li class="tab-three">
                                    <a href="#" class="template-button-2">siswa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content margin-top-30">
                        <div class="tab-one-content lost active">
                            <form method="post" action="{{ route('student.create') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="signupName"><i class="fa fa-user"></i> @translate(Nama Anda)</label>
                                    <input class="form-control pl-2 @error('name') is-invalid @enderror" type="text"
                                        name="name" placeholder="@translate(Nama Panjang)" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signupEmail"><i class="fa fa-envelope"></i> @translate(Alamat
                                        Email)</label>
                                    <input class="form-control pl-2 @error('email') is-invalid @enderror" type="email"
                                        name="email" placeholder="your@mail.com" required value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="signupPassword"><i class="fa fa-lock"></i> @translate(Password)</label>
                                    <input class="form-control pl-2 @error('password') is-invalid @enderror"
                                        type="password" name="password" placeholder="********" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signupConPassword"><i class="fa fa-lock"></i> @translate(Konfirmasi
                                        Password)</label>
                                    <input class="form-control pl-2 @error('confirmed') is-invalid @enderror"
                                        type="password" name="confirmed" placeholder="********" required>

                                    @error('confirmed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="login-button margin-top-20">
                                    <button type="submit" class="template-button">@translate(Daftar akun)</button>
                                    <span>@translate(sudah mempunyai akun)? <a
                                            href="{{route('login')}}">@translate(masuk)</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@elseif(false)



@else
<section class="sign-up section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center">
                        <h3 class="widget-title font-size-35">@translate(Buat akun kamu and) <br>
                            @translate(Mulai Ikuti Pelatihan)!</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" action="{{ route('student.create') }}">
                                @csrf
                                <div class="row">
                                    @if(env('GOOGLE_APP_ID') != "")
                                    <div class="col-lg-4 offset-md-4 column-td-half">
                                        <div class="form-group">
                                            <a class="theme-btn w-100 text-center"
                                                href="{{ url('/auth/redirect/google') }}">
                                                <i class="fa fa-google mr-2"></i>@translate(Google)
                                            </a>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-12">
                                        <div class="account-assist mt-3 margin-bottom-35px text-center">
                                            <p class="account__desc">@translate(or)</p>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    @endif
                                    <div class="col-lg-12 ">
                                        <div class="input-box">
                                            <label class="label-text">@translate(Nama Lengkap)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" name="name" placeholder="@translate(Nama Lengkap)"
                                                    required value="{{ old('name') }}">
                                                <span class="la la-user input-icon"></span>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12 ">
                                        <div class="input-box">
                                            <label class="label-text">@translate(NIK)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('nik') is-invalid @enderror"
                                                    type="number" name="nik" placeholder="@translate(NIK)" required
                                                    value="{{ old('nik') }}">
                                                <span class="la la-book input-icon"></span>

                                                @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">@translate(Username)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="text" name="email" placeholder="@translate(Username)" required
                                                    value="{{ old('email') }}">
                                                <span class="la la-envelope input-icon"></span>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">@translate(Telepon)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('phone') is-invalid @enderror"
                                                    type="text" name="phone" placeholder="@translate(Telepon)" required
                                                    value="{{ old('telp') }}">
                                                <span class="la la-phone input-icon"></span>

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">@translate(Password)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" name="password" placeholder="@translate(Password)"
                                                    required>
                                                <span class="la la-lock input-icon"></span>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->

                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">@translate(Konfirmasi Password)<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control @error('confirmed') is-invalid @enderror"
                                                    type="password" name="confirmed"
                                                    placeholder="@translate(Konfirmasi password)" required>
                                                <span class="la la-lock input-icon"></span>

                                                @error('confirmed')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->

                                    <div class="col-lg-12 ">
                                        <div class="btn-box">
                                            <button class="theme-btn" type="submit">@translate(Daftar Akun)
                                            </button>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <p class="mt-4">@translate(Sudah memiliki akun)? <a href="{{ route('login') }}"
                                                class="primary-color-2">@translate(Masuk)</a></p>
                                    </div><!-- end col-md-12 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form -->
                    </div>
                </div>
            </div><!-- end col-md-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end sign-up -->
@endif

<!-- ================================
           START SIGN UP AREA
    ================================= -->
@endsection