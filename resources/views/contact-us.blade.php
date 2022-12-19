@extends('index')

@section('index-content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/contact-us.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Kontak<br/>CLUB MOTOR MEDAN
    </h1>
  </div>
</header>
<article class="container mx-auto mt-5 px-5">
  <h2 class="text-center text-3xl font-bold">
    <span class="underline-pseudo">
      Hubungi Kami
    </span>
  </h2>
  <div class="flex gap-5 mt-10 flex-col xl:flex-row">
    <section class="w-full xl:w-1/3 shadow shadow-tertiary p-3 lg:p-10 text-xl font-600 flex flex-col gap-10">
      <a href="tel:+62 0812345678910" class="flex items-center gap-10">
        <div class="i-mdi:phone text-3xl"></div>
        <span>+62 0812345678910</span>
      </a>
      <a href="mailto:clubmotormedan@fake.xyz" class="flex items-center gap-10">
        <div class="i-mdi:email text-3xl"></div>
        <span>clubmotormedan@fake.xyz</span>
      </a>
      <a href="https://www.facebook.com/clubmotormedan" class="flex items-center gap-10">
        <div class="i-mdi:facebook text-3xl"></div>
        <span>Facebook</span>
      </a>
      <a href="https://twitter.com/clubmotormedan" class="flex items-center gap-10">
        <div class="i-mdi:twitter text-3xl"></div>
        <span>Twitter</span>
      </a>
      <a href="https://www.instagram.com/clubmotormedan" class="flex items-center gap-10">
        <div class="i-mdi:instagram text-3xl"></div>
        <span>Instagram</span>
      </a>
    </section>
    <section class="flex-grow flex justify-center">
      <iframe
        width="600"
        height="450"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBqGgMI0mr6FJ00Eys8-yAGTosTadzUnV8
          &q=3.785236,98.734515">
      </iframe>
    </section>
  </div>
</article>
@endsection