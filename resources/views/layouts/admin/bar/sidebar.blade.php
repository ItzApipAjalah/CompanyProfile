<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Admin Panel</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Produks Manager</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('produks.index') }}">Manage Produks</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Manage Category</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog-posts.index') }}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Manage Blog</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Profile Manager</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('profiles.index') }}">Manage Profile</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('teams.index') }}">Manage struktur</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="hidden" name="role" value="admin">
            <button type="submit" class="nav-link">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </button>
        </form>
      </li>

    </ul>
  </nav>
