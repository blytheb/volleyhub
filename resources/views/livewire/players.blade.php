<div>
    <form wire:submit="save">
        <input type="text" wire:model="name" placeholder="Player Name">

        <input type="text" wire:model="position" placeholder="Position">

        <select wire:model="team_id">
            <option value="">Select Team</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>

        <button type="submit">Save Player</button>
    </form></div>
