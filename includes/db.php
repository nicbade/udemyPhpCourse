<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "cms";

// key is what is in the array
foreach($db as $key => $value) {
// changes the array to uppercase so it can be a constantß
define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if($connection) {
//     echo "We are connected";
// } else {
//     echo "No connection";
// }


?>