<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
            <a class="nav-link @if(Request::path()== '/') active @endif" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
            <a class="nav-link @if(Request::path()== 'settings') active @endif" href="/settings">
              <span data-feather="users"></span>
              Settings
            </a>
      </div>
    </div>
  </div>
</nav>
