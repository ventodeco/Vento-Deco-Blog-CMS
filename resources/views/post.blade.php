@extends('layout.main')

@section('title', "$post->title")

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3 col-md-10 mx-auto mt-4">
			  <img class="card-img-top mt-4 img-fluid" src="{{ !empty($post->image) ? asset('image/'.$post->image) :  asset('image/default.jpg') }}" alt="Card image cap">
			  <div class="card-body">
			    <h1 class="card-title text-center">{{ $post->title }}</h1>
			    <p class="blockquote-footer">Post dibuat oleh {{ $post->user->name }}</p>
			    <p class="blockquote-footer">{{ 'Category : '. $post->category['name'] }}</p>
			    <hr>
			    <p class="card-text text-justify">{{ $post->body }}</p>
			    <p class="card-text"><small class="text-muted">{{ 'Post dibuat pada : ' . $post->created_at }}</small></p>
			  </div>
			  <hr>
			  <div class="col-md-12">
				<h1>Comments</h1>
				@if(session('berhasil'))
				<div class="alert alert-success" role="alert">
				  {{ session('berhasil') }}
				</div>
				@endif
					@foreach($comments as $comment)
						@if($post->id == $comment->post_id)
							<div class="card col-md-12">
							  <div class="card-body">
							    <h5 class="card-title">{{ $comment->user->name }}</h5>
							    <p class="card-text">{{ $comment->body }}</p>
							    <p class="blockquote-footer">{{ 'Komentar pada : ' . $comment->created_at }}</p>
							    @if( auth()->user()->id == $comment->user_id)
							    	<a href="/deletecom/{{ $comment->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Post akan dihapus?')">Delete</a>
							    @endif
							    @if( auth()->user()->role == "admin")
							    	<a href="/deletecom/{{ $comment->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Post akan dihapus?')">Delete</a>
							    @endif
							  </div>
							</div>
						@endif
					@endforeach
				@if(auth()->user())
				<form method="post" action="/post/{{ $post->id }}/postcomment">
						@csrf
						<div class="form-group mt-2">
							<label for="exampleFormControlTextarea1">Isi Komentar</label>
			    			<textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="10"></textarea>
						</div>
						<div>
							<button type="submit" class="btn btn-primary mb-2">Submit Komentar</button>
						</div>

					</form>
				@endif
				@if(!auth()->user())
					<p>Anda harus masuk dengan akun anda, agar dapat berkomentar.</p>
				@endif
			</div>
			</div>
		</div>
	</div>
</div>

@endsection