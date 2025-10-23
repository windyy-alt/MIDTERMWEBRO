update password:

<form method="POST" action="{{ route('profile.update.password') }}">
    @csrf
    @method('PATCH')

 
    <div class="mt-4">
        <label for="current_password" class="block font-medium text-sm text-gray-700">Current Password</label>
        <input id="current_password" type="password" name="current_password" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('current_password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    <div class="mt-4">
        <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
        <input id="password" type="password" name="password" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm New Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div class="mt-4">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Update Password
        </button>
    </div>
</form>