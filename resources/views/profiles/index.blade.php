<x-user-layout>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
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
                                Jobtitle
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Follow</span>
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
                                    {{$user->jobtitle}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @unless (current_user()->is($user))
                                        <form method="POST" action="/profiles/{{ $user->username }}/follow">
                                            @csrf
                                            <x-buttons.follow :user="$user" />
                                        </form>
                                    @endunless
                                </td>
                            </tr>
                        @endforeach

                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">--}}
    {{--        @foreach($users as $user)--}}
    {{--            <div class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200 hover:bg-gray-100">--}}
    {{--                <a href="{{ route('profile', $user) }}" class="m-0 p-0">--}}
    {{--                    <div class="w-full flex items-center justify-between p-6">--}}
    {{--                        <div class="flex-1 truncate">--}}
    {{--                            <div class="flex items-center space-x-3">--}}
    {{--                                <h3 class="text-gray-900 text-sm font-medium truncate">{{$user->username}}</h3>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{$user->avatar}}" alt="users {{$user->name}} avatar">--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
    <div class="divide-y divide-gray-200">
        <div class="mt-2 py-4 px-4 sm:px-6">
            {{ $users->links() }}
        </div>
    </div>

</x-user-layout>
