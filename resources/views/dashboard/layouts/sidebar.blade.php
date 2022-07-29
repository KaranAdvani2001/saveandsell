<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SaveAndSell</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
          <a href="{{route('dashboard.index')}}" class="nav-link {{isset($menu) && $menu == 'dashboard' ?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
          @if(Auth::user()->is_admin)
          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link {{isset($menu) && $menu == 'category' ?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item has-treeview">
            <a href="{{route('product.index')}}" class="nav-link {{isset($menu) && $menu == 'product' ?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview {{isset($menu) && $menu == 'trade' ?' menu-open':''}}">
            <a href="#" class="nav-link {{isset($menu) && $menu == 'trade' ?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Trade
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('my.trade')}}" class="nav-link {{isset($submenu) && $submenu == 'my trade' ?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Trade</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trading.list')}}" class="nav-link {{isset($submenu) && $submenu == 'trading' ?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trading</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item has-treeview {{isset($menu) && $menu == 'profile' ?' menu-open':''}}">
            <a href="#" class="nav-link {{isset($menu) && $menu == 'profile' ?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link {{isset($submenu) && $submenu == 'profile' ?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{isset($submenu) && $submenu == 'password' ?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password change</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>