<section class="section">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">customers</h5>
            <!-- Table with stripped rows -->
            <div id="customers-table-container" >
                <table class="table datatable" >
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Phone</th>
                            <th>
                                meter ID
                            </th>
                            <th>Balance</th>
                            <th>Control No</th>
                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->meter_id }}</td>
                                <td>{{ $customer->balance }}</td>
                                <td>{{ $customer->control_number }}</td>
                                <td>{{ $customer->getFormattedDateAttribute() }}</td>
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