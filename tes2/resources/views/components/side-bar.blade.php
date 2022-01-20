<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <div class="brand-text font-weight-light">
      <strong class="text-primary">companies and employees</strong>
    </div>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ Route::is(["home"]) ? 'active' : '' }}">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('company.index') }}" class="nav-link {{ Route::is(["company.*"]) ? 'active' : '' }}">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Companies
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('employee.index') }}" class="nav-link {{ Route::is(["employee.*"]) ? 'active' : '' }}">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Employee
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
