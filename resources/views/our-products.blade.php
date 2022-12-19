@extends('index')

@section('index-content')
<header class="main-hero h-30vh" style="--bg: url({{ asset('assets/img/cart-image.jpg') }})">
  <div class="container mx-auto flex flex-col h-full px-5">
    <h1 class="text-4xl md:text-7xl font-700 mt-auto mb-10">
      Produk<br/>CLUB MOTOR MEDAN
    </h1>
  </div>
</header>

<article class="container mx-auto mt-5 px-3">
  <section class="flex flex-col-reverse lg:flex-row gap-5 lg:gap-20">
    <div class="w-full lg:w-3/4">
      <h2 class="text-5xl font-bold lg:mt-20">
        Jaket Club
      </h2>
      <p class="text-lg my-6">
        Anda dapat membeli jaket yang telah didekorasi dengan atribut-atribut
        <b>CLUB MOTOR MEDAN</b>. Jaket ini dibuat dengan menggunakan bahan-bahan
        yang berkualitas dan sangat cocok digunakan untuk berkendara sepeda
        motor.
      </p>
    </div>
    <img class="w-full lg:w-1/4" src="{{ asset('assets/img/product-jacket.jpg') }}" alt="Jaket organisasi" />
  </section>
  <section class="flex flex-col lg:flex-row gap-5 lg:gap-20">
    <img class="w-full lg:w-1/4" src="{{ asset('assets/img/product-sticker.jpg') }}" alt="Foto stiker" />
    <div class="w-full lg:w-3/4 lg:text-right">
      <h2 class="text-5xl font-bold lg:mt-20">
        Stiker Motor
      </h2>
      <p class="text-lg my-6">
        Stiker-stiker yang kami sediakan sangat artistik dan menarik. Cocok
        untuk digunakan sebagai dekorasi helm dan sepeda motor Anda.
      </p>
    </div>
  </section>
  <section class="flex flex-col-reverse lg:flex-row gap-5 lg:gap-20">
    <div class="w-full lg:w-3/4 lg:text-right">
      <h2 class="text-5xl font-bold lg:mt-20">
        Merchandise
      </h2>
      <p class="text-lg my-6">
        Kami juga menyediakan berbagai merchandise seperti alat tulis, buku
        catatan, kaos, gantungan kunci, tumbler, dan lainnya yang dapat Anda
        dapatkan. Setiap merchandise telah didekorasi sesuai dengan gaya dan
        artistika <b>CLUB MOTOR MEDAN</b>.
      </p>
    </div>
    <img class="w-full lg:w-1/4" src="{{ asset('assets/img/product-merchandise.webp') }}" alt="Merchandise" />
  </section>
  <section class="mt-20">
    <h2 class="text-center text-5xl leading-12 font-bold mt-10">
      <span class="underline-pseudo">
        Tertarik dengan produk kami?
      </span>
    </h2>
    <p class="text-2xl mt-10 text-center">
      Anda dapat membeli produk-produk kami secara langsung di kantor pusat
      <b>CLUB MOTOR MEDAN</b>
    </p>
  </section>
</article>
@endsection