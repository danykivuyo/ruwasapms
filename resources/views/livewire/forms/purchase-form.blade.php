<section class="section contact">

    <div class="row gy-4">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            <div class="card p-4">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('error') }}
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

                <form wire:submit.prevent="register" class="row g-3">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input wire:model="meter_id" type="text" name="meter_id" class="form-control"
                                wire:input="update_id($event.target.value)" placeholder="Meter ID" required>
                        </div>

                        <div class="col-md-6">
                            <input wire:model="user_id" type="text" class="form-control" name="user_id"
                                placeholder="User ID" required @if (!$tag_id_active) disabled @endif
                                required value="{{ $user_id }}" wire:input="update_tag_id($event.target.value)">
                        </div>

                        <div class="col-md-6">
                            <input wire:model="meter_number" type="text" class="form-control" name="meter_number"
                                placeholder="Meter Number" disabled value="{{ $meter_number }}">
                        </div>

                        <div class="col-md-6">
                            <input wire:model="balance" type="text" class="form-control" name="balance"
                                placeholder="Balance" disabled value="{{ $balance }}">
                        </div>

                        <div class="col-md-6">
                            <input wire:model="user_name" type="text" class="form-control" name="user_name"
                                placeholder="Name" disabled value="{{ $user_name }}">
                        </div>

                        <div class="col-md-6">
                            <input wire:model="cbwso" type="text" class="form-control" name="cbwso"
                                placeholder="CBWSO" disabled value="{{ $cbwso }}">
                        </div>
                        <div class="col-md-12">
                            <input wire:model="amount" type="text" class="form-control" name="amount"
                                placeholder="Amount" required value="{{ $amount }}">
                        </div>


                        {{-- <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your Purchase has been processed. Thank you!</div>

                            <button type="submit">Confirm Purchase</button>
                        </div> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        <div class="col-xl-3"></div>
    </div>

</section>
