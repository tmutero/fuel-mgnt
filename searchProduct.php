<?php

//CREDENTIALS FOR DB
define ('DBSERVER', 'localhost');
define ('DBUSER', 'hitrac');
define ('DBPASS','hitrac');
define ('DBNAME','fuelsys');

//LET'S INITIATE CONNECT TO DB
$connection = mysqli_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysqli_select_db(DBNAME) or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
$query = $_REQUEST['query'];
$sql = mysqli_query ("SELECT name, price FROM product WHERE name LIKE '%{$query}%' OR name LIKE '%{$query}%'");
$array = array();
while ($row = mysqli_fetch_array($sql)) {
$array[] = array (
'label' => $row['name'].', '.$row['price'],
'value' => $row['name'],
);
}
//RETURN JSON ARRAY
echo json_encode ($array);
}
