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
<article class="container mx-auto mt-5 px-5">
  <section class="flex flex-col lg:flex-row gap-5">
    <figure class="w-full lg:w-1/3">
      <img src="{{ asset('assets/img/some-members.jpg') }}" alt="Foto beberapa anggota kami" />
    </figure>
    <div class="lg:w-2/3">
      <p class="w-full text-lg leading-8 pt-3 lg:pt-10">
        <span class="font-700">CLUB MOTOR MEDAN</span> adalah klub sepeda motor yang
        terdiri atas ratusan penggemar sepeda motor. Kami sering melakukan
        <i>meet-up</i> di mana kita dapat saling berbincang dan bersosialisasi.
        Sewaktu-waktu, kami akan mengadakan konvoi bersama<sup>*</sup> dan para
        anggota dapat mengikutinya dengan menggunakan sepeda motor favorit mereka.
        Untuk menjadi anggota, Anda wajib memiliki SIM C dan mahir mengendarai
        sepeda motor.
      </p>
      <strong class="block mt-4">
        <small>* Sebelum melakukan konvoi, kami akan meminta izin terlebih dahulu dengan pihak wewenang</small>
      </strong>
    </div>
  </section>
</article>
@endsection