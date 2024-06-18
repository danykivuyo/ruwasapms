<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Register Meter</h5>
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
        <!-- Multi Columns Form -->
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
                    <select wire:model="district" class="form-select" name="district" id="district" aria-label="Floating label select example">
                        <option selected>Select district</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['name'] }}">{{ $district['name'] }}</h3>
                            @endforeach
                    </select>
            </div>

            <div class="col-md-12">
                <label for="cbwso" class="form-label">CBWSO</label>
                <input wire:model="cbwso" type="text" name="cbwso" class="form-control" id="cbwso">
            </div>

            <div class="col-md-6">
                <label for="lat" class="form-label">Latitude</label>
                <input wire:model="lat" type="text" name="lat" class="form-control" id="lat">
            </div>

            <div class="col-md-6">
                <label for="lon" class="form-label">Longitude</label>
                <input wire:model="lon" type="text" name="lon" class="form-control" id="lon">
            </div>

            <div class="col-12">
                <label for="comment" class="form-label">Comment</label>
                  <textarea wire:model="comment"  class="form-control" id="comment" style="height: 100px;"></textarea>
            </div>

            <div class="col-md-4">
                <label for="meter_id" class="form-label">Meter ID</label>
                <input wire:model="meter_id" type="text" name="meter_id" class="form-control" id="meter_id">
            </div>

            <div class="col-md-4">
                <label for="meter_number" class="form-label">Meter Number</label>
                <input wire:model="meter_number" type="text" name="meter_number" class="form-control" id="meter_number">
            </div>

            <div class="col-4">
                <label for="type" class="form-label">Meter Type</label>
                <select wire:model="type" class="form-select" id="type" name="type" required>
                    <option value="">Select Type</option>
                    <option value="HHC">Home</option>
                    <option value="PD">Public</option>
                    <option value="ZN">Zonal</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

        </div>
    </div>
</div>