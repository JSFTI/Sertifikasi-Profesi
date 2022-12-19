@extends('partials.layout')

@section('content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/gallery-cover.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Galery Foto
    </h1>
  </div>
</header>

<article class="container mt-10 px-5 mx-auto">
  <h2 class="text-xl text-center font-bold">
    <span class="underline-pseudo">{{ $data['gallery']->name }}</span>
  </h2>
  <section class="my-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-10">
    @foreach ($data['images'] as $image)
      <div class="shadow shadow-tertiary h-full">
        <div class="flex flex-col h-full">
          <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $image->url }}" alt="{{ $image->name }}" />
          <div class="flex flex-col p-4 h-full">
            <h3 class="text-lg">
              {{ $image->caption }}
            </h3>
          </div>
        </div>
      </div>
    @endforeach
  </section>
  <nav class="flex justify-center mt-10 text-2xl">
    {{ $data['images']->links() }}
  </nav>
</article>
@endsection