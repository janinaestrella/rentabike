{{-- @if(Session::has('message')) --}}
	<div class="alert alert-info">
		{{-- to call session flush from categories.destory in controller --}}
		{{ Session::get('message') }} 
	</div>
{{-- @endif --}}