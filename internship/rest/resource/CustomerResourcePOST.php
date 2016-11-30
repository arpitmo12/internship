<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

echo $request->name;
echo $request->comment;

try {
	
	$host="localhost:3306";
	$user="root";
	$password="root";
	$dbname="customerdb";

	$conn=NULL;
	$conn=mysql_connect($host,$user,$password);
	mysql_select_db($dbname);
	
	$query="insert into customer(name, comment) values('".$request->name."','".$request->comment."')";

	$result = mysql_query($query,$conn);
	
		if($result)
		{
			mysql_close();
		}
	echo "Comment posted sucessfully";

} catch (Exception $e) {
	echo $e->getMessage();
}

?>