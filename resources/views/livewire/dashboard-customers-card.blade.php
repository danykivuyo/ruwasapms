<!-- Customers Card -->
{{-- <div class="col-xxl-4 col-xl-12"> --}}
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card customers-card">
      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Filter</h6>
          </li>
          <li><a wire:click.prevent="get_all_customers" class="dropdown-item" href="#">All</a></li>
          <li><a wire:click.prevent="get_pd_customers" class="dropdown-item" href="#">PD Customers</a></li>
          <li><a wire:click.prevent="get_hhc_customers" class="dropdown-item" href="#">HHC Customers</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Customers <span>| {{ $message }}</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $customers }}</h6>
            <span class="text-danger small pt-1 fw-bold"></span> {{ $active_customers }} <span class="text-muted small pt-2 ps-1">active</span>

          </div>
        </div>

      </div>
    </div>

  </div><!-- End Customers Card -->