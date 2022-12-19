@extends('index')

@section('index-content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/mission.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Visi dan Misi<br/>CLUB MOTOR MEDAN
    </h1>
  </div>
</header>
<article class="container mx-auto mt-5 px-5">
  <section class="flex flex-col lg:flex-row gap-5">
    <div class="lg:w-2/3">
      <h2 class="text-5xl font-bold">
        Visi
      </h2>
      <p class="my-8 text-lg">
        Kami memiliki tujuan untuk menjadi suatu organisasi menjadi tempat bagi
        para antusias sepeda motor untuk saling berinteraksi dan berbagi rasa
        antusiasmenya.
      </p>
      <hr class="my-10  " />
      <h2 class="text-5xl font-bold">
        Misi
      </h2>
      <p class="my-8">
        <ul class="list-disc pl-5 text-lg">
          <li>
            Mengedukasi para anggota untuk selalu taat pada aturan lalu lintas.
          </li>
          <li>
            Melakukan pertemuan secara rutin.
          </li>
          <li>
            Melakukan konvoi secara rutin dengan izin dari pihak berwenang.
          </li>
          <li>
            Melakukan kegiatan yang positif bagi lingkungan sekitar.
          </li>
        </ul>
      </p>
    </div>
    <figure class="w-full lg:w-1/3">
      <img src="{{ asset('assets/img/vision.jpg') }}" alt="Foto visi" />
    </figure>
  </section>
</article>
@endsection