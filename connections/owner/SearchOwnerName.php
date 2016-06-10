<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga Sandun
 * Date: 6/10/2016
 * Time: 11:40 PM
 */

include_once '../../db/Database.php';

//connection
$db = new database();
$con = $db->getInstance();


$ownerName= $_GET['ownername'];



$outputArray =array(
    "ownerid"=>"",
    "boats"=>array()

);


if(!empty($ownerName)){

    $query = "SELECT boat_owner.owner_id, boat.boat_register_number
FROM  boat_owner LEFT JOIN  boat
  ON boat_owner.owner_id = boat.ownerid
WHERE boat_owner.name = :ownername ";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":ownername",$ownerName);
    $stmt->execute();

    if($stmt->rowCount() >= 1 ){
        $resultArray = $stmt->fetchAll();
        //print_r($resultArray);

        $outputArray["ownerid"] = $resultArray[0]["owner_id"];



        for($i=0;$i<count($outputArray)+1;$i++){
            $outputArray["boats"][$i] = $resultArray[$i]["boat_register_number"];
        }



        echo json_encode($outputArray);


    }else{
        $outputArray["ownerid"] = "0";
        echo json_encode($outputArray);
    }

}else{
    $outputArray["ownerid"] = "-1";
    json_encode($outputArray);
}
