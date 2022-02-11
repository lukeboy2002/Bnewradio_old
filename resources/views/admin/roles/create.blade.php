<x-user-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">

            <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6">
                @csrf
                <x-form.input name="name" placeholder="name" required />

                <div class="flex space-x-2">
                    @foreach($permissions as $permission)
                        <div class="flex items-center h-5">
                            <input id="{{ $permission->id }}"
                                   name="permissions[]"
                                   value="{{ $permission->id }}"
                                   @isset($role)
                                   @if(in_array($permissions->id, $role->permissions()->pluck('id')->toArray())) checked @endif
                                   @endisset
                                   aria-describedby="permissions"
                                   type="checkbox"
                                   class="focus:ring-red-700 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="{{ $permission->name }}" class="font-medium text-gray-700">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <x-button.small>Register</x-button.small>
            </form>

        </div>
    </div>

</x-user-layout>
