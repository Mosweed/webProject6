<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="/product">
                    <i class="mdi mdi-shopping menu-icon"></i>
                    <span class="menu-title">Producten</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/groothandel/">
                    <i class="mdi mdi-basket menu-icon"></i>
                    <span class="menu-title">Groothandel producten</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-basket menu-icon"></i>
                    <span class="menu-title">Kuin Groothandel</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/groothandel/">Bestel Kuin producten</a></li>
                        <li class="nav-item"> <a class="nav-link" href="/groothandel/bestellingen/">Bekijk bestellingen</a>
                        </li>
            </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders') }}">
            <i class="mdi mdi-truck menu-icon"></i>

            <span class="menu-title">Bestellingen</span>
        </a>
    </li>
    @endif
    @if (Auth::user()->role == 'humanresources')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.index') }}">
                <i class=" bi bi-person-fill menu-icon"></i>

                <span class="menu-title">medewerkers</span>
            </a>
        </li>
    @endif
    <!-- <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Form elements</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li> -->
    @if (Auth::user()->role == 'management')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Groene Vingers Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/product-sales/">Product en Categorie
                            verkoop</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/general-sales/">Verkoop data</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/register-sales/">Verkoop per
                            Register</a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a> --}}
        </li>
        </ul>
        </div>
        </li>
    @endif
    </ul>
</nav>
