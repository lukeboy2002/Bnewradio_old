<div>
    <x-loading />

    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="bg-gray-50 border border-gray-200 flex justify-between items-center py-3 px-6 mb-6 sm:rounded-lg">
            <div class="flex items-center text-red-700">
                <i class="fa-solid fa-blog mr-2"></i>
                <h3 class="text-md font-bold">Blog Management</h3>
            </div>

            <div>
                <x-links.default_btn href="{{ route('admin.posts.create') }}" class="bg-red-700"><i class="fa-solid fa-blog mr-2"></i>Add Post</x-links.default_btn>
            </div>
        </div>

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
{{--                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>--}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
{{--                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>--}}
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            <div class="text-sm font-medium text-gray-500">
                                <img src="{{ $post->image }}" class="h-14 w-14" alt="">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            <div class="text-sm font-medium text-gray-500">
                                <a href="/posts/{{ $post->slug }}">
                                    {{ substr($post->title, 0, 50).'...' }}
                                </a>
                            </div>
                        </td>
{{--                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">--}}
{{--                            {{ $post->category->name }}--}}
{{--                        </td>--}}
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            <div class="text-sm font-medium text-gray-500">
                                <a href="{{ route('explore.show', $post->user) }}">{{ $post->user->username }}</a>
                            </div>
                        </td>
{{--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                            @foreach ($post->user->roles as $role)--}}
{{--                                @if($role->id == 1)--}}
{{--                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">--}}
{{--                                {{ $role->name }}--}}
{{--                            </span>--}}
{{--                                @else--}}
{{--                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">--}}
{{--                                {{ $role->name }}--}}
{{--                            </span>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </td>--}}
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            @can ('edit', $post->user)
                                <x-links.default_btn href="{{ route('admin.posts.edit' , $post->id) }}" class="bg-gray-600">Edit</x-links.default_btn>
                            @endcan

                            @if(auth()->user()->can('deletePost'))
                                <x-buttons.default wire:click="deleteId({{ $post->id }})" class="bg-red-700">Delete</x-buttons.default>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-red-700">
                            There are no Posts yet
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="px-4 py-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="hidden" @if ($showModal) style="display:block" @endif aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <x-modal>
            <div class="sm:flex sm:items-start">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fa-solid fa-user-slash text-red-600"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete Permission</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 mb-3">
                                Make sure you want to do this.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-5 sm:mt-4 flex justify-end space-x-2">
                <x-buttons.default wire:click="close" class="bg-gray-500" data-dismiss="modal">Close</x-buttons.default>
                <x-buttons.default wire:click.prevent="delete()"  class="bg-red-700">Delete</x-buttons.default>
            </div>
        </x-modal>
    </div>
</div>



