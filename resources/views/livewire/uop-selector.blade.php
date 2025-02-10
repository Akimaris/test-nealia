<div>
    <select wire:model.change="selectedUop" class="border rounded p-2">
        @foreach($uops as $uop)
            <option value="{{ $uop->id }}">{{ $uop->name }}</option>
        @endforeach
    </select>
</div>
