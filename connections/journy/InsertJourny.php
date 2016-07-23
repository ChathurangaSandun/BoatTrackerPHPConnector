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


$journyid = $_POST['journyid'];
$startdate = $_POST['startdate'];
$starttime = $_POST['starttime'];
$startlat = floatval($_POST['startlat']);
$startlong = floatval($_POST['startlong']);
$enddate = $_POST['enddate'];
$endtime = $_POST['endtime'];
$endlat = floatval($_POST['endlat']);
$endlong = floatval($_POST['endlong']);
$fisherman = $_POST['fisherman'];
$boatnumber = $_POST['boatnumber'];



$query = "INSERT INTO journy (journy_id,start_date,start_time,start_latitude,start_longtitude,end_date,end_time,end_latitude,end_longtitude,fisherman,boat_register_number)
    VALUES (:journyid,:startdate,:starttime,:startlat,:startlong,:enddate,:endtime,:endlat,:endlong,:fisherman,:boatnumber);";

$stmt = $con->prepare($query);

$stmt->bindParam(":journyid",$journyid);
$stmt->bindParam(":startdate",$startdate);
$stmt->bindParam(":starttime",$starttime);
$stmt->bindParam(":startlat",$startlat);
$stmt->bindParam(":startlong",$startlong);
$stmt->bindParam(":endtime",$enddate);
$stmt->bindParam(":enddate",$endtime);
$stmt->bindParam(":endlat",$endlat);
$stmt->bindParam(":endlong",$endlong);
$stmt->bindParam(":fisherman",$fisherman);
$stmt->bindParam(":boatnumber",$boatnumber);

$ok = $stmt->execute();

if($ok > 0 ){
    echo "1";

}else{
    echo $ok;
}




