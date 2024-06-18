<li class="nav-item">
  <a id="meter-button" class="nav-link @if(Request::segment(1) === 'meters') @else collapsed @endif" data-bs-target="#meter-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-window"></i><span>Meter</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="meter-nav" class="nav-content @if(Request::segment(1) === 'meters') @else collapse @endif" data-bs-parent="#sidebar-nav" >
    <li style="@if(Request::segment(1) === 'meters' && Request::segment(2) != 'register') background-color: rgba(246,249,255,255) @endif">
      <a wire:navigate href="{{ route('meters') }}">
        <i class="bi bi-circle"></i><span>Meters</span>
      </a>
    </li>
    <li style="@if(Request::segment(1) === 'meters' && Request::segment(2) === 'register') background-color: rgba(246,249,255,255) @endif">
      <a wire:navigate href="{{ route('meters.register') }}">
        <i class="bi bi-circle"></i><span>Meter Register</span>
      </a>
    </li>
  </ul>
</li><!-- End Components Nav -->