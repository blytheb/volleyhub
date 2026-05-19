<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Teams extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|string|max:255')]
    public $division;

    public function save()
    {
        $this->validate();
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
