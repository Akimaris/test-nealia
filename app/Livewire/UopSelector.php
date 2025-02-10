<?php

namespace App\Livewire;

use App\Models\Uop;
use Livewire\Component;

class UopSelector extends Component
{
    public $selectedUop;
    public $uops;

    public function mount()
    {
        $this->uops = Uop::all();
        $this->selectedUop = session('selected_uop') ?? optional($this->uops->first())->id;
    }

    public function updatedSelectedUop($value)
    {
        session()->put('selected_uop', $value);
        $this->dispatch('uop-selected');
    }

    public function render()
    {
        return view('livewire.uop-selector');
    }
}
