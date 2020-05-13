<div class="card ">
	<div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
		<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$category->id}}">
			{{ $category->name }}
		</button>

		<div class="container d-flex justify-content-end ">

			<button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#modal{{$category->id}}">Edit
			</button>

			<form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
				@csrf
				@method('DELETE') 
				<button class="btn btn-danger mx-1">Delete</button>

			</form>

			<!-- Start of Modal -->
			@include('categories.partials.modal')
			<!-- End of Modal -->

		</div>	
	</div>


	<div id="collapse{{$category->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
		<div class="card-body">
			Bike Status Summary
			{{-- Avaialble --}}
			<div class="row">
				<div class="col">Available:</div>
				<div class="col">{{count}}</div>
			</div>

			{{-- Not Avaialble --}}
			<div class="row">
				<div class="col">Not Available:</div>
				<div class="col">count</div>
			</div>

			{{-- Under Maintenance --}}
			<div class="row">
				<div class="col">Under Maintenance:</div>
				<div class="col">count</div>
			</div>
		</div>
	</div>
</div>






