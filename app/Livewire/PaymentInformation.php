<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentInformation extends Component
{
    public $card_number, $expiration_date, $cvv;

    protected $listeners = ['formReset' => 'resetFields'];

    public function resetFields()
    {
        $this->card_number = '';
        $this->expiration_date = '';
        $this->cvv = '';
    }

    public function mount($paymentData = [])
    {
        $this->card_number     = $paymentData['card_number'] ?? '';
        $this->expiration_date = $paymentData['expiration_date'] ?? '';
        $this->cvv             = $paymentData['cvv'] ?? '';
    }

    protected $rules = [
        'card_number'     => 'required|digits:16',
        'expiration_date' => 'required|date_format:m/y|after:today',
        'cvv'             => 'required|digits:3',
    ];

    public function nextStep()
    {
        $this->validate();
        $this->dispatch('stepUpdated', [
            'card_number'     => $this->card_number,
            'expiration_date' => $this->expiration_date,
            'cvv'             => $this->cvv,
        ]);
    }

    public function backStep()
    {
        $this->dispatch('goToStep', 2);
    }

    public function render()
    {
        return view('livewire.payment-information');
    }
}
