<?php

namespace App\Livewire\Project\Shared\Storages\VolumeBackups;

use Livewire\Component;

class General extends Component
{
    public $storage;
    public $backup;
    public $enabled = false;

    public function mount()
    {
        // Initialization logic for volume backup settings
    }

    public function toggleEnabled()
    {
        $this->enabled = ! $this->enabled;
    }

    public function backupNow()
    {
        // Trigger immediate volume backup
        session()->flash('message', 'Backup triggered successfully.');
    }

    public function save()
    {
        session()->flash('message', 'Settings saved successfully.');
    }

    public function render()
    {
        return view('livewire.project.shared.storages.volume-backups.general');
    }
}
