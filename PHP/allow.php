<?php
    $str=file_get_contents('action.txt');
    $str=str_replace("no", "yes",$str);
    file_put_contents('action.txt', $str);
    echo '<script>alert("yes !")</script>';
?>