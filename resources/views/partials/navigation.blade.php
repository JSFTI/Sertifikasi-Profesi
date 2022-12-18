<nav class="a-navbar">
  <div class="flex items-center my-auto h-full">
      <button class="text-3xl mr-3" x-data @@click="$store.sidebar.toggle()">
          <div class="i-mdi:menu"></div>
      </button>
      <a href="{{ url('/') }}" class="inline-flex flex-col items-center select-none">
          <div class="i-mdi:motorcycle text-5xl"></div>
      </a>
      <h1 class="flex-grow-1 text-center text-2xl font-bold">
          CLUB MOTOR MEDAN
      </h1>
  </div>
</nav>
<aside class="a-sidebar" x-data="{
    currentUrl: `{{ url()->current() }}`
}">
    <x-sidebar-tree :items="$sidebars" />
</aside>