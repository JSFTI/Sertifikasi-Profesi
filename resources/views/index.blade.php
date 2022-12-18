@extends('partials.layout')

@section('content')
  <nav class="bg-primary py-6 font-700 text-md">
    <ul class="flex justify-evenly tracking-widest">
      <li>
        <a href="{{ url('/') }}">BERANDA</a>
      </li>
      <li>
        <a href="{{ url('/profil') }}">PROFIL</a>
      </li>
      <li>
        <a href="{{ url('/visi-misi') }}">VISI DAN MISI</a>
      </li>
      <li>
        <a href="{{ url('/produk-kami') }}">PRODUK KAMI</a>
      </li>
      <li>
        <a href="{{ url('/kontak-kami') }}">KONTAK KAMI</a>
      </li>
      <li>
        <a href="{{ url('/about-us') }}">ABOUT US</a>
      </li>
    </ul>
  </nav>
  @yield('index-content')
@endsection