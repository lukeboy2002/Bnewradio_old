<x-user-layout>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                @can('addUser')
                    <div class="flex justify-end pb-4">
                        <x-button.link href="{{ route('admin.users.create') }}" class="text-white bg-red-700 hover:bg-red-900 focus:ring-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2a6 6 0 0 1 6 6H2a6 6 0 0 1 6-6zm8-4a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1V7z"/>
                            </svg>
                            Add User
                        </x-button.link>
                    </div>
                @endcan
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Avatar</span>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{$user->avatar}}" alt="users {{$user->name}} avatar">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('explore.show', $user) }}">{{$user->username}}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->roles()->pluck('name')->implode(' ') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end items-center">
                                        @can('editUser')
                                            <x-button.link href="{{ route('admin.users.edit', $user->id) }}" class="mr-2 text-white bg-blue-700 hover:bg-blue-900 focus:ring-blue-700">Edit</x-button.link>
                                        @endcan
                                        @can('deleteUser')
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-button.small>Delete</x-button.small>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="divide-y divide-gray-200">
        <div class="mt-2 py-4 px-4 sm:px-6">
            {{ $users->links() }}
        </div>
    </div>
</x-user-layout>

