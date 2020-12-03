<x-guest-layout>
    <div class="py-12 min-h-screen bg-gray-100">
        <div class="max-w-2xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <h2 class="font-bold tracking-tight text-xl text-gray-800 leading-tight">
                    {{ __('Profile Image Upload Example') }}
                </h2>
                @include('partials.menu')
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg p-6">
            	<livewire:profile />
            </div>
        </div>
    </div>
</x-guest-layout>
