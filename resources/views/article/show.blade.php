@extends('partials.layout')

@section('content')
<div class="container px-5 mx-auto flex flex-col lg:flex-row md:gap-5 xl:gap-20 mt-5">
  <article class="flex-grow-1">
    <h1 class="text-xl font-bold">{{ $data['article']->title }}</h1>
    <div class="flex mt-3 justify-between">
      <div class="text-gray">
        Penulis: {{ $data['article']->user->name }}
      </div>
      <div class="text-gray">
        {{ $data['article']->published_at->isoFormat('DD MMMM YYYY ') }}
      </div>
    </div>
    <figure class="my-5 text-center">
      <img class="max-h-40vh inline" src="{{ $data['article']->thumbnail }}" alt="{{ $data['article']->title }}" />
    </figure>
    <div class="content">
      {!! $data['article']->content !!}
    </div>
  </article>
  <aside class="w-full lg:w-200">
    <h4 class="text-2xl font-700 mb-5 mt-10 sm:mt-0">Artikel Lain</h4>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-5">
      @foreach ($data['others'] as $otherArticle)
        <div class="shadow shadow-tertiary">
          <div class="flex flex-col h-full">
            <img class="w-full aspect-ratio-16/9 object-cover" src="{{ $otherArticle->thumbnail }}" alt="{{ $otherArticle->title }}" />
            <div class="p-4 flex flex-col flex-grow-1">
              <h3 class="text-xl">
                {{ $otherArticle->title }}
              </h3>
              <a href="{{ url()->route('article.show', [$otherArticle->slug]) }}" class="a-btn mt-5 ml-auto">
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