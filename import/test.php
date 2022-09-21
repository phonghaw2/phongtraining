<?php
  echo "hello phonghaw2";
  echo "hello phonghaw2";
  $connection = mysqli_connect('localhost','root','cms-8341','mysql');
  mysqli_set_charset($connection,'utf8');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  function insertData($start, $end , $connection) {
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    for ($i = $start; $i < $end; $i++) {
      $name = 'random' . $i;

      $sql = "insert into test (name) values ('$name')";
      $query = mysqli_query($connection, $sql);
    };

  };

  insertData(1,4,$connection);
// for( $i = 0 ;  $i < 1000000 ; $i+= 10000 ) {
//   echo "hello";
//   insertData($i , $i += 10000 , $connection);
//   sleep(1);
// }


  mysqli_error($connection);
  mysqli_close($connection);