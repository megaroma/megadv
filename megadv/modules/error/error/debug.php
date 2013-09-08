<?
if (!defined('MEGADV')) die ('401 page not found');
class module_error_debug extends module_error
{

public function run( Exception $e,$file,$num)
 {
  echo "Ôàéë:$file <br>";
   echo "Îøèáêà:".$e->getCode().", ".$e->getMessage()."<br>";
   $err_file = file ($file);
   $text = "";
   for ($i = $num-1; $i < ($num + 10); $i++)
   {
   $text .= $err_file[$i]."\n";
   }
   $text = stripslashes($text); 

  if(!strpos($text,"<?") && substr($text,0,2)!="<?") {

    $text="<?php\n".trim($text)."\n?>"; 

  }  

  $text = trim($text); 
   
   echo highlight_string($text ,true);
   exit; 
 }



}

?>