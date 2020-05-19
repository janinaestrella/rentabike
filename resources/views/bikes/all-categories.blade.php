@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			<h1>Trashed Bikes</h1>
			<hr>
			
			<ul class="list-group">
				@foreach($bikes as $bike)
					<li class="list-group-item d-flex justify-content-between align-items-center"> {{$bike->model_code}}

					<div>
						@if($bike->trashed())
						<form action="{{ route('bikes.restore', ['bike' => $bike->id]) }}" method="post">
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