<?php
// user feed filter code
// $age = 18; //should be stored in session variable
// for($i = 0; $i < count($conditions); $i++){
//     $condition = str_replace($conditions[$i]->parameter, $age,$conditions[$i]->value);
//     $condition = eval("if($condition) return true; else return false;");
//     if($condition){
//         echo "Show Post";
//     }else{
//         echo "Hide Post";
//     }   
// }
// if(isset($_POST['conditions'])){
//     $conditions = json_decode($_POST['conditions']);
//     echo 'Your Conditions are : ' . $conditions[0]->parameter;
// }
require './connection.php';

$schemeTitle=$_POST['schemeTitle'];
$schemeDescription=$_POST['schemeDescription'];
$show_Btn=$_POST['show_Btn'];
$show_Btnlabel=$_POST['show_Btnlabel'];
$show_Btnlink=$_POST['show_Btnlink'];
$conditions=$_POST['conditions'];

// $conditioncheck= $_POST['conditionCheck'] ;
// $conditionageBtn= $_POST['conditionAgebtn'];
// $ageConditionAge= $_POST['conditionAge'];
// $userResCheck= $_POST['userResCheck'];
// $userResvalue= $_POST['userResvalue'];
// $usergenbtn= $_POST['usergenbtn'];
// $usergenvalue= $_POST['usergenvalue'];
// $statebtn = $_POST['statebtn'];
// $statename = $_POST['statename'];

$sql = "INSERT INTO `schemes` (`title`, `desp`, `buttonC`, `buttonText`, `buttonLink`,`conditions`) VALUES ('$schemeTitle', '$schemeDescription', '$show_Btn', '$show_Btnlabel', '$show_Btnlink','$conditions')";
$result=mysqli_query($conn,$sql);

if($result){
    // echo "Done Successfully";
    $result = mysqli_query($conn,'SELECT conditions FROM schemes ORDER BY Sno DESC LIMIT 1;');
    if (mysqli_num_rows($result) > 0) {
        $last_row = mysqli_fetch_row($result);
        echo $last_row[0]; //Here it is
    }
}else{
    echo("Error description: " . mysqli_error($conn));
}
?>