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
<body>
    <span class="timme"></span>
    <input type="number" id="newtime">
    <button type="button" onclick="timerenew()">修改</button>
    <br>
    <button onclick="$('.place:eq(0)').dialog('open')">新增會員</button><br>
    <select name="" id="sortedfwho">
        <option value="id">使用者編號</option>
        <option value="account">帳號</option>
        <option value="name">姓名</option>
    </select>
    <select name="" id="sort">
        <option value="ASC">升冪</option>
        <option value="DESC">降冪</option>
    </select>
    <input type="text" placeholder="關鍵字" id="kw">
    <input type="button" value="查詢" onclick="codee()">
    <div class="placee">
        <table border="1" id="user_table">
            <tr>
                <td>編號</td>
                <td>帳號</td>
                <td>密碼</td>
                <td>姓名</td>
                <td>權限</td>
                <td>操作</td>
            </tr>
        </table>
    </div>
    <div class="placee">
        <table border="1" id="login_table">
            <tr>
                <td>使用者</td>
                <td>時間</td>
                <td>動作</td>
                <td>成功/失敗</td>
            </tr>
        </table>
    </div>
    <div class="place">
        <form action="call_mrg.php?call=2&id=<?php echo $_GET['call'] ?>" method="post">
            帳號 <input type="text" name="upl_act"><br>
            密碼 <input type="text" name="upl_pwd"><br>
            姓名 <input type="text" name="upl_name"><br>
            權限 <select name="upl_rank" id="upl_rank">
                <option value="一般使用者">一般使用者</option>
                <option value="管理者">管理者</option>
            </select><br>
            <input type="submit">
        </form>
    </div>
    <div class="place">
        <form action="call_mrg.php?call=5&id=<?php echo $_GET['call'] ?>" method="post">
            <input type="hidden" name="edt_id" id="edt_id">
            帳號 <input type="text" name="edt_act"  id="edt_act"><br>
            密碼 <input type="text" name="edt_pwd"  id="edt_pwd"><br>
            姓名 <input type="text" name="edt_name" id="edt_name"><br>
            權限 <select name="edt_rank" id="edt_rank">
                <option value="一般使用者">一般使用者</option>
                <option value="管理者">管理者</option>
            </select><br>
            <input type="submit">
        </form>
    </div>
    <div class="place">
        <h1>是否繼續</h1>
        <button onclick="location.href='user_look_mrg.php?call=<?php echo $_GET['call']; ?>'">是</button>
        <button onclick="location.href='user_mrg.php?call=<?php echo $_GET['call']; ?>'">否</button>
    </div>
</body>
<script>
    let timer=parseInt("<?php echo $_SESSION['timmer']; ?>");
    $(".timme").text(timer);
    let dti=setInterval(() => {
        timer--;
        $(".timme").text(timer);
        if(timer==0){
            timer=0;
            clearInterval(timer);
            $(".place:eq(2)").dialog("open");
            setInterval(() => {
                location.href='user_mrg.php?call=<?php echo $_GET['call']; ?>';
            },5000);
        }
    }, 1000);
    $(".place").dialog({
        autoOpen:false,
        height:500,
        width:500,
    });
    codee();
    codeee();
    function timerenew(){
        timer=$("#newtime").val();
    }
    function codeee(){
        $.post({
            aync:false,
            url:"call_mrg.php?call=6",
            success:function(e){
                let list=e.split("+");
                list.pop();
                $(".arow").remove();
                for(let i=0;i<list.length;i++){
                    let arr=JSON.parse(list[i]);
                    $("#login_table").append(`
                        <tr class="arow arow${i}">
                            <td class="arows${i}">${arr['name']}</td>
                            <td class="arows${i}">${arr['time']}</td>
                            <td class="arows${i}">${arr['action']}</td>
                            <td class="arows${i}">${arr['sf']}</td>
                        </tr>
                    `);
                }
            },
        });
    }
    function codee(){
        $.post({
            aync:false,
            url:"call_mrg.php?call=3",
            data:{
                sortedfwho:$("#sortedfwho").val(),
                sort:$("#sort").val(),
                kw:$("#kw").val(),
            },
            success:function(e){
                let list=e.split("+");
                list.pop();
                $(".row").remove();
                for(let i=0;i<list.length;i++){
                    let arr=JSON.parse(list[i]);
                    $("#user_table").append(`
                        <tr class="row row${i}">
                            <td class="rows${i}">${arr['id']}</td>
                            <td class="rows${i}">${arr['account']}</td>
                            <td class="rows${i}">${arr['password']}</td>
                            <td class="rows${i}">${arr['name']}</td>
                            <td class="rows${i}">${arr['rank']}</td>
                        </tr>
                    `);
                    if(arr['name']=='超級管理者'){
                        $(".row"+i).append(`
                            <td></td>
                        `);
                    }else{
                        $(".row"+i).append(`
                            <td>
                                <button type="button" onclick="del('${arr['id']}')">刪除</button>
                                <button type="button" onclick="edt('${i}')">修改</button>
                            </td>
                        `);
                    }
                }
            },
        });
    }
    function edt(text){
        $(".place:eq(1)").dialog("open");
        $("#edt_id").val($(".rows"+text+":eq(0)").text());
        $("#edt_act").val($(".rows"+text+":eq(1)").text());
        $("#edt_pwd").val($(".rows"+text+":eq(2)").text());
        $("#edt_name").val($(".rows"+text+":eq(3)").text());
    }
    function del(text){
        $.post({
            aync:false,
            url:"call_mrg.php?call=4&id="+text,
            success:function(e){
                codee();
            },
        });
    }
</script>
</html>