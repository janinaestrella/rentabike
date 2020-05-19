@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">

			<h1>Trashed Categories</h1>
			<hr>

			<ul class="list-group">
				@foreach ($categories as $category)
				<li class="list-group-item d-flex justify-content-between align-items-center"> {{ $category->name }}

					<div>
						@if($category->trashed())
						<form action="{{ route('categories.restore', ['category' => $category->id]) }}" method="post">
							@csrf
							@method('PUT') 
							<button class="btn btn-success mx-1">Restore</button>

						</form>
						@endif
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>


@endsection