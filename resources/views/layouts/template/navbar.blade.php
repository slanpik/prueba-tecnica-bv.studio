<nav class="navbar navbar-expand-lg navbar-light color-used ">
    <a class="navbar-brand" href="/">@lang('navbar.test')</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">

        <li class="nav-item {{ (Request::is('/') ? 'active' : '') }}">
          <a class="nav-link" href="/">@lang('navbar.home')</a>
        </li>

        <li class="nav-item {{ (Request::is('create') ? 'active' : '') }}">
          <a class="nav-link" href="{{ route('user.createUser')}} ">@lang('navbar.create')</a>
        </li>
        
        <li class="nav-item {{ (Request::is('show') ? 'active' : '') }}">
          <a class="nav-link" href="{{ route('user.showAllUsers')}} ">@lang('navbar.show')</a>
        </li>
        
      </ul>
    </div>
  </nav>