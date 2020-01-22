@extends('layout.mainadmin')

@section('title', "Dashboard Admin")

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 mt-4 mx-auto">
			@if(session('berhasil'))
			<div class="alert alert-success" role="alert">
			  {{ session('berhasil') }}
			</div>
			@endif
			<div class="text-right">
				<a href="/dashboard/newpost" class="btn btn-primary mb-3 btn-sm">Buat Post Baru</a>
				
			</div>
			<div class="mb-5">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Judul Post</th>
							<th scope="col" class="text-right">Aksi</th>
						</tr>
					</thead>
					<tbody >
					@foreach( $data_post as $post )
						<tr>
							<td>{{ $post->title }}</td>
							<td class="text-right">
								<a href="/edit/{{ $post->id }}" class="btn btn-warning btn-sm">Edit</a>
								<a href="/delete/{{ $post->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Post akan dihapus?')">Delete</a>
							</td>
						</tr>
					@endforeach
					</tbody>
					
				</table>
	        @if( $post->count() > 3 )
	        <div class="col-md-12 mt-3">
	            {{ $data_post->links() }}
	        </div>
	        @endif
				
			</div>


		</div>
	</div>
</div>

@endsection