<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","53_1");
mysqli_query($db,"SET NAMES UTF8");
$time=date("h:i:s Y/m/d");
if(!isset($_SESSION['wrontime'])){
    $_SESSION['wrontime']=0;
}
if(!isset($_SESSION['timmer'])){
    $_SESSION['timmer']=60;
}$_SESSION['timmer']=60;
function ifwrong(){
    $_SESSION['wrontime']++;
    if($_SESSION['wrontime']==3){
        $_SESSION['wrontime']=0;
        echo "
            <script>
                alert('錯誤');
                location.href='wrong.php';
            </script>
        ";
    }
    return false;
}