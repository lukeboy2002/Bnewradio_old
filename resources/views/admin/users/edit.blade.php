<x-user-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">
            <!-- Content goes here -->

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <x-form.input name="username" readonly value="{{ $user->username }}"/>
        <x-form.input name="email" type="email" placeholder="email" readonly value="{{ $user->email }}"/>

        <div class="flex space-x-2">
            @foreach($roles as $role)
                <div class="flex items-center h-5">
                    <input id="{{ $role->id }}"
                           name="roles[]"
                           value="{{ $role->id }}"
                           @isset($user)
                               @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
                           @endisset
                           aria-describedby="role"
                           type="radio"
                           class="focus:ring-red-700 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                    >
                </div>
                <div class="ml-3 text-sm">
                    <label for="{{ $role->name }}" class="font-medium text-gray-700">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <x-button.small>Update</x-button.small>
    </form>

        </div>
    </div>
</x-user-layout>
