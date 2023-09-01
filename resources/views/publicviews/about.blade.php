<x-guest-layout>
    <div class="md:ml-60">
        <h2 class="text-2xl">{{ $aboutentry->aboutheading }}</h2>
        <div class="max-w-prose">
       {!! $aboutentry-> abouttext !!}
        </div>
        <p class="my-6"><a class="btn-blue" href="/">Tillbaka till startsidan</a></p>
    </div>
</x-guest-layout>
