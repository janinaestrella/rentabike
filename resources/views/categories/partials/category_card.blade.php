
<li class="list-group-item d-flex justify-content-between align-items-center">
	
	{{ $category->name }}
	
	<div class="container d-flex justify-content-end ">
		<a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-primary mx-1">Show</a>
		
		@can('isAdmin')
		<button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#modal{{$category->id}}">Edit
		</button>

		<!-- Start of Modal -->
		@include('categories.partials.modal')
		<!-- End of Modal -->
		
		<form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
			@csrf
			@method('DELETE') 
			<button class="btn btn-danger mx-1">Delete</button>

		</form>
		

		
		@if($category->trashed())
		<form action="{{ route('categories.restore', ['category' => $category->id]) }}" method="post">
			@csrf
			@method('PUT') 
			<button class="btn btn-success mx-1">Restore</button>

		</form>
		@endif
		@endcan
	</div>	
	
</li>




		