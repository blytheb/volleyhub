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

    public $showModal = false;

    public $teamId = null;

    public function save()
    {
        $this->validate();
        Team::updateOrCreate(
            ['id' => $this->teamId],
            [
                'name' => $this->name,
                'division' => $this->division,
            ]
        );

        $this->reset(['name', 'division', 'teamId', 'showModal']);
    }

    public function delete($id)
    {

        $team = Team::findOrFail($id);
        $team->delete();
        // session()->flash('message', 'Team deleted successfully.');
    }

    public function render()
    {
        return view('livewire.teams', [
            'teams' => Team::all(),
        ]);
    }

    public function openCreate()
    {
        $this->reset();
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $this->showModal = true;
        $team = Team::findOrFail($id);
        $this->teamId = $team->id;
        $this->name = $team->name;
        $this->division = $team->division;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset(['name', 'division', 'teamId', 'showModal']);
    }
}
