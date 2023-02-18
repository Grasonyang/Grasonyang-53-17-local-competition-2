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
    .dp{
        height:70px;
        width:280px;
        background-color:black;
        display:flex;
    }
    .code_img{
        height:70px;
        width:70px;
    }
</style>
<body>
    <h1>咖啡商品展示系統</h1>
    <div>
        <form action="call_mrg.php?call=1" method="post" onsubmit="return combine();">
            <div style="display:flex">
                <span style="width:120px">帳號</span>
                <input type="text" id="upl_act" name="upl_act">
            </div>
            <div style="display:flex">
                <span style="width:120px">密碼</span>
                <input type="text" id="upl_pwd" name="upl_pwd">
            </div>
            <div>
                <span style="width:120px">驗證碼</span>
                <div class="dp" id="dp1">

                </div>
                <div class="dp" id="dp2">

                </div>
                <button type="button" onclick="code_renew()">重新產生</button>
                <button type="button" onclick="how_sort()" id="sorted_but">由小到大</button>
                <input type="hidden" name="codee" id="codee">
                <input type="hidden" name="sorted_code" id="sorted_code">
            </div>
            <button type="button" onclick="clean()">清除</button>
            <button type="submit" onclick="">登入</button>
        </form>
    </div>
</body>
<script>
    let code="";
    code_renew();
    $("#dp1,#dp2").sortable({
        connectWith:".dp",
    }).disableSelection();

    function combine(){
        if($("#dp2").children().length==4){
            let codeee=$("#dp2").children()[0].id+$("#dp2").children()[1].id+$("#dp2").children()[2].id+$("#dp2").children()[3].id;
            $("#sorted_code").val(codeee);
            return true;
        }else{
            alert("請輸入完整驗證碼");
            return false;
        }
    }

    function clean(){
        $("#upl_act").val("");
        $("#upl_pwd").val("");
        code_renew();
    }

    function how_sort(){
        if($("#sorted_but").text()=="由小到大"){
            $("#sorted_but").text("由大到小");
            $("#codee").val(code.split("").sort().reverse().join(""));
        }else{
            $("#sorted_but").text("由小到大");
            $("#codee").val(code.split("").sort().join(""));
        }
    }

    function code_renew(){
        $.post({
            aync:false,
            url:"code.php",
            success:function(e){
                code=e;
                how_sort();
                how_sort();
                $(".A").remove();
                $("#dp1").append(`
                    <div id="${code[0]}"><img class="code_img" src="code_img.php?call=${code[0]}" alt="A"></div>
                    <div id="${code[1]}"><img class="code_img" src="code_img.php?call=${code[1]}" alt="A"></div>
                    <div id="${code[2]}"><img class="code_img" src="code_img.php?call=${code[2]}" alt="A"></div>
                    <div id="${code[3]}"><img class="code_img" src="code_img.php?call=${code[3]}" alt="A"></div>
                `);
            },
        });
    }
</script>
</html>
