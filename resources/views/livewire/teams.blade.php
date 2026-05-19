<div>
    <form wire:submit="save">
        <input type="text" wire:model="name" placeholder="Team Name">

        <input type="text" wire:model="division" placeholder="Division">

        <button type="submit">Save Team</button>
    </form>

    <hr>

    @foreach($teams as $team)
        <div>
            {{ $team->name }}
        </div>
    @endforeach
</div>
