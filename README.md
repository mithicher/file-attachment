# Reusable File Input Component With Livewire

## Installation

```
composer install
```

```
npm install --legacy-peer-deps
```

```
npx mix
```

## Dependencies
- [Laravel](https://laravel.com/)
- [Laravel Livewire](https://laravel-livewire.com/)
- [AlpineJS](https://github.com/alpinejs/alpine/)

After installation is complete visit the url ```/example-one```.

## Livewire Component

```php
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
      'avatar' => [
        'required', 
        'mimes:jpeg,jpg,png', 
        'max:1024', 
        'dimensions:min_width=250,min_height=250'
      ],
    ]);
  }

	public function save() 
	{
		$this->validate([
			'name' => ['required'],
			'bio' => ['required'],
			'avatar' => ['required', 'mimes:jpeg,jpg,png', 'max:1024', 'dimensions:min_width=250,min_height=250'],
		]);

    // save ...
	}

  public function render()
  {
    return view('livewire.profile');
  }
}
```

## Blade Component Usage

```php
// For single file upload
<x-file-attachment 
  :file="$attachment"
  wire:model="attachment"
/>
```

```php
// For multiple file uploads
<x-file-attachment 
  :file="$attachments"
  wire:model="attachments"
  multiple
/>
```

```php
// For profile image upload
<x-file-attachment 
  wire:model="photo" 
  :file="$photo" 
  mode="profile" 
  profile-class="w-24 h-24 rounded-lg" 
  accept="image/jpg,image/jpeg,image/png"
/>
```

## References

- [https://laravel-news.com/livewire-file-upload](https://laravel-news.com/livewire-file-upload)
- [https://laravel-livewire.com/docs/2.x/file-uploads](https://laravel-livewire.com/docs/2.x/file-uploads)
