    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-header">SITE SETTINGS</li>
          <!-- Hero Slides -->
          <li class="nav-item">
            <a href="{{ route('admin.hero-slides.index') }}" class="nav-link {{ request()->is('admin/hero-slides*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>Hero Slides</p>
            </a>
          </li>
          <!-- Footer Settings -->
          <li class="nav-item">
            <a href="{{ route('admin.admin.footer-settings.index') }}" class="nav-link">
              <i class="nav-icon fas fa-window-minimize"></i>
              <p>Footer Settings</p>
            </a>
          </li>
          
          <li class="nav-header">CONTENT MANAGEMENT</li>
          <!-- Service Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Service Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.service.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.service.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Service</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Blog Posts Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog Posts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.blog-posts.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.blog-posts.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Post</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Quote Management -->
          <li class="nav-item">
            <a href="{{ route('admin.quotes.index') }}" class="nav-link {{ request()->is('admin/quotes*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>Quote Requests</p>
            </a>
          </li>
          
          <!-- News Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Latest News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add News</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Testimonials Management -->
          <!-- Top Bar Settings -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Top Bar Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.top-bar.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Top Bar</p>
                </a>
              </li>
            </ul>
          </li>

    

          <!-- Testimonials Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-quote-left"></i>
              <p>
                Testimonials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Testimonials</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Clients Management -->
          <li class="nav-item">
            <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->is('admin/clients*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Our Clients</p>
            </a>
          </li>
          
          <li class="nav-header">ACCOUNT MANAGEMENT</li>
          <!-- Profile -->
          <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <!-- Settings -->
          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->