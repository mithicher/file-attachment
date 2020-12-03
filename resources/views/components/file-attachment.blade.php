@props([
	'file' => null,
	'accept' => 'image/jpg,image/jpeg,image/png,application/pdf',
	'multiple' => false,
	'mode' => 'attachment',
])
<div>
	@if(! $file || $mode === 'profile')
		@php $randomId = Str::random(6); @endphp
		<label for="file-{{ $randomId }}" class="relative block mt-1 leading-tight bg-transparent bg-gray-100 hover:bg-gray-200 hover:border-gray-300 shadow-sm cursor-pointer inline-flex items-center transition duration-500 ease-in-out group overflow-hidden
			x-data
			{{ 	
				$mode === 'profile' 
					? 'border w-20 h-20 rounded-full' 
					: 'border-2 w-full pl-3 pr-4 py-2 rounded-lg border-dashed' 
			}}
		">
			<input 
				type="file" 
				id="file-{{ $randomId }}" 
				name="{{ $attributes->wire('model')->value }}" 
				{{ $attributes->wire('model') }}
				class="absolute inset-0 cursor-pointer opacity-0"
				accept="{{ $accept }}"

				@if($multiple)
					multiple
				@endif
				wire:loading.attr="disabled"
	
				x-ref="input"
				x-on:change="$refs.input.click()"
				x-on:dragover="$el.classList.add('border-gray-300', 'bg-gray-200')" 
               	x-on:dragleave="$el.classList.remove('border-gray-300', 'bg-gray-200')" 
               	x-on:drop="$el.classList.remove('border-gray-300', 'bg-gray-200')"
			/>

			<div wire:loading.flex wire:target="{{ $attributes->wire('model')->value }}" wire:loading.class="w-full">
				<div class="select-none text-sm text-indigo-500 flex flex-1 items-center space-x-2 justify-center p-4">
					<svg class="animate-spin h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
				        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
				    </svg>

				    @if ($mode === 'attachment')
				    	<span>Uploading...</span>
				    @endif
				</div>
			</div>

			{{-- Preview for mode 'profile' --}}
			@if ($mode === 'profile' && $file)
				<div class="absolute inset-0 rounded-full">
					@if(collect(['jpg', 'png', 'jpeg', 'webp'])->contains($file->getClientOriginalExtension()))
						<div class="relative pb-20 w-full overflow-hidden rounded-full">
							<img src="{{ $file->temporaryUrl() }}" class="w-full h-full absolute object-cover rounded-full">
						</div>
					@else
						<div class="w-16 h-16 bg-gray-100 text-blue-500 flex items-center justify-center rounded-full">
							<svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
							</svg>
						</div>
					@endif
				</div>
			@endif

			<div class="flex items-center justify-center flex-1 p-4" wire:loading.class="hidden">
				@if($slot->isEmpty())
					@if($multiple)
						<svg class="-mr-5 -mt-2 transform -rotate-6 h-8 w-8 text-gray-200 group-hover:text-indigo-300 transition duration-500 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><g><circle cx="99.99951" cy="92" r="12"></circle><path d="M208.00049,31.99963h-160a16.01833,16.01833,0,0,0-16,16V175.97369l-.001.0307.001,31.99524a16.01833,16.01833,0,0,0,16,16h160a16.01833,16.01833,0,0,0,16-16v-160A16.01834,16.01834,0,0,0,208.00049,31.99963Zm-28.68653,80a16.019,16.019,0,0,0-22.62792,0l-44.68555,44.68653L91.314,135.99963a16.02161,16.02161,0,0,0-22.62792,0L48.00049,156.68457V47.99963h160l.00586,92.6922Z"></path></g></svg>
						<svg class="transition duration-500 ease-in-out relative h-8 w-8 transform rotate-3 text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M168.001,100.00017v.00341a12.00175,12.00175,0,1,1,0-.00341ZM232,56V200a16.01835,16.01835,0,0,1-16,16H40a16.01835,16.01835,0,0,1-16-16V56A16.01835,16.01835,0,0,1,40,40H216A16.01835,16.01835,0,0,1,232,56Zm-15.9917,108.6936L216,56H40v92.68575L76.68652,112.0002a16.01892,16.01892,0,0,1,22.62793,0L144.001,156.68685l20.68554-20.68658a16.01891,16.01891,0,0,1,22.62793,0Z"></path></svg>
					@else
						<svg class="h-8 w-8 text-gray-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M168.001,100.00017v.00341a12.00175,12.00175,0,1,1,0-.00341ZM232,56V200a16.01835,16.01835,0,0,1-16,16H40a16.01835,16.01835,0,0,1-16-16V56A16.01835,16.01835,0,0,1,40,40H216A16.01835,16.01835,0,0,1,232,56Zm-15.9917,108.6936L216,56H40v92.68575L76.68652,112.0002a16.01892,16.01892,0,0,1,22.62793,0L144.001,156.68685l20.68554-20.68658a16.01891,16.01891,0,0,1,22.62793,0Z"></path></svg>
					@endif

					@if ($mode === 'attachment')
						<span class="ml-2 text-gray-600">{{ is_array($file) ? 'Click or drag files' : 'Click or drag file' }} | <span class="text-sm">PNG or JPEG</span></span>
					@endif
				@else
					{{ $slot }}
				@endif
			</div>
		</label>
	@endif

	@if ($mode === 'attachment')
		{{-- Loading indicator for file remove --}}
		<div wire:loading.delay wire:loading.flex wire:target="removeUpload" wire:loading.class="w-full">
			<div class="text-sm text-red-500 bg-red-100 flex-1 p-1 text-center rounded">
				Removing file...
			</div>
		</div>	 
				
		{{-- Preview for mode 'attachment' --}}	
		<div>
			@if(is_array($file) && count($file) > 0)
				@foreach($file as $key => $f)
					<div class="py-3 flex {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
						<div class="w-16 mr-4 flex-shrink-0 shadow-xs rounded-lg">
							@if(collect(['jpg', 'png', 'jpeg', 'webp'])->contains($f->getClientOriginalExtension()))
								<div class="relative pb-16 overflow-hidden rounded-lg border border-gray-100">
									<img src="{{ $f->temporaryUrl() }}" class="w-full h-full absolute object-cover rounded-lg">
								</div>
							@else
								<div class="w-16 h-16 bg-gray-100 text-blue-500 flex items-center justify-center rounded-lg border border-gray-100">
									<svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
									</svg>
								</div>
							@endif
						</div>
						<div>
							@if ($multiple)
								{{-- prints attachment.* --}}
								@error($attributes->wire('model')->value . '.'. $key)
									<p class="text-sm text-red-600" class="mb-2">{{ $message }}</p>
								@enderror
							@endif

							<div class="text-sm font-medium truncate w-40 md:w-auto">{{ $f->getClientOriginalName() }}</div>
							<div class="flex items-center space-x-1">
								<div class="text-xs text-gray-500">{{ Str::bytesToHuman($f->getSize()) }}</div>
								<div class="text-gray-400 text-xs">&bull;</div>
								<div class="text-xs text-gray-500 uppercase">{{ $f->getClientOriginalExtension() }}</div>
							</div>

							<button 
								wire:key="remove-attachment-{{ $loop->index }}"
								wire:loading.attr="disabled" type="button" wire:click.prevent="removeUpload('{{ $attributes->wire('model')->value }}', '{{ $f->getFilename() }}')" class="text-xs text-red-500 appearance-none hover:underline">
								Remove
							</button>
						</div>
					</div>
				@endforeach
			@else
				@if($file)
					<div class="mt-3 flex">
						<div class="w-16 mr-4 flex-shrink-0 shadow-xs rounded-lg">
							@if(collect(['jpg', 'png', 'jpeg', 'webp'])->contains($file->getClientOriginalExtension()))
								<div class="relative pb-16 w-full overflow-hidden rounded-lg border border-gray-100">
									<img src="{{ $file->temporaryUrl() }}" class="w-full h-full absolute object-cover rounded-lg">
								</div>
							@else
								<div class="w-16 h-16 bg-gray-100 text-blue-500 flex items-center justify-center rounded-lg border border-gray-100">
									<svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
									</svg>
								</div>
							@endif
						</div>
						<div>

							@error($attributes->wire('model')->value)
								<p class="text-sm text-red-600" class="mb-2">{{ $message }}</p>
							@enderror
							 
							<div class="text-sm font-medium truncate w-40 md:w-auto">{{ $file->getClientOriginalName() }}</div>
							<div class="flex items-center space-x-1">
								<div class="text-xs text-gray-500">{{ Str::bytesToHuman($file->getSize()) }}</div>
								<div class="text-gray-400 text-xs">&bull;</div>
								<div class="text-xs text-gray-500 uppercase">{{ $file->getClientOriginalExtension() }}</div>
							</div>
							<button type="button" wire:click.prevent="removeUpload('{{ $attributes->wire('model')->value }}', '{{ $file->getFilename() }}')" class="text-xs text-red-500 appearance-none hover:underline">
								Remove
							</button>
						</div>
					</div>
				@endif
			@endif
		</div>
	@endif		 
</div>
