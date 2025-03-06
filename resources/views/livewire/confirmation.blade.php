<div class="card shadow-sm">
    <div class="card-header">
        <h4>Confirmation</h4>
    </div>
    <div class="card-body">
        <h5>Personal Information</h5>
        <p><strong>Name:</strong> {{ $onboardingData['name'] ?? '' }}</p>
        <p><strong>Email:</strong> {{ $onboardingData['email'] ?? '' }}</p>
        <p><strong>Phone:</strong> {{ $onboardingData['phone'] ?? '' }}</p>
        <p><strong>Subscription:</strong> {{ $onboardingData['subscription_type'] ?? '' }}</p>

        <h5>Address Information</h5>
        <p><strong>Address:</strong> {{ $onboardingData['address_line1'] ?? '' }} {{ $onboardingData['address_line2'] ?? '' }}</p>
        <p><strong>City:</strong> {{ $onboardingData['city'] ?? '' }}</p>
        <p><strong>Postal Code:</strong> {{ $onboardingData['postal_code'] ?? '' }}</p>
        <p><strong>State:</strong> {{ $onboardingData['state'] ?? '' }}</p>
        <p><strong>Country:</strong> {{ $onboardingData['country'] ?? '' }}</p>

        @if(isset($onboardingData['subscription_type']) && $onboardingData['subscription_type'] === 'Premium')
            <h5>Payment Information</h5>
            <p><strong>Card Number:</strong> **** **** **** {{ substr($onboardingData['card_number'] ?? '', -4) }}</p>
            <p><strong>Expiration Date:</strong> {{ $onboardingData['expiration_date'] ?? '' }}</p>
        @endif

        <div class="d-flex justify-content-between mt-4">
            <button wire:click="backStep" class="btn btn-secondary">Back</button>
            {{-- <button wire:click="$dispatch('submit')" class="btn btn-success">Submit</button> --}}
        </div>
    </div>
</div>
