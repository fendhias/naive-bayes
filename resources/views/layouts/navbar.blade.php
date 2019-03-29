	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
	<a class="navbar-brand brand-logo" href="{{ URL('/') }}">
	  <img src="{{ URL('images/Untitled-4.svg') }}" alt="logo" />
	</a>
	<a class="navbar-brand brand-logo-mini" href="index.html">
	  <img src="{{ URL('images/logo-mini.svg') }}" alt="logo" />
	</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
	<ul class="navbar-nav navbar-nav-right">
	  <li class="nav-item dropdown d-none d-xl-inline-block">
	    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
	      <span class="profile-text">Halo, {{ Auth::user()->name }} !</span>
	      <img class="img-xs rounded-circle" src="{{ URL('images/faces/face.jpg') }}" alt="Profile image">
	    </a>
	    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
	      <a href="{{ url('/logout') }}">
	      	<i class="dropdown-item mt-3">
	        Logout
	      	</i>
	      </a>
	    </div>

	  </li>
	</ul>
	<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
	  <span class="mdi mdi-menu"></span>
	</button>
	</div>