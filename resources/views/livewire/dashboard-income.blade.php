<!-- Website Traffic -->
<div class="card">
    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown" disabled><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a wire:click.prevent="income_today" class="dropdown-item" href="#">Today</a></li>
        <li><a wire:click.prevent="income_week" class="dropdown-item" href="#">This Month</a></li>
        <li><a wire:click.prevent="income_month" class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body pb-0">
      <h5 class="card-title">Income <span>| {{ $message }}</span></h5>

      <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

      <script>
        document.addEventListener("livewire:navigated", () => {
          echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
              trigger: 'item'
            },
            legend: {
              top: '5%',
              left: 'center'
            },
            series: [{
              name: 'Access From',
              type: 'pie',
              radius: ['40%', '70%'],
              avoidLabelOverlap: false,
              label: {
                show: false,
                position: 'center'
              },
              emphasis: {
                label: {
                  show: true,
                  fontSize: '18',
                  fontWeight: 'bold'
                }
              },
              labelLine: {
                show: false
              },
              data: [{
                  value: 1048,
                  name: 'Mbeya'
                },
                {
                  value: 735,
                  name: 'Iringa'
                },
                {
                  value: 1200,
                  name: 'Songea'
                },
                {
                  value: 200,
                  name: 'Sumbawanga'
                }
              ]
            }]
          });
        });
      </script>

    </div>
  </div><!-- End Website Traffic -->