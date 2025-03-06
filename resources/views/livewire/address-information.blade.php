<div class="card shadow-sm">
    <div class="card-header">
        <h4>Address Information</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="address_line1" class="form-label">Address Line 1</label>
            <input wire:model="address_line1" type="text" id="address_line1" class="form-control" placeholder="Enter address line 1">
            @error('address_line1') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="address_line2" class="form-label">Address Line 2 (Optional)</label>
            <input wire:model="address_line2" type="text" id="address_line2" class="form-control" placeholder="Enter address line 2">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input wire:model="city" type="text" id="city" class="form-control" placeholder="Enter your city">
            @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input wire:model="postal_code" type="text" id="postal_code" class="form-control" placeholder="Enter postal code">
            @error('postal_code') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State/Province</label>
            <input wire:model="state" type="text" id="state" class="form-control" placeholder="Enter state or province">
            @error('state') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select wire:model="country" id="country" class="form-select">
                <option value="">Select Country</option>
                <!-- Example static countries; consider populating this list dynamically -->
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">UK</option>
            </select>
            @error('country') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-between">
            <button wire:click="backStep" class="btn btn-secondary">Back</button>
            <button wire:click="nextStep" class="btn btn-primary">Next</button>
        </div>
    </div>
</div>
