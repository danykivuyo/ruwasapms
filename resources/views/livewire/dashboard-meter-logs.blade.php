<!-- Recent Activity -->
{{-- <div wire:poll.5000ms="fetchLogs('{{ $meter_type }}')" class="card"> --}}
<div class="card">
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
    <h5 class="card-title">Meter Logs <span>| {{ $meter_type }}</span></h5>

    <div class="activity" wire:poll.5000ms="fetchLogs('{{ $meter_type }}')">
      @foreach(collect($this->logs)->take(6) as $log)
        <div class="activity-item d-flex">
          <div class="activite-label">{{ $log['time'] }}</div>
          <i class="bi bi-circle-fill activity-badge text-{{ $log['status'] }} align-self-start"></i>
          <div class="activity-content">
            {{ $log['message'] }}
          </div>
        </div><!-- End activity item-->
      @endforeach
    </div>

    {{-- <div class="activity">

      <div class="activity-item d-flex">
        <div class="activite-label">32 min</div>
        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
        <div class="activity-content">
          Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
        </div>
      </div><!-- End activity item-->

      <div class="activity-item d-flex">
        <div class="activite-label">56 min</div>
        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
        <div class="activity-content">
          Voluptatem blanditiis blanditiis eveniet
        </div>
      </div><!-- End activity item-->

      <div class="activity-item d-flex">
        <div class="activite-label">2 hrs</div>
        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
        <div class="activity-content">
          Voluptates corrupti molestias voluptatem
        </div>
      </div><!-- End activity item-->

      <div class="activity-item d-flex">
        <div class="activite-label">1 day</div>
        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
        <div class="activity-content">
          Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
        </div>
      </div><!-- End activity item-->

      <div class="activity-item d-flex">
        <div class="activite-label">2 days</div>
        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
        <div class="activity-content">
          Est sit eum reiciendis exercitationem
        </div>
      </div><!-- End activity item-->

      <div class="activity-item d-flex">
        <div class="activite-label">4 weeks</div>
        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
        <div class="activity-content">
          Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
        </div>
      </div><!-- End activity item-->

    </div> --}}

  </div>
</div><!-- End Recent Activity -->