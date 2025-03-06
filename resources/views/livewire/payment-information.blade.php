<div class="card shadow-sm">
    <div class="card-header">
        <h4>Payment Information</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="card_number" class="form-label">Credit Card Number</label>
            <input wire:model="card_number" type="text" id="card_number" class="form-control" placeholder="Enter credit card number">
            @error('card_number') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="expiration_date" class="form-label">Expiration Date (MM/YY)</label>
            <input wire:model="expiration_date" type="text" id="expiration_date" class="form-control" placeholder="MM/YY">
            @error('expiration_date') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input wire:model="cvv" type="text" id="cvv" class="form-control" placeholder="Enter CVV">
            @error('cvv') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-between">
            <button wire:click="backStep" class="btn btn-secondary">Back</button>
            <button wire:click="nextStep" class="btn btn-primary">Next</button>
        </div>
    </div>
</div>
