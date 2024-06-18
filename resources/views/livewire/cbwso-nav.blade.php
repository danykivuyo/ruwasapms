<li class="nav-item">
    <a id="cbwso-button" class="nav-link @if(Request::segment(1) === 'cbwso') @else collapsed @endif" data-bs-target="#cbwso-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-shop-window"></i><span>CBWSO</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="cbwso-nav" class="nav-content @if(Request::segment(1) === 'cbwso') @else collapse @endif"" data-bs-parent="#sidebar-nav" >
      <li style="@if(Request::segment(1) === 'cbwso' && Request::segment(2) != 'register') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('cbwso.index') }}">
          <i class="bi bi-circle"></i><span>All CBWSO</span>
        </a>
      </li>
      <li style="@if(Request::segment(1) === 'cbwso' && Request::segment(2) === 'register') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('cbwso.register') }}">
          <i class="bi bi-circle"></i><span>CBWSO Register</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
