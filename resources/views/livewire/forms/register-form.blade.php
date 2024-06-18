<div class="card-body">
    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
      <p class="text-center small">Enter your personal details to create account</p>
    </div>
    @if ($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form wire:submit.prevent="register" class="row g-3 needs-validation">
        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="first_name" name="first_name" type="text" class="form-control" id="first_name" placeholder="name@example.com" required>
              <label for="first_name">First Name</label>
              <div class="invalid-feedback">Please enter your first name!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="last_name" name="last_name" type="text" class="form-control" id="last_name" placeholder="name@example.com" required>
              <label for="last_name">Last Name</label>
              <div class="invalid-feedback">Please enter your last name!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="mobile" name="phone" type="mobile" class="form-control" id="mobile" placeholder="07.." required>
              <label for="mobile">Mobile</label>
              <div class="invalid-feedback">Please enter your mobile!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="email" name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
              <label for="email">Email address</label>
              <div class="invalid-feedback">Please enter your email!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
                <select class="form-select" id="region" name="region" wire:model="region" wire:change="update_region($event.target.value)">
                    <option value="">Select Region</option>
                    @foreach ($regions as $reg)
                        <option value="{{ $reg['name'] }}">{{ $reg['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <select wire:model="district" class="form-select" name="district" id="district" aria-label="Floating label select example">
                    <option selected>Select district</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district['name'] }}">{{ $district['name'] }}</h3>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="cbwso" name="cbwso" type="text" class="form-control" id="text" placeholder="name@example.com">
              <label for="cbwso">cbwso</label>
              <div class="invalid-feedback">Please enter your cbwso!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating mb-3">
              <input wire:model="password" name="password" type="password" class="form-control" id="password" placeholder="name@example.com" required>
              <label for="password">Password</label>
              <div class="invalid-feedback">Please enter your password!</div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input wire:model="check" name="check" class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                <div class="invalid-feedback">You must agree before submitting.</div>
            </div>
        </div>
        <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
    </form>  
    {{-- @foreach ($regions as $region)
        <h3>{{ $region['name'] }}</h3>
        <ul>
            @foreach ($region['districts'] as $district)
                <li>{{ $district['name'] }} </li>
            @endforeach
        </ul>
    @endforeach --}}
</div>