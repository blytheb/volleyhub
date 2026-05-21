<div>
    <div>
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold nt-2 py-2 px-4 rounded" type="submit"
            wire:click="openCreate()"
            >Create New Player</button>

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
                            Team
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $player->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $player->position }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $player->team->name }}
                            </td>
                            <td class="px-6 py-4">
                                <button
                                    class="font-medium text-fg-brand hover:underline"
                                    wire:click="openEdit({{ $player->id }})"
                                >
                                    Edit
                                </button>
                                <button
                                    class="font-medium text-fg-brand hover:underline"
                                    wire:click="delete({{ $player->id }})"
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
        <x-team-modal wire:key="player-modal">
            <h2 class="text-xl font-bold mb-4">
                {{ $playerId ? 'Edit Player' : 'Create Player' }}
            </h2>

            <input wire:model="name" class="border p-2 w-full mb-2" placeholder="Player Name">
            <div class="text-red-500">
                @error('name')
                <span> {{ $message}}</span>
                @enderror
            </div>
            <input wire:model="position" class="border p-2 w-full mb-4" placeholder="Position">
            <div class="text-red-500">
                @error('position')
                <span> {{ $message}}</span>
                @enderror
            </div>
            <select wire:model="team_id" class="border p-2 w-full mb-4">
                <option value="">Select Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
            <div class="text-red-500">
                @error('team_id')
                <span> {{ $message}}</span>
                @enderror
            </div>

            <div class="flex gap-2">

                <button wire:click="save" class="bg-blue-500 text-white px-4 py-2">
                    Save
                </button>

                <button wire:click="closeModal" class="bg-gray-300 px-4 py-2">
                    Cancel
                </button>

            </div>
        </x-team-modal>

    @endif

</div>
