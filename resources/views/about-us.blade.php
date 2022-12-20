@extends('index')

@section('index-content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/hero-1.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      About<br/>CLUB MOTOR MEDAN
    </h1>
  </div>
</header>
<article class="container mx-auto mt-5 px-5">
  <section>
    <h1 class="text-center text-3xl font-bold mb-10">
      <span class="underline-pseudo">Sejarah Kami</span>
    </h1>
    <p class="mb-5">
      <b>CLUB MOTOR MEDAN</b> memiliki riwayat dari tahun 2002 awal. Kelompok yang dimulai dari kumpulan pertemanan kecil yang saling memiliki rasa suka pada sepeda motor tumbuh menjadi komunitas pengendara yang berkembang pesat.
    </p>
    <p class="mb-5">
      Pada awalnya, klub kami berfokus pada pengorganisasian perjalanan kelompok dan acara untuk para anggotanya. Seiring dengan pertumbuhan ukuran dan popularitas kami, kami mulai berpartisipasi dalam reli dan acara lokal dan nasional. Kami juga mulai terlibat dalam upaya amal dan menjadi sukarelawan di komunitas lokal kami.
    </p>
    <p class="mb-5">
      Selama bertahun-tahun, kami telah membuat nama untuk diri kami sendiri sebagai klub yang ramah dan bersahabat yang memprioritaskan keselamatan di jalan raya. Kami telah menarik para pengendara dari semua lapisan masyarakat dan semua tingkat pengalaman, dan keanggotaan kami terus bertambah.
    </p>
    <p class="mb-5">
      Terlepas dari tantangan yang kami hadapi di sepanjang jalan, klub kami selalu berkomitmen untuk menumbuhkan rasa persahabatan dan kecintaan pada jalan terbuka. Kami bangga dengan sejarah kami dan ikatan yang telah terbentuk di dalam klub kami.
    </p>
  </section>
</article>
@endsection