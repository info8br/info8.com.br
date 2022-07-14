<?php

  $file      = $_FILES["file"]["tmp_name"];
  $save_file = 'files/'.$extension[$type].'/'.$dire.'/'.$name.'.'.$extension[$type];
    
  $error["upload"] = move_uploaded_file($file,$save_file);

?>