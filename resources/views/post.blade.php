@extends('layout.main')

@section('title', "$post->title")

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3 col-md-10 mx-auto mt-4">
			  <img class="card-img-top mt-4" src="{{ !empty($post->image) ? asset('image/'.$post->image) :  asset('image/default.jpg') }}" alt="Card image cap">
			  <div class="card-body">
			    <h1 class="card-title text-center">{{ $post->title }}</h1>
			    <p class="blockquote-footer">Post dibuat oleh {{ $post->user->name }}</p>
			    <p class="blockquote-footer">{{ 'Category : '. $post->category }}</p>
			    <hr>
			    <p class="card-text text-justify">{{ $post->body }}</p>
			    <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection