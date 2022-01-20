<nav class="main-header navbar navbar-expand navbar-dark navbar-primary bg-grad-horizontal">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <li class="dropdown-divider"></li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}"
             onclick="event.preventDefault();document.getElementById('logout-form').submit();" role="button">
            <i class="nav-icon fas fa-power-off mr-2"></i> Logout
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
