<section class="section">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">CBWSOs</h5>
            <!-- Table with stripped rows -->
            <div id="cbwsos-table-container" >
                <table class="table datatable" >
                    <thead>
                        <tr>
                            <th>
                                CBWSO
                            </th>
                            <th>Region</th>
                            <th>District</th>
                            <th>Tarrif</th>
                            <th>Income</th>
                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cbwsos as $cbwso)
                            <tr>
                                <td>{{ $cbwso->name }}</td>
                                <td>{{ $cbwso->region }}</td>
                                <td>{{ $cbwso->district }}</td>
                                <td>{{ $cbwso->tarrif }}</td>
                                <td>{{ $cbwso->yearly_income }}</td>
                                <td>{{ $cbwso->getFormattedDateAttribute() }}</td>
                                <td><button wire:click.prevent="delete({{$cbwso->id}})" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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