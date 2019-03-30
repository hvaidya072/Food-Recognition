<!DOCTYPE html>
<html>
<body>

<?php
$filename = "file.txt";
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);
fclose($fp);
print_r($lines);
print $lines[0];

$file="file.txt";
$doc=file_get_contents($file);

$line=explode("\n",$doc);
foreach($line as $newline){
    print '<h3 style="color:#453288">'.$newline.'</h3><br>';

}
?>

</body>
</html>