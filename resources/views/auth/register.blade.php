@extends('layout.mainauth')

@section('title', 'Register Page')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4 mt-5 mx-auto">
			
				@if(session('gagal'))
				<div class="alert alert-danger" role="alert">
				  {{ session('gagal') }}
				</div>
				@endif
				<form action="/postregister" method="post">
					@csrf 	
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nama</label>
				    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
				  </div>
				  <button type="submit" class="btn btn-primary">Register</button>
				  <a href="/login" class="btn btn-warning">Sudah Punya Akun</a>
				</form>

			</div>
		</div>
	</div>

@endsection