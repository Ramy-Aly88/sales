<?php

use Illuminate\Support\Facades\Config;

function uploadImage($folder,$image)
{
   $extension = strtolower($image->extension());
   $filename=time(). rand(100,998) . '.'. $extension;
   $image->getClientOriginalName = $filename;
   $image->move($folder, $filename);
return $filename;
 }
