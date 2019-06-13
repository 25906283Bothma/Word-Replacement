<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Replace</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <form action="index.php" method="get">
		<input type="text" onchange="disallow()" onfocusout="allow()" name="original" class="original" placeholder="Enter Original Word" required
		<?php
               $str=file_get_contents('action.txt');
               $a="no";
               if($str == $a){
                    echo ' disabled';
                }
        ?>
		>
		<input type="text" onchange="disallow()" onfocusout="allow()" name="new_word" class="new_word" placeholder="Enter New Word" required>
		<button type="submit" name="submit">Replace</button>
 
<h2>File Words</h2>
<?php
function show(){
    $myfile = fopen("word.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("word.txt"));
    fclose($myfile);
}
function show2(){
    $myfile = fopen("action.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("action.txt"));
    fclose($myfile);
}
function allow(){
//    show2();
}
function disallow(){  
//    show2();
}
if(isset($_GET['submit'])) 
{
    $old = $_GET['original'];
    $new = $_GET['new_word'];
    $str=file_get_contents('word.txt');
    if(strpos($str, $old) !== false){
        $str=str_replace("$old", "$new",$str);
        file_put_contents('word.txt', $str);
        echo '<script>alert("Word found and replaced Successfully !")</script>';
    }
    else
        echo '<script>alert("Word not found !")</script>';
}
?>
<p class="word">
    <?php
        show();
    ?>
</p>
    </form>
<script>
function allow(){
    var formData = 0;
    $.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'allow.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
}
function disallow(){
    var formData = 0;
    $.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'disallow.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
}
</script>
</body>
</html>