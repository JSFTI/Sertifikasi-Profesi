<?php

use Illuminate\Support\Str;

if(!function_exists('navs_activate')){
  function navs_activate(array &$navs): bool{
    // Pseudo home pages
    $homes = [
      url('/'),
      url('/profil'),
      url('/visi-misi'),
      url('/produk-kami'),
      url('/kontak-kami'),
      url('/tentang-kami')
    ];

    for($i = 0; $i < count($navs); $i++){
      // Handle edge case if current page is pseudo homepage
      if($navs[$i]['href'] === url('/') && in_array(url()->current(), $homes)){
        $navs[$i]['active'] = true;
        return true;
      }

      if($navs[$i]['href'] !== url('/') && Str::startsWith(url()->current(), $navs[$i]['href'])){
        $navs[$i]['active'] = true;
        return true;
      }

      if(isset($navs[$i]['children'])){
        $expanded = navs_activate($navs[$i]['children']);
        $navs[$i]['expanded'] = $expanded;
        return $expanded;
      }
    }
    return false;
  }
}

?>