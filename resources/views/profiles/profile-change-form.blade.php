<x-cards.default>
    <x-messages />

    <x-slot:header>
        <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
        <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
    </x-slot:header>

    <div class="grid grid-cols-12">
        <div class="col-span-9">
            <form wire:submit.prevent="updateProfile" class="space-y-6">
                <x-form.input type="text" name="username" id="state.username" wire:model="state.username" />

                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-6">
                        <x-form.input type="text" name="firstname" id="state.firstname" wire:model="state.firstname" />
                    </div>
                    <div class="col-span-6">
                        <x-form.input type="text" name="lastname" id="state.lastname" wire:model="state.lastname" />
                    </div>
                </div>

                <x-form.input type="email" name="email" id="state.email" wire:model="state.email" />

                <x-form.input type="text" name="jobtitle" id="state.jobtitle" wire:model="state.jobtitle" />

                <x-form.textarea name="bio" rows="3" wire:model="state.bio"></x-form.textarea>
                <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>

                <div class="w-full flex justify-end">
                    <x-buttons.default class="bg-red-700">Save</x-buttons.default>
                </div>
            </form>
        </div>

        <div class="col-span-3 flex justify-center">
            <form wire:submit.prevent="updatedAvatar" enctype="multipart/form-data">
                <div x-data="{ imagePreview: '{{asset('storage/'.current_user()->avatar)}} ' }">
                    <input type="file"
                           class="hidden"
                           wire:model="avatar"
                           x-ref="avatar"
                           x-on:change="
                            reader = new FileReader();
                            reader.onload = (event) => {
                                imagePreview = event.target.result;
                                document.getElementById('profileImage').src = `${imagePreview}`;
                            };
                            reader.readAsDataURL($refs.image.files[0]);
                       "
                    />
                    <div class="block relative rounded-full overflow-hidden">
                        <img class="h-20 w-20 rounded-full" x-bind:src="imagePreview" alt="User profile picture">
                        <label for="desktop-user-photo" class="absolute inset-0 rounded-full h-20 w-20 bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                            <span>Change</span>
                            <span class="sr-only"> user photo</span>
                            <input x-on:click="$refs.avatar.click()" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form wire:submit.prevent="updatedProfileImage" enctype="multipart/form-data" class="mt-6">
        <div x-data="{ imagePreview: '{{asset('storage/'.current_user()->profile_img)}} ' }">
            <input type="file"
                   class="hidden"
                   wire:model="profileimage"
                   x-ref="profileimage"
                   x-on:change="
                        reader = new FileReader();
                        reader.onload = (event) => {
                            imagePreview = event.target.result;
                            document.getElementById('profileImage').src = `${imagePreview}`;
                        };
                        reader.readAsDataURL($refs.image.files[0]);
                   "
            />
            <div class="block relative overflow-hidden">
                <img class="h-24 w-full" x-bind:src="imagePreview" alt="User profile picture">
                <label for="desktop-user-photo" class="absolute inset-0 h-24 w-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                    <span>Change</span>
                    <span class="sr-only"> user photo</span>
                    <input x-on:click="$refs.profileimage.click()" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                </label>
            </div>
        </div>
    </form>

</x-cards.default>
