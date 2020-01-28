@extends('layout.mainadmin')

@section('title', "Kategori")

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				@if(session('berhasil'))
				<div class="alert alert-success mt-3" role="alert">
				  {{ session('berhasil') }}
				</div>
				@endif
				@if(session('hapus'))
				<div class="alert alert-danger mt-3" role="alert">
				  {{ session('hapus') }}
				</div>
				@endif
				<div class="text-right">
					<a href="/dashboard" class="btn btn-primary mt-3 mb-3 btn-sm">Kembali ke Dashboard</a>
				
				</div>	
				<div class="mb-5">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Nama Kategori</th>
								<th scope="col" class="text-right">Aksi</th>
							</tr>
						</thead>
						<tbody >
						@foreach( $categories as $cat )
							<tr>
								<td>{{ $cat->name }}</td>
								<td class="text-right">
									<!-- <a href="/dashboard/category/edit/{{ $cat->id }}" class="btn btn-warning btn-sm">Edit</a> -->
									<a href="/dashboard/category/delete/{{ $cat->id }}" class="btn btn-danger btn-sm" onclick="return confirm('cat akan dihapus?')">Delete</a>
								</td>
							</tr>
						@endforeach
						</tbody>
						
					</table>
			        @if( $categories->count() >= 1 )
			        <div class="col-md-12 mt-3">
			            {{ $categories->links() }}
			        </div> 
			        @endif
					
				</div>

			</div>
			<div class="col-md-4">
				<form action="/dashboard/category/create" method="post">
					@csrf
					<div class="form-group mt-5">
						<label>Nama Kategori Baru</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div>
						<button type="submit" class="btn btn-primary mb-2">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection