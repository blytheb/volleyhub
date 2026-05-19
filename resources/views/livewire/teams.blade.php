<div>
    <form  wire:submit="save">
        <div class="mb-4 p-4 border rounded text-center space-y-4">
            <h2 class="text-lg font-bold">Create New Team</h2>
            <div>
                <label for="name">Team Name:</label>
                <input type="text" wire:model="name" placeholder="Team Name">
                <div class="text-red-500">
                    @error('name')
                    <span> {{ $message}}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="division">Division:</label>
                <input type="text" wire:model="division" placeholder="Division">
                <div class="text-red-500">
                    @error('division')
                    <span> {{ $message}}</span>
                    @enderror
                </div>

            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold nt-2 py-2 px-4 rounded" type="submit">Save Team</button>

        </div>
    </form>

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
                            <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
                            <a href="#" class="font-medium text-fg-brand hover:underline">Delete</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
