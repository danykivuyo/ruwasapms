<!-- Reports -->
<div class="col-12">
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
        <h5 class="card-title">Reports <span>| {{ $message }}</span></h5>

        <!-- Line Chart -->
        <div id="reportsChart"></div>

        <script>
          document.addEventListener("livewire:navigated", () => {
            // Select the chart container
            const chartContainer = document.querySelector("#reportsChart");
            window.hhc = @json($hhc_data);
            window.pd = @json($pd_data);
            window.zn = @json($zn_data);
            // Clear the contents of the chart container
            chartContainer.innerHTML = '';
            new ApexCharts(document.querySelector("#reportsChart"), {
              series: [{
                name: 'HHC',
                data: window.hhc,
              }, {
                name: 'PD',
                data: window.pd
              }, {
                name: 'ZN',
                data: window.zn
              }],
              chart: {
                height: 350,
                type: 'area',
                toolbar: {
                  show: false
                },
              },
              markers: {
                size: 4
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d'],
              fill: {
                type: "gradient",
                gradient: {
                  shadeIntensity: 1,
                  opacityFrom: 0.3,
                  opacityTo: 0.4,
                  stops: [0, 90, 100]
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'smooth',
                width: 2
              },
              xaxis: {
                type: 'datetime',
                categories: ["2024-05-19T00:00:00.000Z", "2024-05-19T01:30:00.000Z", "2024-05-19T02:30:00.000Z", "2024-05-19T03:30:00.000Z", "2024-05-19T04:30:00.000Z", "2024-05-19T05:30:00.000Z", "2024-05-19T06:30:00.000Z"]
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
        </script>
        <!-- End Line Chart -->

      </div>

    </div>
  </div><!-- End Reports -->