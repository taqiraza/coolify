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
        if ($this->storage) {
            $this->enabled = $this->storage->is_backup_enabled ?? false;
        }
    }

    public function toggleEnabled()
    {
        $this->enabled = ! $this->enabled;
        if ($this->storage) {
            $this->storage->is_backup_enabled = $this->enabled;
            $this->storage->save();
        }
    }

    public function backupNow()
    {
        if ($this->storage) {
            if (method_exists($this->storage, 'backup')) {
                $this->storage->backup();
                $this->dispatch('success', 'Volume backup triggered successfully.');
            } else {
                $this->dispatch('error', 'Volume backup method is not supported for this resource.');
            }
        }
    }

    public function save()
    {
        if ($this->storage) {
            $this->storage->is_backup_enabled = $this->enabled;
            $this->storage->save();
            session()->flash('message', 'Settings saved successfully.');
        }
    }

    public function render()
    {
        return view('livewire.project.shared.storages.volume-backups.general');
    }
}
