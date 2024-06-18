<li class="nav-item">
    <a id="transactions-button" class="nav-link @if(Request::segment(1) === 'transactions') @else collapsed @endif" data-bs-target="#transactions-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-card-checklist"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="transactions-nav" class="nav-content @if(Request::segment(1) === 'transactions') @else collapse @endif" data-bs-parent="#sidebar-nav" >
      <li>
        <a wire:navigate href="{{ route('transactions') }}">
          <i class="bi bi-circle"></i><span>Transactions</span>
        </a>
      </li>
    </ul> 
  </li><!-- End Components Nav -->