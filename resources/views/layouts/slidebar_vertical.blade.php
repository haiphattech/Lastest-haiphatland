<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img style="width: calc(244px - 85px);  height: 50px" src="/assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img style="width: calc(244px - 120px); width: 90%; height: 40px" src="/assets/images/logo-mini.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="/assets/images/faces/man.png" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                        <span>Nhân viên</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category pb-0">
            <span class="nav-link">Chung</span>
        </li>
        <li class="nav-item menu-items {{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('home')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ (request()->is('users/*') || request()->is('role/*')) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
                <span class="menu-title">Nhân viên</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('users') || request()->is('users/create') || request()->is('role/*')) ? 'show' : '' }}" id="user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ (request()->is('users')) ? 'active' : '' }}" href="{{route('users.index')}}">Danh sách</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('users/create') ? 'active' : '' }}" href="{{route('users.create')}}">Thêm mới</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items {{ (request()->is('permissions') || request()->is('permissions/create') || request()->is('type-permissions') || request()->is('type-permissions/create')) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#permission" aria-expanded="false" aria-controls="permission">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                <span class="menu-title">Phân quyền</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('permissions') || request()->is('permissions/create') || request()->is('type-permissions') || request()->is('type-permissions/create')) ? 'show' : '' }}" id="permission">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ (request()->is('permissions')) ? 'active' : '' }}" href="{{route('permissions.index')}}">Danh sách</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('permissions/create') ? 'active' : '' }}" href="{{route('permissions.create')}}">Thêm mới</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('type-permissions') ? 'active' : '' }}" href="{{route('type-permissions.index')}}">Loại quyền</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items {{ (request()->is('categories')||request()->is('categories/*')) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
              <span class="menu-icon">
                <i class="mdi mdi-dns"></i>
              </span>
                <span class="menu-title">Danh mục</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('categories') || request()->is('categories/create') ||request()->is('categories/*')) ? 'show' : ''}}" id="categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}" href="{{route('categories.index')}}"> Danh sách </a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('categories/create') ? 'active' : '' }}" href="{{route('categories.create')}}"> Thêm mới </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items {{ (request()->is('menus')||request()->is('menus/*')) ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#menus" aria-expanded="false" aria-controls="menus">
              <span class="menu-icon">
                <i class="mdi mdi-dns"></i>
              </span>
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->is('menus') || request()->is('menus/create') ||request()->is('menus/*')) ? 'show' : ''}}" id="menus">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ (request()->is('menus')) ? 'active' : '' }}" href="{{route('menus.index')}}"> Danh sách </a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('menus/create') ? 'active' : '' }}" href="{{route('menus.create')}}"> Thêm mới </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category  pb-0">
            <span class="nav-link">Dự án</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('projects.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Danh sách</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('projects.create')}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
                <span class="menu-title">Thêm mới</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#statusProject" aria-expanded="false" aria-controls="statusProject">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                <span class="menu-title">Trạng thái dự án</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="statusProject">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('status-projects.index')}}"> Danh sách</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('status-projects.create')}}"> Thêm mới </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#statusProject" aria-expanded="false" aria-controls="statusProject">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                <span class="menu-title">Loại hình dự án</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="statusProject">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('type-projects.index')}}"> Danh sách</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('type-projects.create')}}"> Thêm mới </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
