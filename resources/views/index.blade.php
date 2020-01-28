@extends('layout.main')

@section('title', "Vento Deco's Blog")

@section('content')
  <div class="container">
    <div class="row">
      
        <div class="card col-md-8 mr-1 mt-4 text-center mx-auto">
          <ul>
          @foreach( $categories as $cat )
            <li class="list-inline-item"><a href="/category/{{$cat->id}}" class="btn btn-primary btn-sm mt-3">{{ $cat->name }}</a></li>
          @endforeach
          </ul>
        </div>
        @foreach( $data_post as $post )
          <div class="card col-md-8 mx-auto mt-4">
            <img class="card-img-top mt-3 img-fluid" src="{{ !empty($post->image) ? asset('image/'.$post->image) :  asset('image/default.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h1 class="card-title text-center">{{ $post->title }}</h1>
              <hr>
              <p class="card-text">{{ Str::limit($post->body, $limit = 100, $end = '...') }}</p>
              <p class="blockquote-footer">{{ 'Category : '. $post->category['name'] }}</p>
              <p class="blockquote-footer">Post dibuat oleh {{ $post->user->name }}</p>
              <div class="text-right">
                <a href="/post/{{$post->id}}" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        @endforeach 

        @if( $data_post->count() >= 1 )
        <div class="col-md-8 mt-3">
            {{ $data_post->links() }}
        </div>
        @endif
    </div>
  </div>

@endsection

            
