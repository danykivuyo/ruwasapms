<li class="nav-item">
    <a id="reports-button" class="nav-link @if(Request::segment(1) === 'reports') @else collapsed @endif" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="reports-nav" class="nav-content @if(Request::segment(1) === 'reports') @else collapse @endif" data-bs-parent="#sidebar-nav" >
      <li style="@if(Request::segment(1) === 'reports' && Request::segment(2) === 'meters-logs') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('meterlogs.index') }}">
          <i class="bi bi-circle"></i><span>Meter Logs</span>
        </a>
      </li>
      <li style="@if(Request::segment(1) === 'meters' && Request::segment(2) === 'register') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>Water Usage</span>
        </a>
      </li>
      <li style="@if(Request::segment(1) === 'meters' && Request::segment(2) === 'register') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="#">
          <i class="bi bi-circle"></i><span>Meter Status</span>
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
    </ul>
  </li><!-- End Components Nav -->
