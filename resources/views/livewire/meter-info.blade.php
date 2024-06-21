<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if ($meter->temp == 1)
                        <img src="{{ asset('/img/meter-tempered.jpg') }}" alt="meter" class="rounded-circle">
                    @elseif($meter->status == 1)
                        <img src="{{ asset('/img/meter-active.jpg') }}" alt="meter" class="rounded-circle">
                    @else
                        <img src="{{ asset('/img/meter-inactive.jpg') }}" alt="meter" class="rounded-circle">
                    @endif
                    <h2>{{ $meter->meter_id }}</h2>
                    <h3>{{ $meter->meter_number }}</h3>
                    <div class="social-links mt-2">
                        <button wire:click.prevent="off({{ $meter->id }})" type="button" class="btn btn-warning"><i
                                class="bi bi-file-break"></i></button>
                        <button wire:click.prevent="status({{ $meter->id }})" type="button"
                            class="btn btn-success"><i class="bi bi-file-check"></i></button>
                        <button wire:click.prevent="temper({{ $meter->id }})" type="button"
                            class="btn btn-secondary"><i class="bi bi-unlock"></i></button>
                        <button wire:click.prevent="delete({{ $meter->id }})" type="button"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link @if ($customers_tab_active) active @endif"
                                data-bs-toggle="tab" data-bs-target="#customers"
                                wire:click="customers_tab()">Customers</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link @if ($properties_tab_active) active @endif"
                                data-bs-toggle="tab" data-bs-target="#properties"
                                wire:click="properties_tab()">Properties</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link @if ($meter_logs_tab_active) active @endif"
                                data-bs-toggle="tab" data-bs-target="#meter-logs" wire:click="meter_logs_tab()">Meter
                                Logs</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link @if ($edit_user_tab_active) active @endif"
                                data-bs-toggle="tab" data-bs-target="#edit-user" wire:click="edit_user()">Edit
                                User</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade  @if ($customers_tab_active) show active @endif  profile-overview"
                            id="customers">
                            <h5 class="card-title">Customers</h5>
                            <p class="small fst-italic">Customers registered in This Meter</p>
                            <h5 class="card-title">Customers List</h5>
                            @if (count($customers) > 0)
                                <div class="table-container">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Balance</th>
                                                <th>Control No</th>
                                                <th>Registered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>{{ $customer->balance }}</td>
                                                <td>{{ $customer->control_number }}</td>
                                                <td>{{ $customer->getFormattedDateAttribute() }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>No User in this meter!</p>
                            @endif
                        </div>

                        <div class="tab-pane fade pt-3 @if ($properties_tab_active) show active @endif"
                            id="properties">
                            <form wire:submit.prevent="properties_register">
                                <div class="row mb-3">
                                    <label wire:modal="meter_no" for="meter_no"
                                        class="col-md-4 col-lg-3 col-form-label">Meter No</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="customer_name" type="text" class="form-control"
                                            id="customer_name" value="{{ $this->meter_no }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label wire:model="meter_lat" for="meter_lat"
                                        class="col-md-4 col-lg-3 col-form-label">Lat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="meter_lat" type="text" class="form-control" id="meter_lat"
                                            value="{{ $meter_lat }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label wire:model="meter_lon" for="meter_lon"
                                        class="col-md-4 col-lg-3 col-form-label">Lon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="meter_lon" type="text" class="form-control" id="meter_lon"
                                            value="{{ $this->meter_lon }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>



                        <div class="tab-pane fade pt-3 @if ($meter_logs_tab_active) show active @endif"
                            id="meter-logs">

                            <!-- Settings Form -->
                            <form wire:submit.prevent="logs_register">
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Activate
                                        Logs</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                            <label class="form-check-label" for="changesMade">
                                                Recharge Logs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                            <label class="form-check-label" for="newProducts">
                                                Tamper Logs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="proOffers">
                                            <label class="form-check-label" for="proOffers">
                                                Low Balance Logs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="securityNotify"
                                                checked disabled>
                                            <label class="form-check-label" for="securityNotify">
                                                Status Logs
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End settings Form -->

                        </div>

                        <div class="tab-pane fade profile-edit pt-3 @if ($edit_user_tab_active) show active @endif"
                            id="edit_user">

                            <!-- Profile Edit Form -->
                            <form wire:submit.prevent="edit_user_register">
                                <div class="row mb-3">
                                    <select wire:model="customer_id" class="form-select" id="customer_id"
                                        name="customer_id" wire:model="customer_id"
                                        wire:change="update_customer($event.target.value)">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}"> {{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if (isset($customer->id) && $customer_name != '')
                                    <div class="row mb-3">
                                        <label wire:modal="customer_name" for="customer_name"
                                            class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="customer_name" type="text" class="form-control"
                                                id="customer_name" value="{{ $this->customer_name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label wire:model="customer_phone" for="customer_phone"
                                            class="col-md-4 col-lg-3 col-form-label">Phone No</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="customer_phone" type="text" class="form-control"
                                                id="customer_phone" value="{{ $customer_phone }}">
                                        </div>
                                    </div>
                                    @if ($meter->type == 'PD')
                                        <div class="row mb-3">
                                            <label wire:model="customer_tag_id" for="customer_tag_id"
                                                class="col-md-4 col-lg-3 col-form-label">Tag Id</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="customer_tag_id" type="text" class="form-control"
                                                    id="customer_tag_id" value="{{ $this->customer_tag_id }}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                @else
                                    <p>Select Customer to see options!</p>
                                @endif
                            </form><!-- End Profile Edit Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
