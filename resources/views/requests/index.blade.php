@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-12">

			@if(Session::has('cart'))
			{{-- display  table --}}
			{{-- @include('carts.cart_with_products') --}}
			@else	
			{{-- display empty cart --}}
			<div class="alert alert-info">
				<p class="text-center mb-0">
					You have no Requests
				</p>
			</div>
			@endif

		</div>
	</div>
</div>