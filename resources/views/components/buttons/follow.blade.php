@if( current_user()->following($user))
    <x-buttons.large class="bg-red-700">
        <i class="fa-solid fa-user-xmark mr-2"></i>Unfollow
    </x-buttons.large>
    @else
    <x-buttons.large class="bg-blue-600">
        <i class="fas fa-user-check mr-2"></i>Follow
    </x-buttons.large>
@endif


