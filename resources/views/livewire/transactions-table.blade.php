<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Meters</h5>
                    <!-- Table with stripped rows -->
                    <div class="table-container">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        Transaction ID
                                    </th>
                                    <th> Provider</th>
                                    <th> Meter ID</th>
                                    <th>Account NO</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->meter_id }}</td>
                                        <td>{{ $transaction->meter }}</td>
                                        <td>{{ $transaction->message }}</td>
                                        <td>{{ $transaction->getFormattedDateAttribute() }}</td>
                                        <td>{{ $transaction->status }}</td>
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
