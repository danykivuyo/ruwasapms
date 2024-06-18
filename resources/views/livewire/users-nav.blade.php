<li class="nav-item">
    <a id="users-button" class="nav-link @if(Request::segment(1) === 'users') @else collapsed @endif" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-card-checklist"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="users-nav" class="nav-content @if(Request::segment(1) === 'users') @else collapse @endif" data-bs-parent="#sidebar-nav" >
      <li>
        <a wire:navigate href="{{ route('transactions') }}">
          <i class="bi bi-circle"></i><span>Users</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->