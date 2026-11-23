<div>
    <section class="relative pb-0">
        <div class="absolute inset-0 bg-gradient-to-t from-[#018284] to-[#79d4d6]"></div>
        <div class="py-16 lg:py-28 text-center relative">
            <h2 class="text-white uppercase text-2xl font-bold tracking-wide lg:text-4xl">Welcome Message</h2>
        </div>
    </section>

    <section class="relative overflow-hidden py-16 sm:py-20 lg:py-28">
        <div class="mx-auto flex max-w-7xl flex-col gap-12 px-5 sm:px-8 lg:gap-20 lg:px-12">
            @foreach ($messages as $welcomeMessage)
            <div id="welcome-message-{{ $welcomeMessage->id }}"
                class="border border-[#79d4d6]/20 bg-white shadow-[0_18px_45px_rgba(3, 40, 69, 0.12)] rounded-md">
                <div class="relative p-7 sm:p-10 lg:col-span-6 lg:p-14">
                    <div class="absolute left-0 top-10 hidden h-20 w-1 bg-[#f6c945] lg:block"></div>
                    <p class="mb-5 text-xs font-bold uppercase tracking-[0.18em] text-[#018284]"> {{
                        $welcomeMessage->title
                        }}</p>
                    <div class="h-px w-14 bg-[#018284]"></div>
                    <div
                        class="welcome-message-copy mt-8 text-justify text-[15px] leading-8 sm:text-base sm:leading-8 text-slate-600">
                        {!! str($welcomeMessage->description)->markdown()->sanitizeHtml() !!}
                    </div>

                </div>

                @if ($welcomeMessage->name2 && $welcomeMessage->title2 && $welcomeMessage->name3 &&
                $welcomeMessage->title3)
                <div class="border-t border-white/20 p-7 grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
                    <div class="flex flex-col text-center md:text-start items-center gap-3">
                        <img src="{{ $welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : asset('assets/images/speaker.png') }}"
                            alt="{{ $welcomeMessage->name }}"
                            class="h-46 w-46 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-48 sm:w-48 rounded-2xl">
                        <div class="min-w-0 text-center">
                            {!! str($welcomeMessage->title)->markdown()->sanitizeHtml() !!}
                            <h3 class="mt-1 text-lg font-bold leading-tight sm:text-xl underline">{{
                                $welcomeMessage->name }}</h3>
                        </div>
                    </div>
                    <div class="flex flex-col text-center md:text-start items-center gap-3">
                        <img src="{{ $welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : asset('assets/images/speaker.png') }}"
                            alt="{{ $welcomeMessage->name2 }}"
                            class="h-46 w-46 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-48 sm:w-48 rounded-2xl">
                        <div class="min-w-0 text-center">
                            {!! str($welcomeMessage->title2)->markdown()->sanitizeHtml() !!}
                            <h3 class="mt-1 text-lg font-bold leading-tight sm:text-xl underline">{{
                                $welcomeMessage->name2 }}</h3>
                        </div>
                    </div>
                    <div class="flex flex-col text-center md:text-start items-center gap-3">
                        <img src="{{ $welcomeMessage->image3 ? asset('storage/' . $welcomeMessage->image3) : asset('assets/images/speaker.png') }}"
                            alt="{{ $welcomeMessage->name3 }}"
                            class="h-46 w-46 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-48 sm:w-48 rounded-2xl">
                        <div class="min-w-0 text-center">
                            {!! str($welcomeMessage->title3)->markdown()->sanitizeHtml() !!}
                            <h3 class="mt-1 text-lg font-bold leading-tight sm:text-xl underline">{{
                                $welcomeMessage->name3 }}</h3>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            {{-- <article id="welcome-message-{{ $welcomeMessage->id }}"
                class="grid overflow-hidden border border-[#018284]/20 bg-white shadow-[0_18px_45px_rgba(7,90,153,0.12)] lg:grid-cols-12">
                <div class="relative p-7 sm:p-10 lg:col-span-6 lg:p-14 {{ $loop->even ? 'lg:order-2' : '' }}">
                    <div class="absolute left-0 top-10 hidden h-20 w-1 bg-[#f6c945] lg:block"></div>
                    <p class="mb-5 text-xs font-bold uppercase tracking-[0.18em] text-[#018284]"> {{
                        $welcomeMessage->title }}</p>
                    <div class="h-px w-14 bg-[#79d4d6]"></div>
                    <div
                        class="welcome-message-copy mt-8 text-justify text-[15px] leading-8 text-slate-600 sm:text-base sm:leading-8">
                        {!! str($welcomeMessage->description)->markdown()->sanitizeHtml() !!}
                    </div>

                </div>

                <aside
                    class="relative overflow-hidden bg-[#79d4d6] text-white lg:col-span-6  {{ $loop->even ? 'lg:order-1' : '' }}">
                    <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(12, 221, 211, 0.55),transparent_58%)]">
                    </div>
                    <div class="relative flex h-full flex-col justify-center gap-8 ">

                        <div
                            class="flex flex-col text-center md:flex-row md:text-start items-center gap-5 relative z-10">
                            <img src="{{ $welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : asset('assets/images/speaker.png') }}"
                                alt="{{ $welcomeMessage->name }}" class="shrink-0 max-w-xs">
                            <div class="min-w-0 p-5">
                                <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title }}</p>
                                <h3 class="mt-2 text-xl font-bold leading-tight text-white sm:text-2xl">{{
                                    $welcomeMessage->name }}</h3>
                            </div>
                        </div>
                        <img src="{{ $welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : asset('assets/images/test.png') }}"
                            alt="Background Image" class="absolute w-full bottom-0 right-0 z-0">

                        @if ($welcomeMessage->name2 && $welcomeMessage->title2 && $welcomeMessage->name3 &&
                        $welcomeMessage->title3)
                        <div class="border-t border-white/20 pt-7 grid grid-cols-1 md:grid-cols-3 gap-1">
                            <div class="flex flex-col text-center md:text-start items-center gap-5">
                                <img src="{{ $welcomeMessage->image ? asset('storage/' . $welcomeMessage->image) : asset('assets/images/speaker.png') }}"
                                    alt="{{ $welcomeMessage->name }}"
                                    class="h-24 w-24 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-28 sm:w-28">
                                <div class="min-w-0">
                                    <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title }}</p>
                                    <h3 class="mt-1 text-lg font-bold leading-tight text-white sm:text-xl">{{
                                        $welcomeMessage->name }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-col text-center md:text-start items-center gap-5">
                                <img src="{{ $welcomeMessage->image2 ? asset('storage/' . $welcomeMessage->image2) : asset('assets/images/speaker.png') }}"
                                    alt="{{ $welcomeMessage->name2 }}"
                                    class="h-24 w-24 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-28 sm:w-28">
                                <div class="min-w-0">
                                    <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title2 }}</p>
                                    <h3 class="mt-1 text-lg font-bold leading-tight text-white sm:text-xl">{{
                                        $welcomeMessage->name2 }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-col text-center md:text-start items-center gap-5">
                                <img src="{{ $welcomeMessage->image3 ? asset('storage/' . $welcomeMessage->image3) : asset('assets/images/speaker.png') }}"
                                    alt="{{ $welcomeMessage->name3 }}"
                                    class="h-24 w-24 shrink-0 border-4 border-white/20 object-cover shadow-xl sm:h-28 sm:w-28">
                                <div class="min-w-0">
                                    <p class="text-sm leading-6 text-cyan-50">{{ $welcomeMessage->title3 }}</p>
                                    <h3 class="mt-1 text-lg font-bold leading-tight text-white sm:text-xl">{{
                                        $welcomeMessage->name3 }}</h3>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </aside>
            </article> --}}
            @endforeach
        </div>
    </section>

</div>