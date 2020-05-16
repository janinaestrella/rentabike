@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-4">
			<div class="list-group" id="list-tab" role="tablist">

				<a class="list-group-item list-group-item-action active" id="list-index-list" data-toggle="list" href="#list-index" role="tab">All Requests</a>
				
				<a class="list-group-item list-group-item-action" id="list-approved-list" data-toggle="list" href="#list-approved" role="tab">Approved</a>

				<a class="list-group-item list-group-item-action" id="list-pending-list" data-toggle="list" href="#list-pending" role="tab">Pending</a>

				<a class="list-group-item list-group-item-action" id="list-onloan-list" data-toggle="list" href="#list-onloan" role="tab">On Loan</a>

				<a class="list-group-item list-group-item-action" id="list-rejected-list" data-toggle="list" href="#list-rejected" role="tab">Rejected</a>

				<a class="list-group-item list-group-item-action" id="list-returned-list" data-toggle="list" href="#list-returned" role="tab">Returned</a>

			</div>
		</div>

		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
				{{-- start all tab --}}
				<div class="tab-pane fade show active" id="list-index" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@include ('rentaltransactions.partials.transaction_card')	
						@endforeach
					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end all tab --}}

				{{-- start approved tab --}}
				<div class="tab-pane fade" id="list-approved" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@if($rentaltransaction->rentstatus_id == 2)
						@include ('rentaltransactions.partials.transaction_card')
						@endif
						@endforeach

					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end approved tab --}}

				{{-- start pending tab --}}
				<div class="tab-pane fade" id="list-pending" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@if($rentaltransaction->rentstatus_id == 1)
						@include ('rentaltransactions.partials.transaction_card')
						@endif
						@endforeach

					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end pending tab --}}

				{{-- start onloan tab --}}
				<div class="tab-pane fade" id="list-onloan" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@if($rentaltransaction->rentstatus_id == 4)
						@include ('rentaltransactions.partials.transaction_card')
						@endif
						@endforeach

					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end onloan tab --}}

				{{-- start rejected tab --}}
				<div class="tab-pane fade" id="list-rejected" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@if($rentaltransaction->rentstatus_id == 3)
						@include ('rentaltransactions.partials.transaction_card')
						@endif
						@endforeach

					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end rejected tab --}}

				{{-- start returned tab --}}
				<div class="tab-pane fade" id="list-returned" role="tabpanel">
					{{-- start of accordion --}}
					<div class="accordion" id="accordionExample">
						@foreach($rentaltransactions as $rentaltransaction)
						@if($rentaltransaction->rentstatus_id == 5)
						@include ('rentaltransactions.partials.transaction_card')
						@endif
						@endforeach

					</div>
					{{-- end of accordion --}}
				</div>
				{{-- end returned tab --}}


			</div>
		</div>
	</div>
</div>


@endsection