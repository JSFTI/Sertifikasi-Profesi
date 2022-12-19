@extends('index')

@section('index-content')
<header class="main-hero h-70vh mb-10" style="--bg: url({{ asset('assets/img/hero-1.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto">
      CLUB MOTOR MEDAN
    </h1>
    <p class="mb-10 mt-5 text-left lg:w-2/3 xl:w-1/2">
      Selamat datang ke situs kami. Kami adalah kumpulan pemotor yang sangat
      antusias dengan motor di Medan. Jika Anda memiliki antusiasme yang tinggi
      dengan sepeda motor dan ingin memiliki suatu perkumpulan dengan orang-orang
      yang memiliki ketertarikan yang sama dengan Anda, Anda cocok untuk bergabung
      dengan CLUB MOTOR MEDAN.
    </p>
  </div>
</header>
<article class="px-5">
  <section class="container mx-auto">
    <h2 class="text-center text-3xl font-bold">
      <span class="underline-pseudo">Event</span>
    </h2>
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mt-10">
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
              <a href="{{ url()->route('event', [$event->slug]) }}" class="a-btn mt-5 ml-auto">
                Baca Selengkapnya
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  
  <section class="container mx-auto mt-10">
    <h2 class="text-center text-3xl font-bold">
      <span class="underline-pseudo">Artikel</span>
    </h2>
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mt-10">
      @foreach ($data['articles'] as $article)
        <div class="shadow shadow-tertiary h-full">
          <div class="flex flex-col h-full">
            <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $article->thumbnail }}" alt="{{ $article->title }}" />
            <div class="p-4 flex flex-col flex-grow-1">
              <h3 class="text-xl">
                {{ $article->title }}
              </h3>
              <p class="mt-3 text-gray flex-grow-1">
                {{ Str::limit(strip_tags($article->content), 100, '...') }}
              </p>
              <a href="{{ url()->route('article', [$article->slug]) }}" class="a-btn mt-5 ml-auto">
                Baca Selengkapnya
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <section class="container mx-auto mt-10">
    <h2 class="text-center text-3xl font-bold">
      <span class="underline-pseudo">Galery Foto</span>
    </h2>
  </section>
</article>
@endsection