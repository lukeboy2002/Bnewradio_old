<x-links.main href="{{route ('home') }}" :active="request()->routeIs('home')">Home</x-menu.link.main>

{{--<x-links.main href="{{route ('post') }}" :active="request()->routeIs('post*')">Blog</x-links.main>--}}
{{--<x-links.main href="{{route ('tweet') }}" :active="request()->routeIs('tweet*')">Btweet</x-links.main>--}}

<x-links.main href="#">Blog</x-links.main>
<x-links.main href="#">Btweet</x-links.main>
<x-links.main href="#">Pages</x-links.main>
<x-links.main href="#">Program</x-links.main>
<x-links.main href="#">Contact</x-links.main>



