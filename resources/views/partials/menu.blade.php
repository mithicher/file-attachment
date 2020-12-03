<div class="flex space-x-4">
	<a class="py-2 text-gray-500 hover:underline {{ request()->is('example-one') ? 'text-blue-600 underline' : '' }}" href="{{ url('/example-one') }}">Example 1</a>
	<a class="py-2 text-gray-500 hover:underline {{ request()->is('example-two') ? 'text-blue-600 underline' : '' }}" href="{{ url('/example-two') }}">Example 2</a>
	<a class="py-2 text-gray-500 hover:underline {{ request()->is('example-three') ? 'text-blue-600 underline' : '' }}" href="{{ url('/example-three') }}">Example 3</a>
</div>
