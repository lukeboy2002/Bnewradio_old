<x-user-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-3xl mx-auto">
            <!-- Content goes here -->

            <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <x-form.input name="name" value="{{ $permission->name }}"/>


                <x-button.small>Update</x-button.small>
            </form>

        </div>
    </div>
</x-user-layout>
