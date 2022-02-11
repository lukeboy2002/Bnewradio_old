<x-user-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">

            <form action="{{ route('admin.permissions.store') }}" method="POST" class="space-y-6">
                @csrf
                <x-form.input name="name" placeholder="name" required />

                <h3 class="text-xl font-bold text-red-700">Assign Permission to Roles</h3>
                <div class="flex space-x-2">
                @if(!$roles->isEmpty())
                    @foreach ($roles as $role)
                        <div class="flex items-center h-5">
                            <input id="{{ $role->id }}"
                                   name="roles[]"
                                   value="{{ $role->id }}"
                                   aria-describedby="roles"
                                   type="checkbox"
                                   class="focus:ring-red-700 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="{{ $role->name }}" class="font-medium text-gray-700">{{ $role->name }}</label>
                        </div>
                    @endforeach
                @endif
                </div>
                <x-button.small>Register</x-button.small>
            </form>

        </div>
    </div>

</x-user-layout>
