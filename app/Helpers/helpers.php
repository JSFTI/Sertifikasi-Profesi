<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if(!function_exists('navs_activate')){
  function navs_activate(array &$navs): bool{
    $homes = [
      url('/'),
      url('/profile'),
      url('/visi-misi'),
      url('/produk'),
      url('/kontak'),
      url('/tentang-kami')
    ];

    for($i = 0; $i < count($navs); $i++){

      if($navs[$i]['href'] === url('/') && in_array(url()->current(), $homes)){
        $navs[$i]['active'] = true;
        return true;
      }

      if( $navs[$i]['href'] === url()->current()){
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