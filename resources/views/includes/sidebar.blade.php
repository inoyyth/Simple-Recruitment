  <!-- Sidebar Start -->
  <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            @if (!auth()->guard('surveyor')->check())
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Master</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('operator.index') ? 'active' : '' }}" href="{{ route('operator.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Operator/Surveyor</span>
              </a>
            </li>
            @endif
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Aktivitas</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('dailyActivity.index') ? 'active' : '' }}" href="{{ route('dailyActivity.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Harian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('timeSheet.index') ? 'active' : '' }}" href="{{ route('timeSheet.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Time Sheet</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Monitoring</span>
            </li>
            @if (auth()->guard('web')->check() && auth()->guard('web')->user()->role == "secret")
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('dataPenetapan.index') ? 'active' : '' }}" href="{{ route('dataPenetapan.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Monitoring Surveyor</span>
              </a>
            </li>
            @else
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('recipient.index') ? 'active' : '' }}" href="{{ route('recipient.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Monitoring Surveyor</span>
              </a>
            </li>
            @endif
            @if (!auth()->guard('surveyor')->check())
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('quesioner.index') ? 'active' : '' }}" href="{{ route('quesioner.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Monitoring BLU</span>
              </a>
            </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('kcuChecking.index') ? 'active' : '' }}" href="{{ route('kcuChecking.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Monitoring Gudang KCU</span>
              </a>
            </li>
            @if (!auth()->guard('surveyor')->check())
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Absensi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('attendance.add') }}" target="_blank" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Absensi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('attendance.index') ? 'active' : '' }}" href="{{ route('attendance.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Log Absensi</span>
              </a>
            </li>
            @endif
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Lainnya</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('helpCenter.index') ? 'active' : '' }}" href="{{ route('helpCenter.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Pusat Bantuan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Tutorial</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="https://youtu.be/PX3tJ_UPUDE" target="_blank" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Isi Aktivitas Harian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="https://youtu.be/7C4gtvjR030" target="_blank" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Isi Time Sheet</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="https://youtu.be/80vomJ3ZxoY" target="_blank" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Cara Isi Monitoring Surveyor</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="https://youtu.be/5mRpdRV2Q-M" target="_blank" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Isi Monitoring Gudang KCU</span>
              </a>
            </li>
          </ul>
          <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="{{
        URL::asset('themes/assets/images/backgrounds/rocket.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div> -->
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->