<?php
/** Search city based on states
* @author : Prem Tiwair <www.freewebmentor.com>
*/

#include database configuration file
require_once('DbConnection.php');
$region_id = $_GET['region_id'];
$regions_data=mysqli_query($connection,"SELECT * FROM city where region_id = $region_id ORDER BY city");
$regions = array();
while($region = mysqli_fetch_assoc($regions_data)){
	array_push($regions, $region);
}
print_r(json_encode($regions));

?>