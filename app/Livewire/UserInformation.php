<?php

namespace App\Livewire;

use Livewire\Component;

class UserInformation extends Component
{
    public $name, $email, $phone, $subscriptionType;

    protected $listeners = ['formReset' => 'resetFields'];

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subscriptionType = '';
    }

    // Receive data from parent component
    public function mount($userData = [])
    {
        $this->name = $userData['name'] ?? '';
        $this->email = $userData['email'] ?? '';
        $this->phone = $userData['phone'] ?? '';
        $this->subscriptionType = $userData['subscription_type'] ?? '';
    }

    protected $rules = [
        'name'             => 'required|string',
        'email'            => 'required|email|unique:users,email',
        'phone'            => 'required|digits_between:10,15',
        'subscriptionType' => 'required|in:Free,Premium',
    ];

    public function nextStep()
    {
        $this->validate();
        $this->dispatch('stepUpdated', [
            'name'             => $this->name,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'subscription_type' => $this->subscriptionType,
        ]);
    }

    public function render()
    {
        return view('livewire.user-information');
    }
}
