<li class="nav-item">
    <a id="purchase-button" class="nav-link @if(Request::segment(1) === 'purchase') @else collapsed @endif" data-bs-target="#purchase-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-cash-coin"></i><span>Purchase</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="purchase-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
      <li>
        <a wire:navigate href="{{ route('purchase') }}">
          <i class="bi bi-circle"></i><span>Purchase</span>
        </a>
      </li>
      <li>
        <a wire:navigate href="{{ route('purchase.history') }}">
          <i class="bi bi-circle"></i><span>Purchase History</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->