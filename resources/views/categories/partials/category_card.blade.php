<li class="list-group-item d-flex justify-content-between align-items-center">{{ $category->name }}
	<div class="container d-flex justify-content-end ">
		<a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-primary mx-1">Show</a>

		{{-- <a href="{{ route('categories.edit', ['category'=> $category->id] )}}" class="btn btn-warning mx-1">Edit</a> --}}

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#modal{{$category->id}}">
		  Edit
		</button>

		<form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
			@csrf
			@method('DELETE') 
			<button class="btn btn-danger mx-1">Delete</button>

		</form>

		<!-- Start of Modal -->
		<div class="modal fade" id="modal{{$category->id}}" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <div class="modal-body">
		      	<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
					@csrf
					@method('PUT')

					<input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
					
					<div class="modal-footer">
					<button class="btn btn-success my-1">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>

				</form>
		        
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of Modal -->
		
		{{-- @if($category->trashed())
		<form action="{{ route('categories.restore', ['category' => $category->id]) }}" method="post">
			@csrf
			@method('PUT') 
			<button class="btn btn-success mx-1">Restore</button>

		</form>
		@endif --}}
	</div>	
	
</li>




		