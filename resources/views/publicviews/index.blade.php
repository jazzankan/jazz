<x-guest-layout>
    <div class="bg-blue-100 rounded-lg max-w-screen-xl m-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-3">
            <div id="tips" class="m-2.5 md:border-r md:border-dashed md:border-gray-400 md:col-span-3 order-2 md:order-1">
                <h1 class="mv-2 text-3xl text-center text-red-600" style="font-family: 'Gloria Hallelujah',cursive !important;">Tips</h1>
                <div class="grid place-items-center">
                        @foreach($tips as $tip)
                            <div class=" px-4 py-4 bg-gray-100 mt-5 w-5/6 rounded-md overflow-hidden shadow-lg">
                            <p class="font-bold">{{ $tip->headline }}</p>
                            <p>{{ $tip->body }}</p>
                            <p><a class="text-blue-800" href="{{ $tip->link }}" target="_blank">Mer info</a></p>
                            </div>
                        @endforeach
                </div>
            </div>
            <div id="spelningar" class="m-2.5 md:col-span-6 order-1 md:order-2">
                <h1 class="mv-2 mb-4 text-3xl text-center text-red-600" style="font-family: 'Gloria Hallelujah',cursive !important;">Spelningar</h1>
                <div>
                    @livewire('pub-eventsearch')
                </div>
            </div>
            <div id="länkar" class="m-2.5 md:border-l md:border-dashed md:border-gray-400 md:col-span-3 order-3">
                <h1 class=" mv-2 text-3xl text-center text-red-600" style="font-family: 'Gloria Hallelujah',cursive !important;">Länkar</h1>
                <ul class="mt-5 px-6">
                    <li class="mt-4"><a class="text-blue-800 text-lg" href="/about">Om denna sajt</a><br>Vad kan du
                        förvänta dig?
                    </li>
                    <li class="mt-4"><a class="text-blue-800 text-lg" href="/contact">Kontakta oss</a></li>
                    <li class="mt-4 text-sm">Externa:</li>
                    @foreach($links as $link)
                        <li class="mt-4"><a href="{{ $link->url }}" @if($link->external)target="_blank"
                                            @endif class="text-blue-800 @if($link->prio) text-lg @endif">{{ $link->linktext }}</a><br>{{ $link->comment }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>
