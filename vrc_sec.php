<?php
    include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="cript/jquery-3.6.3.min.js"></script>
    <script src="cript/jquery-ui.js"></script>
    <link rel="stylesheet" href="cript/jquery-ui.css">
    <title>Document</title>
</head>
<style>
    .row{
        display:flex;
    }
    .items{
        height:100px;
        width:100px;
        border:1px solid black;
        background-color:white;
    }
    .change_color{
        background-color:red;
    }
</style>
<body>
    <div class="row">
        <div class="items"></div>
        <div class="items"></div>
    </div>
    <div class="row">
        <div class="items"></div>
        <div class="items"></div>
    </div>
    <button onclick="suree()">確認</button>
</body>
<script>
    let item=document.querySelectorAll('.items');
    
    item.forEach((items)=>{
        items.addEventListener('click',function(){
            items.classList.toggle('change_color');
        });
    });
    function suree(){
        console.log($(".items:eq(0)").css("background-color"));
        if(($(".items:eq(0)").css("background-color")=="rgb(255, 0, 0)" && $(".items:eq(1)").css("background-color")=="rgb(255, 0, 0)") || 
        ($(".items:eq(0)").css("background-color")=="rgb(255, 0, 0)" && $(".items:eq(2)").css("background-color")=="rgb(255, 0, 0)") ||
        ($(".items:eq(3)").css("background-color")=="rgb(255, 0, 0)" && $(".items:eq(1)").css("background-color")=="rgb(255, 0, 0)") ||
        ($(".items:eq(3)").css("background-color")=="rgb(255, 0, 0)" && $(".items:eq(2)").css("background-color")=="rgb(255, 0, 0)")){
            if("<?php echo $_GET['rank'] ?>"=="管理者"){
                location.href="user_mrg.php?call=<?php echo $_GET['id']; ?>";
            }else{
                location.href="user_use.php?call=<?php echo $_GET['id']; ?>";
            }
        }else{
            alert("錯誤");
        }
    }
    
</script>
</html>