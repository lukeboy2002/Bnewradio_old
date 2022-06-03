<div id="carouselExampleCaptions" class="hidden md:block carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden">
        @php $i = 1; @endphp

        @foreach($slides as $slide)
            <div class="carousel-item relative float-left w-full {{ $i == '1' ? 'active' : ''}}">
                @php $i++; @endphp
                <img
                    src="{{ asset('storage/'.$slide->image) }}"
                    class="block w-full h-128 object-center object-cover"
                    alt="$slide->title"
                />
                <div class="absolute carousel-caption h-full hidden md:block text-center">
                    <div class="flex flex-col h-full items-center justify-center">
                        <h5 class="text-4xl font-black">{{$slide->title}}</h5>
                        <p class="font-semibold">{{ $slide->subtitle }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button
        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
