<div class="p-6">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($teams as $team)

                <div class="bg-white rounded-2xl shadow-sm border p-5">

                    {{-- HEADER --}}
                    <div class="flex justify-between items-start">

                        <div>

                            <h2 class="text-xl font-bold">
                                {{ $team->name }}
                            </h2>

                            <p class="text-gray-500">
                                {{ $team->division }}
                            </p>

                        </div>

                    </div>

                    {{-- PLAYER COUNT --}}
                    <div class="mt-4 text-sm text-gray-600">

                        Players:
                        {{ $team->players->count() }}

                    </div>

                    {{-- ACTIONS --}}
                    <div class="flex gap-2 mt-6">

                        <a
                            href="{{ route('teams.show', $team) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm"
                        >
                            View
                        </a>

                        <button
                            wire:click="openEdit({{ $team->id }})"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm"
                        >
                            Edit
                        </button>

                        <button
                            wire:click="openDelete({{ $team->id }})"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
                        >
                            Delete
                        </button>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-12 text-gray-500">

                    No teams found.

                </div>

            @endforelse

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


