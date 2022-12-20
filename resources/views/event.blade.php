@extends('partials.layout')

@section('content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/event-cover.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Event
    </h1>
  </div>
</header>

<article class="container px-5 mx-auto mt-10">
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10">
    @foreach ($data['events'] as $event)
      <div class="shadow shadow-tertiary h-full">
        <div class="flex flex-col h-full">
          <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $event->thumbnail }}" alt="{{ $event->title }}" />
          <div class="p-4 flex flex-col flex-grow-1">
            <h3 class="text-xl">
              {{ $event->title }}
            </h3>
            <div class="mt-3 text-gray flex-grow-1">
              <div class="flex items-center gap-4">
                <div class="i-mdi:map-marker-outline"></div>
                <p>{{ $event->location }}</p>
              </div>
            </div>
            <a href="{{ url()->route('event.show', [$event->slug]) }}" class="a-btn mt-5 ml-auto">
              Baca Selengkapnya
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <nav class="flex justify-center mt-10 text-2xl">
    {{ $data['events']->links() }}
  </nav>
</article>
@endsection