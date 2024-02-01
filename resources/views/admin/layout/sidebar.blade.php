      <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-bold">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{asset("assets/dist/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href={{url ('admin/dashboard')}} class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('')}} class="nav-link @if(Request::segment(2) == 'home')active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/admin/list')}} class="nav-link @if(Request::segment(2) == 'admin')active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/product/list')}} class="nav-link @if(Request::segment(2) == 'product')active @endif">
              <i class="nav-icon fa fa-product-hunt"></i>
              <p>
                Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/category/list')}} class="nav-link @if(Request::segment(2) == 'category')active @endif">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/sub_category/list')}} class="nav-link @if(Request::segment(2) == 'sub_category')active @endif">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/brand/list')}} class="nav-link @if(Request::segment(2) == 'brand')active @endif">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Brand
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{url ('admin/colour/list')}} class="nav-link @if(Request::segment(2) == 'colour')active @endif">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Colour
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href={{route('admin.logout')}} class="nav-link">
              <i class="fa fa-sign-out-alt nav-icon"></i>

              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->