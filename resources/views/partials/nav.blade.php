<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
  <a class="navbar-brand" href="{{ route('admin.index') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @can('users.index')
         <li class="nav-item">
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
          <a class="dropdown-item" href="#">Another</a>
          <div class="dropdown-divider"></div>
          <a id="linkSalir" class="dropdown-item" href="#">Salir</a>
            <form id="formSalir" action="{{ url('logout') }}" method="POST">
              @csrf
            </form>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav mr-4">
    	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarLocale" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ App::getLocale() }}
        </a>
         <div class="dropdown-menu" style="min-width: 5rem "  aria-labelledby="navbarLocale">
            <a class="dropdown-item" href="{{ route('change_lang', ['lang' => 'es']) }}">es</a>
            <a class="dropdown-item" href="{{ route('change_lang', ['lang' => 'en']) }}">en</a>
         </div>
      </li>
    </ul>
  </div>
  {{-- seccion de idioma alineado a la derecha --}}

   {{-- seccion de idioma alineado a la derecha --}}
</nav>



