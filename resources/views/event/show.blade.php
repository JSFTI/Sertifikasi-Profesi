@extends('partials.layout')

@section('content')
<div class="container px-5 mx-auto flex flex-col lg:flex-row md:gap-5 xl:gap-20 mt-5">
  <article class="flex-grow-1">
    <h1 class="text-xl font-bold">{{ $data['event']->title }}</h1>
    <figure class="my-5 text-center">
      <img class="max-h-40vh inline" src="{{ $data['event']->thumbnail }}" alt="{{ $data['event']->title }}" />
    </figure>
    <section class="mb-5 event-meta">
      <div class="meta flex items-center gap-5">
        <div class="i-mdi:map-marker text-xl"></div>
        <p>{{ $data['event']->location }}</p>
      </div>
      <div class="meta flex gap-5">
        <div class="i-mdi:card-account-phone text-xl"></div>
        <div class="flex flex-col gap-1">
          @foreach ($data['event']->contactPersons as $contactPerson)
            <p>
              {{ $contactPerson->name }}<br />({{ $contactPerson->contact }})
            </p>
          @endforeach
        </div>
      </div>
      <div class="meta flex gap-5">
        <div class="i-mdi:calendar-alert text-xl"></div>
        <div class="flex flex-col gap-5">
          @foreach ($data['event']->schedules as $index => $schedule)
            <div>
              <strong>Session {{ $index + 1 }}</strong>
              <p>
                Start: {{ $schedule->start->isoFormat('DD MMM YYYY HH:mm:ss') }}<br />
                Finish: {{ $schedule->end->isoFormat('DD MMM YYYY HH:mm:ss') }}
              </p>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="content">
      {!! $data['event']->content !!}
    </section>
    <section class="flex gap-5 flex-wrap shadow shadow-tertiary rounded p-3">
      @if ($data['event']->attachments->count() > 0)
        @foreach ($data['event']->attachments as $attachment)
          <a
            href="{{ $attachment->url }}" target="_blank"
            class="ring shadow-secondary py-2 px-5 rounded-full hover:bg-secondary transition"
          >
            {{ $attachment->name }}
          </a>
        @endforeach
      @else
        <div class="text-center flex-grow font-bold text-xl">
          Tidak ada lampiran
        </div>
      @endif
    </section>
  </article>

  <aside class="w-full lg:w-125">
    <h4 class="text-2xl font-700 mb-5 mt-10 sm:mt-0">Event Lain</h4>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-5">
      @foreach ($data['others'] as $otherEvent)
        <div class="shadow shadow-tertiary">
          <div class="flex flex-col h-full">
            <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $otherEvent->thumbnail }}" alt="{{ $otherEvent->title }}" />
            <div class="p-4 flex flex-col flex-grow-1">
              <h3 class="text-xl">
                {{ $otherEvent->title }}
              </h3>
              <a href="{{ url()->route('article.show', [$otherEvent->slug]) }}" class="a-btn mt-5 ml-auto">
                Baca Selengkapnya
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </aside>
</div>
@endsection