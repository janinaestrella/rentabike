<li class="nav-item {{ Request::url() === $url ? "active" : ""}}"> 
	<a href="{{$url}}" class="nav-link">{{$displayName}}</a>
</li>