<?php

namespace App\Livewire;

use Livewire\Component;

class Confirmation extends Component
{
    public $onboardingData;

    public function mount($onboardingData)
    {
        $this->onboardingData = $onboardingData;
    }

    public function backStep()
    {
        // Determine which step to go back to based on the subscription type
        $step = ($this->onboardingData['subscription_type'] === 'Premium') ? 3 : 2;
        $this->dispatch('goToStep', $step);
    }

    public function render()
    {
        return view('livewire.confirmation');
    }
}
