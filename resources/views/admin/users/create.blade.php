<x-user-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf
                <x-form.input name="username" placeholder="username" required />
                <x-form.input name="email" type="email" autocomplete="email" placeholder="email" required />

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

                <x-form.input name="password" type="password" autocomplete="current-password" placeholder="password" required />
                <x-form.input name="password_confirmation" type="password" autocomplete="new-password" placeholder="confirm password" required />
                <x-button.small>Register</x-button.small>
            </form>

        </div>
    </div>

</x-user-layout>
