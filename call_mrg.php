<?php
    include 'connect.php';
    if(!empty($_POST)){
        if($_GET['call']==1){
            if(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `user` WHERE `account` LIKE '$_POST[upl_act]'"))){
                if($row1=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `user` WHERE `account` LIKE '$_POST[upl_act]' AND `password` LIKE '$_POST[upl_pwd]'"))){
                    if($_POST['codee']==$_POST['sorted_code']){
                        $_SESSION['wrontime']=0;
                        mysqli_query($db,"INSERT INTO `user_log_recd`(`name`, `action`, `time`, `sf`) VALUES 
                        ('$_POST[upl_act]','登入','$time','成功')");
                        echo "
                            <script>
                                alert('成功');
                                location.href='vrc_sec.php?rank=$row1[rank]&id=$row1[id]';
                            </script>
                        ";
                    }else{
                        mysqli_query($db,"INSERT INTO `user_log_recd`(`name`, `action`, `time`, `sf`) VALUES 
                        ('$_POST[upl_act]','登入','$time','失敗')");
                        ifwrong();
                        echo "
                            <script>
                                alert('驗證碼錯誤');
                                location.href='index.php';
                            </script>
                        ";
                    }
                }else{
                    mysqli_query($db,"INSERT INTO `user_log_recd`(`name`, `action`, `time`, `sf`) VALUES 
                    ('$_POST[upl_act]','登入','$time','失敗')");
                    ifwrong();
                    echo "
                        <script>
                            alert('密碼錯誤');
                            location.href='index.php';
                        </script>
                    ";
                }
            }else{
                mysqli_query($db,"INSERT INTO `user_log_recd`(`name`, `action`, `time`, `sf`) VALUES 
                ('$_POST[upl_act]','登入','$time','失敗')");
                ifwrong();
                echo "
                    <script>
                        alert('帳號錯誤');
                        location.href='index.php';
                    </script>
                ";
            }
        }else if($_GET['call']==2){
            mysqli_query($db,"INSERT INTO `user`(`account`, `password`, `name`, `rank`) VALUES 
            ('$_POST[upl_act]','$_POST[upl_pwd]','$_POST[upl_name]','$_POST[upl_rank]')");
            header('Location:user_look_mrg.php?call='.$_GET['id']);
        }else if($_GET['call']==5){
            mysqli_query($db,"UPDATE `user` SET `account`='$_POST[edt_act]',`password`='$_POST[edt_pwd]',`name`='$_POST[edt_name]',`rank`='$_POST[edt_rank]' WHERE `id`LIKE'$_POST[edt_id]'");
            header('Location:user_look_mrg.php?call='.$_GET['id']);
        }else if($_GET['call']==3){
            if($_POST['kw']==""){
                $row=mysqli_query($db,"SELECT * FROM `user` ORDER BY `user`.`$_POST[sortedfwho]` $_POST[sort]");
            }else{
                $row=mysqli_query($db,"SELECT * FROM `user` WHERE (`account` LIKE '$_POST[kw]') || 
                (`password` LIKE '$_POST[kw]') || 
                (`name` LIKE '$_POST[kw]') || 
                (`rank` LIKE '$_POST[kw]')  ORDER BY `user`.`$_POST[sortedfwho]` $_POST[sort]");
            }
            while($arr=mysqli_fetch_array($row)){
                echo json_encode($arr)."+";
            }
        }else if($_GET['call']==7){
            $_POST['itext']=str_replace(' ','',$_POST['itext']);
            if(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `type` WHERE `itext` LIKE '$_POST[itext]'"))){
                echo "已新增過了";
            }else{
                mysqli_query($db,"INSERT INTO `type`(`itext`, `ihtml`, `Aort`) VALUES 
                ('$_POST[itext]','$_POST[ihtml]','A')");
            }
            
        }
    }
    
    if($_GET['call']==4){
        mysqli_query($db,"DELETE FROM `user` WHERE `id` LIKE '$_GET[id]'");
    }
    if($_GET['call']==6){
        $row=mysqli_query($db,"SELECT * FROM `user_log_recd`");
        while($arr=mysqli_fetch_array($row)){
            echo json_encode($arr)."+";
        }
    }
    if($_GET['call']==8){
        $row=mysqli_query($db,"SELECT * FROM `type`");
        while($arr=mysqli_fetch_array($row)){
            echo json_encode($arr)."+";
        }
    }
?>
