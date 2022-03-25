@props([
    'header',
])
<div class="max-w-3xl mx-auto lg:max-w-7xl px-2 sm:px-0">
    <div class="space-y-6">
        <!-- Description list-->
        <section aria-labelledby="applicant-information-title">
            <div class="bg-white shadow sm:rounded-lg">
                @if (isset($header) && $header != null )
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        {{ $header }}
                    </div>
                @endif

                <div class="p-4">
                    {{ $slot }}
                </div>
            </div>
        </section>
    </div>
</div>
