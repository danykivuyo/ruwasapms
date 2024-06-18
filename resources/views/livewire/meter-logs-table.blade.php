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
                    <th> Meter Type</th>
                    <th>Message</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meter_logs as $meter_log)
                    <tr>
                        <td>{{ $meter_log->meter_id }}</td>
                        <td>{{ $meter_log->meter }}</td>
                        <td>{{ $meter_log->message }}</td>
                        <td>{{ $meter_log->getFormattedDateAttribute() }}</td>
                        <td>{{ $meter_log->status }}</td>
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