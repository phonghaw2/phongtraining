
<?php
$hostname='localhost';
$username='root';
$password='cms-8341';
$database='test';
$conn = new mysqli($hostname,$username,$password,$database);
if(!$conn){
die('Error In connection'.mysqli_connect_error());
}else{
echo 'Connection Success<br>';
}
// mysqli_close($conn);
?>



<!-- CREATE TABLE test (
sl_no INT(255) NOT NULL AUTO_INCREMENT,
sequence1 INT(255) NOT NULL DEFAULT '0',
word1 VARCHAR(10000) NOT NULL DEFAULT '0',
number1 VARCHAR(1000) NOT NULL DEFAULT '0',
PRIMARY KEY (sl_no)) -->



<!--  
select count(*) from samplelist
select * from samplelist order by sl_no asc limit 10
select * from samplelist order by sl_no desc limit 10
-->