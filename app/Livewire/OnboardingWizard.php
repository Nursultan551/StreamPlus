<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Address;
use App\Models\Payment;


class OnboardingWizard extends Component
{
    public $currentStep = 1;
    public $onboardingData = [];

    protected $listeners = [
        'stepUpdated' => 'handleStepUpdate',
        'goToStep'    => 'setStep',
    ];

    // When the component mounts, load any previously persisted data from the session.
    public function mount()
    {
        if (session()->has('onboardingData')) {
            $this->onboardingData = session('onboardingData');
        }
    }

    public function handleStepUpdate($data)
    {
        // Merge child data into the global state
        $this->onboardingData = array_merge($this->onboardingData, $data);

        // Persist the updated state to the session.
        session()->put('onboardingData', $this->onboardingData);

        // Determine next step based on subscription type
        if ($this->currentStep === 2 && isset($this->onboardingData['subscription_type']) && $this->onboardingData['subscription_type'] === 'Free') {
            $this->currentStep = 4; // Skip payment step for Free users
        } else {
            $this->currentStep++;
        }
    }

    public function setStep($step)
    {
        $this->currentStep = $step;
    }

    public function resetForm()
    {
        // Reset local properties
        $this->onboardingData = [];
        $this->currentStep = 1;

        // Clear persisted session data
        session()->forget('onboardingData');

        // Optionally, emit an event so that child components can reinitialize their properties
        $this->dispatch('formReset');
    }

    public function submit()
    {
        // Final validation can be added here if needed

        // Create the user record.
        $user = User::create([
            'name'              => $this->onboardingData['name'],
            'email'             => $this->onboardingData['email'],
            'phone'             => $this->onboardingData['phone'],
            'subscription_type' => $this->onboardingData['subscription_type'],
        ]);

        // Create the address record.
        Address::create([
            'user_id'        => $user->id,
            'address_line1'  => $this->onboardingData['address_line1'],
            'address_line2'  => $this->onboardingData['address_line2'] ?? null,
            'city'           => $this->onboardingData['city'],
            'postal_code'    => $this->onboardingData['postal_code'],
            'state'          => $this->onboardingData['state'],
            'country'        => $this->onboardingData['country'],
        ]);

        // For Premium subscriptions, create the payment record.
        if ($user->subscription_type === 'Premium') {
            Payment::create([
                'user_id'         => $user->id,
                'card_number'     => $this->onboardingData['card_number'],
                'expiration_date' => $this->onboardingData['expiration_date'],
                'cvv'             => $this->onboardingData['cvv'],
            ]);
        }
        session()->forget('onboardingData');
        session()->flash('message', 'Onboarding completed successfully.');
    }

    public function render()
    {
        return view('livewire.onboarding-wizard');
    }
}
