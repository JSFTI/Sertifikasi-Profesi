@extends('partials.layout')

@section('content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/clients.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Klien<br/>CLUB MOTOR MEDAN
    </h1>
  </div>
</header>

<article class="container mx-auto px-5">
  <div class="gap-5 mt-20 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
    @foreach ($data['clients'] as $client)
      <div class="shadow-lg rounded shadow-tertiary rounded">
        <div @class(['h-30', 'p-5', 'w-full', 'flex', 'justify-center', 'rounded-tr', 'rounded-tl',
          'bg-primary' => $client['bg'] === 'dark',
          'bg-neutral' => $client['bg'] === 'light',
        ])>
          <img class="h-full object-contain" src="{{ $client['logo'] }}" alt="{{ $client['name'] }}" />
        </div>
        <p class="p-5 text-center text-xl font-bold">
          {{ $client['name'] }}
        </p>
      </div>
    @endforeach
  </div>
</article>
@endsection