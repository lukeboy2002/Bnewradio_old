{{--<div>--}}
{{--    <x-form.input type="text" name="title" id="title" wire:model="title" />--}}
{{--    <x-form.input type="text" name="subtitle" id="subtitle" wire:model="subtitle" />--}}

{{--    <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-red-700 focus-within:border-red-700">--}}
{{--        <div class="flex items-center">--}}
{{--            <input wire:model="status" name="status" type="checkbox" value=1 class="h-4 w-4 text-indigo-600 focus:ring-red-500 border-gray-300 rounded">--}}
{{--            <label for="status" class="ml-2 block text-sm text-gray-900">Active</label>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<form wire:submit.prevent="save" enctype="multipart/form-data" method="POST" class="space-y-6">
    @csrf
    @method('PATCH')

    <x-form.input wire:model="title" type="text" name="title" required />
    <x-form.input wire:model="subtitle" type="text" name="subtitle" required />
    <x-form.input wire:model="image" type="file" name="image" />
    <div wire:loading wire:target="image">
        <x-loading />
    </div>

    <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-red-700 focus-within:border-red-700">
        <div class="flex items-center">
            <input wire:model="status" name="status" type="checkbox" value=1 class="h-4 w-4 text-indigo-600 focus:ring-red-500 border-gray-300 rounded">
            <label for="status" class="ml-2 block text-sm text-gray-900">Active</label>
        </div>
    </div>

    <fieldset class="hidden md:block border border-gray-300 rounded-md px-3 py-2 shadow-sm ">
        <legend class="mt-1 text-sm text-gray-500">Preview</legend>
        <div class="carousel slide bg-gray-300 h-96">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="relative float-left w-full">
                    @if ($image)
                        <img src="{{$image->temporaryUrl()}}"
                             class="block w-full max-h-96 object-center object-cover"
                             alt="Preview"
                        >
                    @else
                        <img src="{{asset('storage/'.$slide->image)}}"
                             class="block w-full max-h-96 object-center object-cover"
                             alt="Preview"
                        >
                    @endif
                    <div class="absolute carousel-caption h-full hidden md:block text-center">
                        <div class="flex flex-col h-full items-center justify-center">
                            <h5 class="text-4xl font-black">{{$title}}</h5>
                            <p class="font-semibold">{{ $subtitle }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="flex justify-end space-x-2">
        <x-buttons.large type="button" onclick="history.back()" class="bg-gray-400">Cancel</x-buttons.large>
        <x-buttons.large class="bg-red-700">Save</x-buttons.large>
    </div>
</form>
