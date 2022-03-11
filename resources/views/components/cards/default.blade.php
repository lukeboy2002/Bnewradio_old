@props([
    'heading',
])

<div class="min-h-full">
    <div class="max-w-3xl mx-auto lg:max-w-7xl">
        <div class="space-y-6">
            <!-- Description list-->
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        {{ $heading }}
                    </div>

                    <div class="border-t border-gray-200 px-4 pb-5 sm:px-6">
                        {{ $slot }}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

