<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="mt-4">
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

 
    <div class="mt-4">
        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Update Information
        </button>
    </div>
</form>