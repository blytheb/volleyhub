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

    public $showModal = false;

    public $playerId = null;

    public function save()
    {
        $this->validate();
        Player::updateOrCreate(
            ['id' => $this->playerId],
            [
                'name' => $this->name,
                'position' => $this->position,
                'team_id' => $this->team_id,
            ]
        );

        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.players', [
            'teams' => Team::all(),
            'players' => Player::all(),
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
        $player = Player::findOrFail($id);
        $this->playerId = $player->id;
        $this->name = $player->name;
        $this->position = $player->position;
        $this->team_id = $player->team_id;
    }

    public function delete($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
    }

    public function closeModal()
    {
        $this->reset(['name', 'position', 'team_id', 'showModal', 'playerId']);
        $this->showModal = false;
    }

    public function resetForm()
    {
        $this->name = '';
        $this->position = '';
        $this->team_id = '';
        $this->playerId = null;
        $this->showModal = false;
    }
}
