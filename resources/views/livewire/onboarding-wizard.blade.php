<div class="container mt-4">
    @if($currentStep == 1)
        <livewire:user-information :userData="$onboardingData"/>
    @elseif($currentStep == 2)
        <livewire:address-information :addressData="$onboardingData"/>
    @elseif($currentStep == 3)
        @if($onboardingData['subscription_type'] === 'Premium')
            <livewire:payment-information :paymentData="$onboardingData" />
        @else
            <!-- Skip payment step for Free users -->
            @php $currentStep = 4; @endphp
        @endif
    @elseif($currentStep == 4)
        <livewire:confirmation :onboardingData="$onboardingData" />
        {{-- <button class="btn btn-success mt-3" wire:click="submit">Submit</button> --}}
    @endif

    <div class="mt-3 d-flex justify-content-between">
        <button wire:click="resetForm" class="btn btn-warning">Reset</button>
        @if($currentStep == 4)
            <button wire:click="submit" class="btn btn-success">Submit</button>
        @endif
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
