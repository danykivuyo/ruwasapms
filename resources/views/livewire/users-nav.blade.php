<li class="nav-item">
    <a id="users-button" class="nav-link @if(Request::segment(1) === 'users') @else collapsed @endif" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-card-checklist"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="users-nav" class="nav-content @if(Request::segment(1) === 'users') @else collapse @endif" data-bs-parent="#sidebar-nav" >
      <li style="@if(Request::segment(1) === 'users' && Request::segment(2) == 'staff') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('transactions') }}">
          <i class="bi bi-circle"></i><span>Staff</span>
        </a>
      </li>
      <li style="@if(Request::segment(1) === 'users' && Request::segment(2) == 'technicians') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('transactions') }}">
          <i class="bi bi-circle"></i><span>Technicians</span>
        </a>
      </li>
      <li style="@if(Request::segment(1) === 'users' && Request::segment(2) == 'customers') background-color: rgba(246,249,255,255) @endif">
        <a wire:navigate href="{{ route('customers') }}">
          <i class="bi bi-circle"></i><span>Customers</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="{{ route('transactions') }}">
          <i class="bi bi-circle"></i><span>Register</span>
        </a>
      </li>

    </ul>
  </li><!-- End Components Nav -->