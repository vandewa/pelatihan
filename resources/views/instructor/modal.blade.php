<div class="card-body">
    <div class="card-box-shared">

        <div class="card-box-shared-body">
            <div class="contact-form-action">
                <form method="post" action="{{ route('instructor.store.modal') }}">
                    @csrf
                    <div class="row">
                        {{--Radio button-- Pemilihan Paket
                        <label class="label-text">@translate(Select A Package)<span
                                class="primary-color-2 ml-1">*</span></label>
                        <div class="row">
                            @foreach($packages = App\Model\Package::where('is_published', true)->get() as $item)
                            <div class="col-lg-4 column-td-half instructor-register">
                                <label>
                                    <input type="radio" required name="package_id" value="{{$item->id}}"
                                        class="card-input-element">
                                    @error('package_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="post-card text-center">
                                        <div class="post-card-content">
                                            <img src="{{filePath($item->image)}}" alt="" class="img-fluid" />
                                            <h2 class="widget-title mt-4 mb-2">
                                                {{formatPrice($item->price)}}
                                            </h2>
                                            <div>
                                                @translate(If you buy this package, admin will get)
                                                <h3 class="text-info text-dark"> {{$item->commission}} % </h3>
                                                @translate(of the course price for each enrollment of that course)
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            @endforeach
                        </div>
                        --}}
                        <div class="col-lg-12 ">
                            <div class="input-box">
                                <label class="label-text">@translate(Nama Dinas)<span
                                        class="primary-color-2 ml-1">*</span></label>
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" placeholder="Full name" required value="{{ old('name') }}">
                                    <span class="la la-user input-icon"></span>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div><!-- end col-md-12 -->

                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">@translate(Alamat Email)<span
                                        class="primary-color-2 ml-1">*</span></label>
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" placeholder="Email address" required value="{{ old('email') }}">
                                    <span class="la la-envelope input-icon"></span>

                                    @error('email')
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
                                    <input class="form-control @error('nik') is-invalid @enderror" type="text"
                                        name="nik" placeholder="NIK" required value="{{ old('nik') }}">
                                    <span class="la la-user input-icon"></span>

                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">@translate(Password)<span
                                        class="primary-color-2 ml-1">*</span></label>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        name="password" placeholder="Password" required>
                                    <small id="emailHelp" class="form-text text-muted">Password minimum 8
                                        characters.</small>
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
                                <label class="label-text">@translate(Masukkan Ulang Password)<span
                                        class="primary-color-2 ml-1">*</span></label>
                                <div class="form-group">
                                    <input class="form-control @error('confirm_password') is-invalid @enderror"
                                        type="password" name="confirm_password" placeholder="Confirm password" required>
                                    <span class="la la-lock input-icon"></span>

                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div><!-- end col-md-12 -->

                        <div class="col-lg-12 ">
                            <div class="btn-box">
                                <button class="btn btn-primary" type="submit">@translate(Daftarkan Dinas)</button>
                            </div>
                        </div><!-- end col-md-12 -->
                    </div><!-- end row -->
                </form>
            </div><!-- end contact-form -->
        </div>
    </div>
</div>