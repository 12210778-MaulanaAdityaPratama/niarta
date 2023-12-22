<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('Gambar/logo.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NIARTA ASIA GROUP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('user.home') }}" class="nav-link">
                    <i class="fa fa-home" style="margin-right: 10px;"></i>
                    <p>Beranda</p>
                  </a>
                </li>
            </li>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-envelope" style="margin-right: 10px;"></i>
              <p>
              <p>Perizinan</p>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user.perizinan') }}" class="nav-link">
                      <i class="fa fa-file-import" style="margin-right: 10;"></i>
                      <p>Data Perizinan</p>
                    </a>
                  </li>
            </ul>
        </li>
        <li class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fa fa-signal" style="margin-right: 10px;"></i>
                    <p>
                        Progres Pekerjaan
                    </p>
                  </a>
                </li>
            </li>
        </li>
                    <li class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fa fa-info" style="margin-right: 10px;"></i>
                            <p> Informasi </p>
                        </a>
                        </li>
                    </li>
                    <li class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('user.profile') }}" class="nav-link">
                          <i class="fa fa-info" style="margin-right: 10px;"></i>
                          <p> Ubah Password </p>
                      </a>
                      </li>
                  </li>
                </li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->

    <!-- /.sidebar -->
    <li class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="#"></i>
            <p>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            </p>
          </a>
        </li>
    </li>
</li>
  </aside>

