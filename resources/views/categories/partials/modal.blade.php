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