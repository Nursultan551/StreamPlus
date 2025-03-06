<div class="card shadow-sm">
    <div class="card-header">
        <h4>User Information</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input wire:model="name" type="text" id="name" class="form-control" placeholder="Enter your name">
            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input wire:model="email" type="email" id="email" class="form-control" placeholder="Enter your email">
            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input wire:model="phone" type="text" id="phone" class="form-control" placeholder="Enter your phone number">
            @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="subscriptionType" class="form-label">Subscription Type</label>
            <select wire:model="subscriptionType" id="subscriptionType" class="form-select">
                <option value="">Select Subscription Type</option>
                <option value="Free">Free</option>
                <option value="Premium">Premium</option>
            </select>
            @error('subscriptionType') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-end">
            <button wire:click="nextStep" class="btn btn-primary">Next</button>
        </div>
    </div>
</div>
