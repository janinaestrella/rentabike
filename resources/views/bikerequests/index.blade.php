@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">

			@if(Session::has('data'))
				@include('bikerequests.partials.requestpage')
			
			@else
				<div class="alert alert-info">
				<p class="text-center mb-0">
					You have no requests
				</p>
			</div>
			@endif


		</div>
	</div>
</div>



@endsection