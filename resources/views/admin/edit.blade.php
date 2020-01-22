@extends('layout.mainauth')

@section('title', "Edit Post")

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mt-3">Edit Post</h2>
			<form method="post" action="/update/{{ $post->id }}" enctype="multipart/form-data">
			  @csrf
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Judul Post</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Judul" name="title" value="{{ $post->title }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Isi Post</label>
			    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="10">{{ $post->body }}</textarea>
			  </div>
			  <div class="form-group">
			  	<label for="exampleFormControlInput1">Category</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Judul" name="category" value="{{ $post->category }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Upload Gambar</label>
			    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" value="{{ $post->image }}">
			  </div>
			  <div class="text-right mb-5">
			  	<button type="submit" class="btn btn-primary mb-2">Update</button>
			  	
			  </div>
			</form>
		</div>
	</div>
</div>

@endsection