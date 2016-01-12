<?php

if (isset($_POST["submit"])){
	$myfile = "/http/tatogb.txt";
	$fh = fopen($myfile,'a');
	$n = $_POST['nome']
	$t = $_POST['twitter']
	$f = $_POST['facebook']
	fwrite($fh, "<td>".$n."<td>".$t."<td>".$f."\n");
	fclose($fh);
	$data=NULL;
}

    echo "Otavio's Guestbook<br>";
    echo "<table border=1>";
    
$file =fopen("/http/tatogb.txt", "r") or exit ("Unable to open file!");
while(!feof($file))
    {
    echo "<tr>";
    echo fgets($file);
    echo "</tr>";
    }
fclose($file);
echo "</table>";
?>