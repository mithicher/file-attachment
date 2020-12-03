<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Multiple extends Component
{
	use WithFileUploads;

	public $title;
	public $attachments = [];

	public function updatedAttachments()
    {
        $this->validate([
        	'attachments' => ['required'],
            'attachments.*' => ['required', 'mimes:jpeg,jpg,png', 'max:1024'],
        ], [], ['attachments.*' => 'attachments']);
    }

	public function save() 
	{
		$this->validate([
			'title' => ['required'],
			'attachments' => ['required'],
			'attachments.*' => ['required', 'mimes:jpeg,jpg,png', 'max:1024'],
		], [], ['attachments.*' => 'attachments']);
	}

    public function render()
    {
        return view('livewire.multiple');
    }
}
