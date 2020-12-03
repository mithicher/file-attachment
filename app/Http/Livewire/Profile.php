<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
	use WithFileUploads;

	public $name;
	public $bio;
	public $avatar;

	public function updatedAvatar()
    {
    	$this->validate([
            'avatar' => ['required', 'mimes:jpeg,jpg,png', 'max:1024', 'dimensions:min_width=250,min_height=250'],
        ]);
    }

	public function save() 
	{
		$this->validate([
			'name' => ['required'],
			'bio' => ['required'],
			'avatar' => ['required', 'mimes:jpeg,jpg,png', 'max:1024', 'dimensions:min_width=250,min_height=250'],
		]);
	}

    public function render()
    {
        return view('livewire.profile');
    }
}
