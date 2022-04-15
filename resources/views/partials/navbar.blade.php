<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 navbar-light">
        <ul class="nav flex-column navbar-nav">
          <li class="nav-item">
            <a class="nav-link @if(Request::path()== '/') active @endif" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Request::path()== 'products') active @endif" href="/products">
              <span data-feather="file"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Request::path()== 'customers') active @endif" href="/customers">
              <span data-feather="shopping-cart"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Request::path()== 'settings') active @endif" href="/settings">
              <span data-feather="users"></span>
              Settings
            </a>
          </li>
        </ul>
      </div>
    </nav>