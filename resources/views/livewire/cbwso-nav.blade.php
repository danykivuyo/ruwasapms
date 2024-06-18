<li class="nav-item">
    <a id="cbwso-button" class="nav-link @if(Request::segment(1) === 'cbwso') @else collapsed @endif" data-bs-target="#cbwso-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-shop-window"></i><span>CBWSO</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="cbwso-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
      <li>
        <a wire:navigate href="{{ route('cbwso.index') }}">
          <i class="bi bi-circle"></i><span>All CBWSO</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="{{ route('cbwso.register') }}">
          <i class="bi bi-circle"></i><span>CBWSO Register</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>CBWSO Tarrifs</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>Revenue</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>Maintenance</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>Purchases</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
