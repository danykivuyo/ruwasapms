<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Register Meter Client</h5>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Vertical Form -->
        <form wire:submit.prevent="register" class="row g-3">
            <div class="col-12">
                <select wire:model="region" class="form-select" id="region" name="region" wire:model="region" wire:change="update_region($event.target.value)">
                    <option value="">Select Region</option>
                    @foreach ($regions as $reg)
                        <option value="{{ $reg['name'] }}">{{ $reg['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                    <select wire:model="district" class="form-select" name="district" id="district" aria-label="Floating label select example" wire:change="update_district($event.target.value)">
                        <option selected>Select district</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['name'] }}">{{ $district['name'] }}</h3>
                            @endforeach
                    </select>
            </div>
            <div class="col-12">
                <label for="client_name" class="form-label">Client Name</label>
                <input wire:model="client_name"  type="text" class="form-control" id="client_name" name="client_name">
            </div>

            <div class="col-12">
                <label for="client_number" class="form-label">Client Number</label>
                <input wire:model="client_number" type="tel" class="form-control" id="client_number" name="client_number">
            </div>

            <div class="col-12">
                <label for="client_house_number" class="form-label">Client House Number</label>
                <input wire:model = "client_house_number" type="number" class="form-control" id="client_house_number" name="client_house_number">
            </div>

            <div class="col-6">
                <label for="meter_id" class="form-label">Meter ID</label>
                {{-- <input wire:model = "client_meter_id" type="text" class="form-control" id="client_meter_id" name="client_meter_id"> --}}
                <select wire:model="meter_id" class="form-select" id="meter_id" name="meter_id" wire:model="meter_id">
                    <option value="">Select Meter</option>
                    @foreach ($meter_ids as $meter_id)
                        <option value="{{ $meter_id->meter_id }}">{{ $meter_id->meter_id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <label for="client_card_id" class="form-label">Tag/Card ID</label>
                <input wire:model = "client_card_id" type="text" class="form-control" id="client_card_id" name="client_card_id">
            </div>
            
            <div class="col-12">
            <label for="client_initial_amount" class="form-label">Initial Amount</label>
            <input wire:model = "client_initial_amount" type="text" class="form-control" id="client_initial_amount" name="client_initial_amount" placeholder="0.00">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

        </div>
    </div>
</div>