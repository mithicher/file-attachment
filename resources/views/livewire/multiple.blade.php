<div>
   
    <!-- Title -->
    <div>
        <x-label for="title" value="Title" />

        <x-input 
        	type="text"
        	id="title" 
        	class="block mt-1 w-full" 
        	wire:model="title"
        />

        <x-input-error for="title" class="mt-2" />
    </div>

    {{-- Send files in hidden field incase of regular blade form submit --}}   
    {{-- <input type="hidden" name="attachments" value="{{ collect($attachments)->map(fn($item) => $item->getFilename())->implode(',') }}"> --}}

    <!-- Multiple Attachments -->
    <div class="mt-4">
        <x-label for="attachments" value="Attachments" />

        <x-file-attachment 
        	:file="$attachments"
        	wire:model="attachments"
           	multiple
        />

        <x-input-error for="attachments" class="mt-2" />
    </div>

    <x-button class="mt-5" wire:click.prevent="save" type="button" wire:loading.attr="disabled"
    	wire:loading.class="cursor-not-allowed"
    >
        Save
    </x-button>
   
</div>
