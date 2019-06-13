<?php
    $str=file_get_contents('action.txt');
    $str=str_replace("yes", "no",$str);
    file_put_contents('action.txt', $str);
    echo '<script>alert("no !")</script>';
?>