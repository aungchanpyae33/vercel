<?php
  $directory = "../photo";
  // scandir is to use to get the folder like an array
  // array_diff(make rmeove some)
  $filesAndFolders = array_diff(scandir($directory , SCANDIR_SORT_NONE), array('.', '..'));
   //make filepath array that filemtime can access
  $file =  array_map( function($title) use ($directory){
    return $directory . '/' .$title;
  } , $filesAndFolders);

  usort($file, function($a,$b){return filemtime($a)-filemtime($b);});

  // step- remove "../" "replace

  $fileJavascript = json_encode($file);
  print_r($fileJavascript);
