<div class="app-sidebar">
    <!-- Sidebar Logo -->
    <div class="logo-box mt-3">
         <a href="{{ route('products.index') }}" class="logo-dark">
              <img src="{{ asset('logo.png') }}" class="logo-sm" alt="logo sm">
              <img src="{{ asset('logo.png') }}" class="logo-lg" alt="logo dark">
         </a>

         <a href="{{ route('products.index') }}" class="logo-light">
              <img src="{{ asset('logo.png') }}" class="logo-sm" alt="logo sm">
              <img src="{{ asset('logo.png') }}" class="logo-lg" alt="logo light">
         </a>
    </div>

    <div class="scrollbar" data-simplebar>

         <ul class="navbar-nav" id="navbar-nav">

              <li class="menu-title">Menu...</li>
              
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:box-outline"></iconify-icon>
                    </span>
                    <span class="nav-text">Manage Product</span>
                </a>
              </li>
         </ul>
    </div>
</div>