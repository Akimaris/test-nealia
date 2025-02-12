<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chicken') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl">Chickens for Selected UOP</h2>
            <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create New Chicken
            </button>
        </div>


        <div class="relative overflow-x-auto  rounded-xl border border-gray-300 shadow-xl">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($chickens as $chicken)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $chicken->name }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="edit({{ $chicken->id }})" class="text-green-500">Edit</button>
                            <button wire:confirm="Are you sure you want to delete this chicken?"
                                    wire:click="delete({{ $chicken->id }})" class="text-red-500 ml-2">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h3 class="text-lg mb-4">{{ $chickenId ? 'Edit' : 'Create' }} Chicken</h3>
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="border rounded p-2 w-full">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <div class="flex justify-end">
                        <button type="button" wire:click="$set('showModal', false)" class="mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
