  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button">
          <i class="far fa-user"></i>
          <span class="d-none d-md-inline ml-1">{{ session('admin_name', 'Admin') }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ session('admin_name', 'Administrator') }}</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.profile') }}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <a href="{{ route('admin.settings') }}" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('admin.logout') }}" class="dropdown-item-text">
            @csrf
            <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left;">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->