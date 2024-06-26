  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a wire:navigate class="nav-link @if (Request::segment(1) === 'home') @else collapsed @endif"
                  href="{{ route('home') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard </span>
              </a>
          </li><!-- End Dashboard Nav -->

          @livewire('meter-nav')
          @livewire('users-nav')
          @livewire('reports-nav')
          @livewire('cbwso-nav')
          @livewire('purchase-nav')
          @livewire('transactions-nav')
      </ul>

  </aside><!-- End Sidebar-->
