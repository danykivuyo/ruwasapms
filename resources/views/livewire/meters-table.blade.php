<section class="section">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
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
                    <th>Balance</th>
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
                        <td>{{ $meter->balance }}</td>
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