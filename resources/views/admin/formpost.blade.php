@extends('layout.mainauth')

@section('title', "Dashboard Admin")

@section('content')

<div class="container">
	<div class="row">
		<form>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Judul Post</label>
		    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Judul" name="title">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Isi Post</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
		</form>
	</div>
</div>

@endsection