<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class Chicken extends Component
{

    public $chickens = [];
    public $showModal = false;

    public $chickenId = '';
    public $name = '';
    public $uopId;

    public function mount()
    {
        $this->loadChickens();
    }

    public function loadChickens()
    {
        $this->chickens = \App\Models\Chicken::where('uop_id', session('selected_uop'))->get();
    }

    public function index()
    {
        return view('livewire.chicken');
    }

    public function edit($id)
    {
        $farm = \App\Models\Chicken::findOrFail($id);
        $this->chickenId = $id;
        $this->name = $farm->name;
        $this->showModal = true;
    }

    public function create()
    {
        $this->uopId = session('selected_uop');
        $this->name = '';
        $this->showModal = true;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
        ]);

        if ($this->chickenId) {
            $farm = \App\Models\Chicken::findOrFail($this->chickenId);
            $farm->update($validated);
        } else {
            \App\Models\Chicken::create([
                'name' => $validated['name'],
                'uop_id' => $this->uopId,
            ]);
        }


        $this->showModal = false;
        $this->loadChickens();
    }

    public function delete($chickenId)
    {
        $farm = \App\Models\Chicken::findOrFail($chickenId);
        $farm->delete();
        $this->loadChickens();
    }

    #[On('uop-selected')]
    public function onUopSelected()
    {
        $this->chickens = \App\Models\Chicken::where('uop_id', session('selected_uop'))->get();
    }
}
