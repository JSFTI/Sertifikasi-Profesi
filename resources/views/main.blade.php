@extends('index')

@section('index-content')
<header class="main-hero h-70vh" style="--bg: url({{ asset('assets/img/hero-1.jpg') }})">
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
@endsection