<div>
    <div>
        <h2 class="text-lg font-bold text-center">View All Teams</h2>
        <div wire:loading>
            Loading...
        </div>
        <div class="flex gap-4 mb-4">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Search by name..."
                class="border p-2 w-full"
            >
            <button
                class="bg-blue-500 hover:bg-blue-700 text-center text-white font-bold nt-2 py-2 px-4 rounded" type="submit"
                wire:click="openCreate()"
                >Create New Team
            </button>
        </div>
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-center rtl:text-right text-body">
                <thead class="bg-neutral-secondary-soft border-b border-default">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Team name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Division
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $team->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $team->division }}
                            </td>
                            <td class="px-6 py-4">
                                <button
                                    class="font-medium text-fg-brand hover:underline"
                                    wire:click="openEdit({{ $team->id }})"
                                >
                                    Edit
                                </button>
                                <button
                                    class="font-medium text-fg-brand hover:underline"
                                    wire:click="delete({{ $team->id }})"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if ($showModal)
        <x-form-modal>
            <h2 class="text-xl font-bold mb-4">
                {{ $teamId ? 'Edit Team' : 'Create Team' }}
            </h2>

            <input wire:model="name" class="border p-2 w-full mb-2" placeholder="Team Name">

            <input wire:model="division" class="border p-2 w-full mb-4" placeholder="Division">

            <div class="flex gap-2">

                <button wire:click="save" class="bg-blue-500 text-white px-4 py-2">
                    Save
                </button>

                <button wire:click="closeModal" class="bg-gray-300 px-4 py-2">
                    Cancel
                </button>

            </div>
        </x-form-modal>

    @endif


</div>


