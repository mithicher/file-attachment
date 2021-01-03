<div>

    <!-- Avatar -->
    <div>
        <x-label for="avatar" value="Profile image" class="mb-1" />

        <x-file-attachment 
            :file="$avatar"
            wire:model="avatar"
            mode="profile"
        />

        <x-input-error for="avatar" class="mt-2" />
    </div>
   
    <!-- Title -->
    <div class="mt-4">
        <x-label for="name" value="Name" />

        <x-input 
        	type="text"
        	id="name" 
        	class="block mt-1 w-full" 
        	wire:model="name"
        />

        <x-input-error for="name" class="mt-2" />
    </div>

    <!-- Bio -->
    <div class="mt-4">
        <x-label for="bio" value="Bio" />

        <x-input 
            type="text"
            id="bio" 
            class="block mt-1 w-full" 
            wire:model="bio"
        />

        <x-input-error for="bio" class="mt-2" />
    </div>

 	
    <x-button class="mt-5" wire:click.prevent="save" type="button" wire:loading.attr="disabled"
    	wire:loading.class="cursor-not-allowed"
    >
        Save Profile Info
    </x-button>
   
</div>
