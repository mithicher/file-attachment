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
  :file="$avatar"
  wire:model="avatar"
  model="profile"
/>
```

## For Blade Form Submit

```php
// For single image upload
<input 
	type="hidden" 
	name="attachment" 
	value="{{ $attachment->getFilename() }}"
/>
```

```php
// For multiple image uploads
<input 
	type="hidden" 
	name="attachments" 
	value="{{ collect($attachments)->map(fn($item) => $item->getFilename())->implode(',') }}"
/>
```

> **Note:** You have to manually upload to your desired destination after receiving the image file in your controller.

Sample Controller code is given below:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Multiple extends Controller
{
    public function save(Request $request)
    {
    	$this->validate([
			'title' => ['required'],
			'attachments' => ['required'],
			'attachments.*' => ['required', 'mimes:jpeg,jpg,png', 'max:1024'],
		], [], ['attachments.*' => 'attachments']);

    	// Received images: image1.jpg,image2.jpg,image3.jpg
    	// convert to array the received images
    	$attachments = explode(',', $request->attachments);

    	// Store attachment to your desired destination 
		$filenames = collect($attachments)->map(
			fn($attachment) => $this->createFileObject($attachment)->store('photos')
		);
		 
		SomeModel::create([
			'title' => $request->title,
			'attachments' => $filenames->implode(',') // saving the comma-separated names of the new destinations
		]);
    }

    private function createFileObject($imagePath)
    {
        if (Storage::disk('public')->exists($imagePath)) {
            $path = Storage::disk('public')->path($imagePath);
           
            $originalName = File::basename($path);
            $mimeType = File::mimeType($path);

            $file = new UploadedFile(
                $path,
                $originalName,
                $mimeType,
                true,
                true
            );
      
            return $file;
        } else {
            return null;
        }
    }
}
```
> **Note:** I have not tested this exact code by the way. This is just a example code so that one can get the idea.

## References

- [https://laravel-news.com/livewire-file-upload](https://laravel-news.com/livewire-file-upload)
- [https://laravel-livewire.com/docs/2.x/file-uploads](https://laravel-livewire.com/docs/2.x/file-uploads)
