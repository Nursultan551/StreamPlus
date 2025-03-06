<?php

namespace App\Livewire;

use Livewire\Component;

class AddressInformation extends Component
{
    public $address_line1, $address_line2, $city, $postal_code, $state, $country;

    protected $listeners = ['formReset' => 'resetFields'];

    public function resetFields()
    {
        $this->address_line1 = '';
        $this->address_line2 = '';
        $this->city          = '';
        $this->postal_code   = '';
        $this->state         = '';
        $this->country       = '';
    }

    public function mount($addressData = [])
    {
        $this->address_line1 = $addressData['address_line1'] ?? '';
        $this->address_line2 = $addressData['address_line2'] ?? '';
        $this->city          = $addressData['city'] ?? '';
        $this->postal_code   = $addressData['postal_code'] ?? '';
        $this->state         = $addressData['state'] ?? '';
        $this->country       = $addressData['country'] ?? '';
    }

    protected $rules = [
        'address_line1' => 'required|string',
        'city'          => 'required|string',
        'postal_code'   => 'required|string',
        'state'         => 'required|string',
        'country'       => 'required|string',
    ];

    public function nextStep()
    {
        $this->validate();
        $this->dispatch('stepUpdated', [
            'address_line1' => $this->address_line1,
            'address_line2' => $this->address_line2,
            'city'          => $this->city,
            'postal_code'   => $this->postal_code,
            'state'         => $this->state,
            'country'       => $this->country,
        ]);
    }

    public function backStep()
    {
        $this->dispatch('goToStep', 1);
    }

    public function render()
    {
        return view('livewire.address-information');
    }
}
