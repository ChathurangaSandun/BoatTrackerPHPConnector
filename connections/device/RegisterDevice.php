<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga Sandun
 * Date: 6/11/2016
 * Time: 5:48 PM
 */

include_once '../../db/Database.php';

//connection
$db = new database();
$con = $db->getInstance();


$boatid = $_POST['boatid'];
$deviceid = $_POST['deviceid'];
$provider = $_POST['provider'];
$sim = $_POST['sim'];
$mobile = $_POST['mobile'];
$datee = $_POST['date'];
$typee= "Smart Phone";


$query = "INSERT INTO device (device_id_imei,reg_date,service_provider,sim_number,device_type,sim_tp_number,boat_register_number)
    VALUES (:deviceid,:dateReg,:provider,:sim,:typee,:mobile,:boatid);";

$stmt = $con->prepare($query);

$stmt->bindParam(":deviceid",$deviceid);
$stmt->bindParam(":dateReg",$datee);
$stmt->bindParam(":provider",$provider);
$stmt->bindParam(":sim",$sim);
$stmt->bindParam(":typee",$typee);
$stmt->bindParam(":mobile",$mobile);
$stmt->bindParam(":boatid",$boatid);
$ok = $stmt->execute();

if($ok > 0 ){
    echo "1";

}else{
    echo $ok;
}




