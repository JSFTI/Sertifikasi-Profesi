@extends('partials.layout')

@section('content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/gallery-cover.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Galery Foto
    </h1>
  </div>
</header>

<article class="container px-5 mx-auto mt-10">
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10">
    @foreach ($data['galleries'] as $gallery)
      <div class="shadow shadow-tertiary h-full">
        <div class="flex flex-col h-full">
          <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $gallery->thumbnail->url }}" alt="{{ $gallery->name }}" />
          <div class="flex flex-col p-4 h-full">
            <h3 class="text-lg mb-4">
              {{ $gallery->name }}
            </h3>
            <a href="{{ url()->route('gallery.show', [$gallery->slug]) }}" class="a-btn mt-auto ml-auto">
              Lihat Foto
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <nav class="flex justify-center mt-10 text-2xl">
    {{ $data['galleries']->links() }}
  </nav>
</article>
@endsection