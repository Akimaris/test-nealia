<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class Farm extends Component
{
    public $farms = [];
   public $showModal = false;

   public $farmId = '';
   public $name = '';
   public $uopId;

   public function mount()
   {
       $this->loadFarms();
   }

   public function loadFarms()
   {
       $this->farms = \App\Models\Farm::where('uop_id', session('selected_uop'))->get();
   }

   public function index()
   {
       return view('livewire.farm');
   }

   public function edit($id)
   {
       $farm = \App\Models\Farm::findOrFail($id);
       $this->farmId = $id;
       $this->name = $farm->name;
       $this->showModal = true;
   }

   public function create()
   {
       $this->uopId = session('selected_uop');
       $this->showModal = true;
   }

   public function save()
   {
       $validated = $this->validate([
           'name' => 'required',
       ]);

       if ($this->farmId) {
           $farm = \App\Models\Farm::findOrFail($this->farmId);
           $farm->update($validated);
       } else {
           \App\Models\Farm::create([
               'name' => $validated['name'],
               'uop_id' => $this->uopId,
           ]);
       }


       $this->showModal = false;
       $this->loadFarms();
   }

   public function delete()
   {
       $farm = \App\Models\Farm::findOrFail($this->farmId);
       $farm->delete();
       $this->showModal = false;
       $this->loadFarms();
   }

   #[On('uop-selected')]
   public function onUopSelected()
   {
       $this->farms = \App\Models\Farm::where('uop_id', session('selected_uop'))->get();
   }
}
