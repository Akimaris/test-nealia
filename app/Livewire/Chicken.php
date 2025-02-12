<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use \App\Models\Chicken as ChickenModel;

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
        $this->chickens = ChickenModel::all();
    }

    public function index()
    {
        return view('livewire.chicken');
    }

    public function edit($id)
    {
        $farm = ChickenModel::findOrFail($id);
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
            $farm = ChickenModel::findOrFail($this->chickenId);
            $farm->update($validated);
        } else {
            ChickenModel::create([
                'name' => $validated['name'],
                'uop_id' => $this->uopId,
            ]);
        }
        $this->showModal = false;
        $this->loadChickens();
    }

    public function delete($chickenId)
    {
        $farm = ChickenModel::findOrFail($chickenId);
        $farm->delete();
        $this->loadChickens();
    }

    #[On('uop-selected')]
    public function onUopSelected()
    {
        $this->chickens = ChickenModel::all();
    }
}
