@extends('partials.layout')

@section('content')
  <nav class="bg-primary py-6 font-700 overflow-x-auto flex px-3" x-init="scrollToCurrentHome($el)">
    <ul
      class="flex flex-grow-1 justify-evenly tracking-widest gap-5 whitespace-nowrap relative"
    >
      <li>
        <a href="{{ url()->route('index') }}" @class([
          'active-home' => url('/') === url()->current()
        ])>BERANDA</a>
      </li>
      <li>
        <a href="{{ url()->route('index.profile') }}" @class([
          'active-home' => url('/profil') === url()->current()
        ])>PROFIL</a>
      </li>
      <li>
        <a href="{{ url()->route('index.visionMission') }}" @class([
          'active-home' => url('/visi-misi') === url()->current()
        ])>VISI DAN MISI</a>
      </li>
      <li>
        <a href="{{ url()->route('index.ourProducts') }} " @class([
          'active-home' => url('/produk-kami') === url()->current()
        ])>PRODUK KAMI</a>
      </li>
      <li>
        <a href="{{ url()->route('index.contactUs') }}" @class([
          'active-home' => url('/kontak-kami') === url()->current()
        ])>KONTAK KAMI</a>
      </li>
      <li>
        <a href="{{ url()->route('index.aboutUs') }}" @class([
          'active-home' => url('/about-us') === url()->current()
        ])>ABOUT US</a>
      </li>
    </ul>
  </nav>
  @yield('index-content')
@endsection