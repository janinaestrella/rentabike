<div class="col-12 col-sm-6 col-lg-4 my-3">
	{{-- start of cards --}}
	<div class="card h-100">
		{{-- <img src="{{ $bike->image }}" alt="" class="card-img-top"> --}}
		<img src="{{ $bike->bikeImage() }}" alt="" class="card-img-top">
		
		<div class="card-body h-100">
			<div class="d-flex justify-content-between">
			<h6 class="card-title"><strong>{{ $bike->name }}</strong></h6>
			</div>
			<p class="card-text"> Bike Model: {{$bike->model_code}}
				<span 
					class="badge badge-sm
					@if($bike->bikestatus_id == 1)
					badge-success
					@elseif($bike->bikestatus_id == 2)
					badge-danger
					@else
					badge-secondary
					@endif
					"> 
					{{ $bike->bikeStatus->name }}
				</span>
			</p>
			
			<p class="badge badge-info">{{ $bike->category->name }}</p>
			<p class="card-text">{{ $bike->description }}</p>

			
			
		</div>

		<div class="card-footer">
			{{-- <form action="{{ route('bikerequests.update', ['bikerequest' => $bike->id]) }}" method="POST">	 --}}
			<form action="#" method="POST">		
				@csrf
				@method('PUT')

				<button class="btn btn-primary w-100 my-1 request-count" data-id="{{ $bike->id }}" type="button">Request to Rent</button>

			</form>
			
			@cannot('isUser')
			<a href="{{ route('bikes.edit', ['bike' => $bike->id]) }}" class="btn btn-warning w-100 my-1">Edit</a>

			<form action="{{ route('bikes.destroy', ['bike' => $bike->id])}}" method="POST">
				@csrf
				@method('DELETE')

				<button class="btn btn-danger w-100 my-1">Delete</button>

			</form>
			@endcannot
		</div>
	</div>
	{{-- end of cards --}}

</div>