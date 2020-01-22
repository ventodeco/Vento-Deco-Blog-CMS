@extends('layout.mainauth')

@section('title', 'Login Page')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4 mt-5 mx-auto">
			
				@if(session('sukses'))
				<div class="alert alert-success" role="alert">
				  {{ session('sukses') }}
				</div>
				@endif
				<form action="/postlogin" method="post">
					@csrf 	
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
				  </div>
				  <button type="submit" class="btn btn-primary">Login</button>
				  <span><a class="btn btn-warning" href="/register">Belum punya akun</a></span>
				</form>

			</div>
		</div>
	</div>

@endsection