<?php
error_reporting(1);

$fileName=__DIR__.$_POST['file_name'];
if(file_put_contents($fileName, $_POST['tag'])==true){
   
    header("Content-Type:application/download");
	header("Content-Disposition:attachment;filename={$fileName}");
	header("Content-Transfer-Encoding:binary");
	readfile("{$fileName}");


}else{

}

?>
