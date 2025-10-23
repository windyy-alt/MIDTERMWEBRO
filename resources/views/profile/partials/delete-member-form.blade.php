<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')

    <div class="mt-4">
        <button type="submit" onclick="return confirm('Are you sure you want to delete your account?')"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Delete Account
        </button>
    </div>
</form>