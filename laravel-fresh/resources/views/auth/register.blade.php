@extends('layouts.form')

@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Register Page</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="wrap">
					<div class="img" style="background-image: url(assets/images/bg-2.jpg);"></div>
					<div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
						<form action="{{ route('register') }}" method="post" class="signin-form">
                            @csrf
                            <div class="form-group mt-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label class="form-control-placeholder" for="name">Nama Lengkap</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
			                <div class="form-group mt-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label class="form-control-placeholder" for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
			                <div class="form-group mt-3">
                                <input id="alamat" value="{{ old('alamat') }}" type="text" class="form-control" name="alamat" required>
                                <label class="form-control-placeholder" for="alamat">Alamat</label>
                            </div>
			                <div class="form-group mt-3">
                                <input id="username" type="text" class="form-control" name="username" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label class="form-control-placeholder" for="password-confirm">Confirm Password</label>
                                <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                            </div>
                        </form>
			            <p class="text-center">Already have account? <a href="/login">Sign In</a></p>
			        </div>
		        </div>
			</div>
		</div>
	</div>
</section>
@endsection
