<?php $url = $_SERVER["REQUEST_URI"] ?>
<aside class="main-sidebar sidebar-light-pink elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kadek Panji</a>
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
            <a href="home.php" class="nav-link <?= strpos($url, "home.php") ? "active" : "" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="write.php" class="nav-link <?= strpos($url, "write.php") ? "active" : "" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Write
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="read.php" class="nav-link <?= strpos($url, "read.php") ? "active" : "" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Read
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sort.php" class="nav-link <?= strpos($url, "sort.php") ? "active" : "" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sort
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>