<?php

namespace App\Livewire;

use App\Models\Player;
use App\Models\Team;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Players extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|max:255')]
    public $position;

    #[Validate('required|exists:teams,id')]
    public $team_id;

    public function save()
    {
        Player::create([
            'name' => $this->name,
            'position' => $this->position,
            'team_id' => $this->team_id,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.players', [
            'teams' => Team::all(),
        ]);
    }
}
