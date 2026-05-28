<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class TeamPage extends Component
{
    public Team $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.team-page', [
            'players' => $this->team->players,
        ]);
    }
}
