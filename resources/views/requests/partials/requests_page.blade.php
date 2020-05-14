{{-- start of table --}}
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Bike Name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Status</th> {{-- approved,rejected,pending approval --}}
				<th scope="col">Action</th>
			</tr>
		</thead>

		<tbody>
			{{-- start of an item --}}
			@foreach($bikes as $bike)
			<tr>
				<th scope="row">{{ $product->name }}</th>
				<td>&#8369; {{ number_format($product->price, 2) }}</td>
				{{-- Start of quantity --}}

				<td> 
					<form action="{{ route('carts.update', ['cart' => $product->id])}}" method ="post">
						@csrf
						@method('PUT')
						<div class="input-group">
							<input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" min="1">
							<div class="input-group-append">
								<button class="btn btn-warning" type="submit" id="button-addon2">Edit Qty</button>
							</div>
						</div>

					</form>
					
				</td>
				{{-- End of quantity --}}
				<td>&#8369; {{ number_format($product->subtotal, 2) }}</td>
				<td>
					<form action=" {{ route('carts.destroy', ['cart' => $product->id]) }}" method="post">
						@csrf
						@method('DELETE')
					<button class="btn btn-outline-danger w-100">Remove</button>
					</form>
				</td>
			</tr>
			@endforeach
			{{-- end of an item --}}
		</tbody>

		<tfoot>
			<tr>
				<td colspan="3" class="text-right">Total</td>
				<td>&#8369; <span id="total">{{ number_format($total, 2) }}</span></td>
				<td>
					@guest {{-- if nag add to cart pero hindi naka login --}}
						<a href="/login" class="btn btn-primary w-100">Login to Checkout</a>
					@else
					<form action="{{ route('transactions.store') }}" method="post">
						@csrf
						<button class="btn btn-primary w-100">Checkout via Cash on Delivery</button>
					</form>

					<p class="my-4">Pay Via PayPal</p>
					<div id="paypal-button">
						
					</div>
					@endguest
				</td>
			</tr>
		</tfoot>
	</table>

</div>
{{-- end of table --}}

	<form action="{{ route('requests.clear')}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger">Clear Cart</button>
	</form>

