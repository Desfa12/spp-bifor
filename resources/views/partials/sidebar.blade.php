 <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"> 
        </div>
        <div class="info">
         @auth
          <a class="d-block">Hello {{ Auth::user()->name }}!</a>
           @else
          <a href="#" class="d-block">Belum Login</a>

          @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
             </li>
          <li class="nav-item">
            <a href="/settings/edit" class="nav-link">
              <i class="fa fa-cog" aria-hidden="true"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/datakelas" class="nav-link">
             <i class="fas fa-users"></i>
              <p>
                Data Kelas
              </p>
            </a>
             </li>
          <li class="nav-item">
            <a href="/datasiswa" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Data Siswa
              </p>
            </a> 
             </li>        
          <li class="nav-item">
            <a href="/transaksi" class="nav-link">
              <i class="fas fa-money-bill-wave"></i>
              <p>
                Transaksi
              </p>
            </a>
             </li>
          <li class="nav-item">
            <a href="/rekap" class="nav-link">
              <i class="fas fa-clipboard-list"></i>
              <p>
                Rekap dan Laporan
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="/rekap" class="nav-link">
              <i class="fas fa-clipboard-list"></i>
              <p>
                Rekap
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Laporan
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-save"></i>
              <p>
                Simpan
              </p>
            </a>
          </li> --}}
            
    </div>