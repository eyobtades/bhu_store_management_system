<?php
class store_security{
 public $link='';
 function __construct($temperature, $humidity, $smoke,$obj){
  $this->connect();
  $this->storeInDB($temperature, $humidity, $smoke,$obj);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'bhu_sms') or die('Cannot select the DB');
 }
 
 function storeInDB($temperature, $humidity,$smoke,$obj){
  $query = "update `monitor` set temperature='".$humidity."', moisture='".$temperature."', human='".$smoke."', smoke='".$obj."'";
  $result = mysqli_query($this->link,$query) or die('Error:  '.$query);
 }
 
}
if($_GET['temperature'] != '' and  $_GET['humidity'] != '' and  $_GET['smoke'] != '' and  $_GET['obj'] != ''){
 $devive = new store_security($_GET['temperature'],$_GET['moisture'],$_GET['smoke'],$_GET['obj']);
}


?>