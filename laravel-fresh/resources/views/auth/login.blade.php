@extends('layouts.form')

@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">Login Page</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="wrap">
					<div class="img" style="background-image: url(assets/images/bg-2.jpg);"></div>
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4">Sign In</h3>
							</div>
						</div>
						<form action="{{ route('login') }}" method="post" class="signin-form">
							@csrf
							<div class="form-group mt-3">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								<label class="form-control-placeholder" for="username">Email</label>
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
								<label class="form-control-placeholder" for="password">Password</label>
								<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
							</div>
			  			</form>
			  			<p class="text-center">Not a member? <a href="/register">Sign Up</a></p>
					</div>
		  		</div>
			</div>
		</div>
	</div>
</section>
@endsection
