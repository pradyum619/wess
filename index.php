<?php
function dir2json($dir)
{
    $a = [];
    if($handler = opendir($dir))
    {
        while (($content = readdir($handler)) !== FALSE)
        {
            if ($content != "." && $content != ".." && $content != "Thumb.db")
            {
                if(is_file($dir."/".$content)) $a[] = $content;
				else if(is_dir($dir."/".$content)) $a[$content] = dir2json($dir."/".$content); 
            } 
        }    
        closedir($handler); 
    } 
    return $a;    
}

$path = ".";
$arr = dir2json($path);
$json = json_encode($arr, 0);
echo $json;
?>
