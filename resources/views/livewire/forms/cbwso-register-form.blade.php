<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Register CBWSO</h5>
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
                <label for="name" class="form-label">CBWSO</label>
                <input wire:model="name" type="text" name="name" class="form-control" id="name">
            </div>

            <div class="col-md-12">
                <label for="tarrif" class="form-label">Tarrif (Cost per Unit)</label>
                <input wire:model="tarrif" value="1000" type="text" name="tarrif" class="form-control" id="tarrif">
            </div>

            <div class="col-12">
                <label for="comment" class="form-label">Comment</label>
                  <textarea wire:model="comment"  class="form-control" id="comment" style="height: 100px;"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

        </div>
    </div>
</div>