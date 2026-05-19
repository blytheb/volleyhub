<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class Teams extends Component
{
    public $name;

    public $division;

    public function save()
    {
        Team::create([
            'name' => $this->name,
            'division' => $this->division,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.teams', [
            'teams' => Team::all(),
        ]);
    }
}
