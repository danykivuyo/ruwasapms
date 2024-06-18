<!-- Meters Card -->
<div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">

      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Filter</h6>
          </li>

          <li><a wire:click.prevent="get_all_meters" class="dropdown-item" href="#">All Meters</a></li>
          <li><a wire:click.prevent="get_pd_meters" class="dropdown-item" href="#">PD Meters</a></li>
          <li><a wire:click.prevent="get_hhc_meters" class="dropdown-item" href="#">HHC Meters</a></li>
          <li><a wire:click.prevent="get_zn_meters" class="dropdown-item" href="#">ZN Meters</a></li>
        </ul>
      </div>

      <div class="card-body">
        <h5 class="card-title">Meters <span>| {{ $message }}</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-speedometer2"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $meters }}</h6>
            <span class="text-success small pt-1 fw-bold">{{ $active_meters }}</span> <span class="text-muted small pt-2 ps-1">active</span>

          </div>
        </div>
      </div>

    </div>
  </div><!-- End Meters Card -->