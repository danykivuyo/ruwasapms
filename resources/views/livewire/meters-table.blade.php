<section class="section">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <div class="filter" style="text-align: right; margin-right: 0%; margin-top: 5px;">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a wire:navigate class="dropdown-item" href="{{ route('meters') }}">All Meters</a></li>        
                  <li><a wire:navigate class="dropdown-item" href="{{ route('meters', ['type' => 'PD']) }}">PD Meters</a></li>
                  <li><a wire:navigate class="dropdown-item" href="{{ route('meters', ['type' => 'HHC']) }}">HHC Meters</a></li>
                  <li><a wire:navigate class="dropdown-item" href="{{ route('meters', ['type' => 'ZN']) }}">ZN Meters</a></li>
                </ul>
            </div>
            <h5 class="card-title">Meters</h5>
            <!-- Table with stripped rows -->
            <div id="meters-table-container" >
            <table class="table datatable" >
            <thead>
                <tr>
                    <th>
                        MeterID
                    </th>
                    <th>Meter NO</th>
                    <th>Region</th>
                    <th>District</th>
                    <th>CBWSO</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                    @if ($meter_type != "PD" && $meter_type != "ZN")
                        <th>Balance</th>
                    @endif
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meters as $meter)
                    <tr>
                        <td>{{ $meter->meter_id }}</td>
                        <td>{{ $meter->meter_number }}</td>
                        <td>{{ $meter->region }}</td>
                        <td>{{ $meter->district }}</td>
                        <td>{{ $meter->cbwso }}</td>
                        <td>{{ $meter->getFormattedDateAttribute() }}</td>
                        @if ($meter_type != "PD" && $meter_type != "ZN")
                            @if ($meter->type == "HHC")
                                <td>{{ $meter->balance }}</td>
                            @else 
                                <td></td>
                            @endif
                        @endif
                        <td>              
                            
                            @if($meter->status == 1)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> active</span>
                            @else
                                <span class="badge bg-danger"><i class="bi bi-check-circle me-1"></i> inactive</span>
                            @endif
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            </div>
            <!-- End Table with stripped rows -->

        </div>
        </div>
    </div>
    </div>
</section>
<script>
    document.querySelectorAll('#dynamicContent script').forEach(script => {
                eval(script.innerText); // Execute script content again
            });
</script>