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

    <!-- Multiple Attachments -->
    <div class="mt-4">
        <x-label for="attachments" value="Attachments" class="mb-1" />

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
