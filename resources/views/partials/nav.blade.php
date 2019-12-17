<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
  <a class="navbar-brand" href="{{ route('admin.index') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @can('users.index')
         <li class="nav-item active">
           <a class="nav-link" href="{{ route('users.index') }}">Usuarios <span class="sr-only"></span></a>
         </li>
      @endcan
      @can('roles.index')
         <li class="nav-item">
           <a class="nav-link" href="{{ route('roles.index') }}">Roles <span class="sr-only"></span></a>
         </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->user }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     @auth
      <li class="nav-item">
        <a id="linkSalir" class="nav-link" href="#">Salir</a>
        <form id="formSalir" action="{{ url('logout') }}" method="POST">
          @csrf
        </form>
      </li>
     @endauth
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

