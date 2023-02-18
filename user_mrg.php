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
    .rows{
        height:200px;
        width:340px;
        display:flex;
        border:1px solid black;
    }
    .test{
        height:200px;
        width:340px;
        display:flex;
        border:1px solid black;
    }
    .look{
        height:200px;
        width:340px;
        display:flex;
        border:1px solid black;
    }
    
    .rimg{
        height:160px;
        width:170px;
        background-color:#a3c0f0;
    }
    .rlink{
        height:40px;
        width:170px;
        background-color:#d4a3f0;
    }
    .rname{
        height:40px;
        width:170px;
        background-color:#f0a3c8;
    }
    .rintro{
        height:80px;
        width:170px;
        background-color:#a3f0c4;
    }
    .rdate{
        height:40px;
        width:170px;
        background-color:#fffab8;
    }
    .rfee{
        height:40px;
        width:170px;
        background-color:#ffba82;
    }
</style>
<body>
    <button onclick="location.href='user_look_mrg.php?call=<?php echo $_GET['call']; ?>'">會員管理</button>
    <button onclick="$('.place:eq(0)').dialog('open')">查詢</button>
    <div class="place">
        關鍵字:<input type="text" id="kw"><br>
        價格:<input type="number" id="LL">~<input type="number" id="HH"><br>
        <button>查詢</button>
    </div>

    <br>

    <button onclick="$('.areas').dialog('close'),$('.areas:eq(0)').dialog('open');">選擇版型</button>
    <button onclick="$('.areas').dialog('close'),$('.areas:eq(1)').dialog('open');">填寫資料</button>
    <button onclick="$('.areas').dialog('close'),$('.areas:eq(2)').dialog('open');">預覽</button>
    <button onclick="$('.areas').dialog('close'),$('.areas:eq(3)').dialog('open');">確定送出</button>
    

    <div class="areas">
        <button onclick="$('.place:eq(1)').dialog('open')">新增版型</button>

        <input type="hidden" name="" id="whtype">
        <div class="rows A1">
            <div class="row">
                <div class="rimg">圖片</div>
                <div class="rlink">相關連結</div>
            </div>
            <div class="row">
                <div class="rname">商品名稱</div>
                <div class="rintro">商品簡介</div>
                <div class="rdate">發布日期</div>
                <div class="rfee">費用</div>
            </div>  
        </div><br>
        <div class="rows A2">
            <div class="row">
                <div class="rname">商品名稱</div>
                <div class="rimg">圖片</div>
            </div>
            <div class="row">
                <div class="rfee">費用</div>
                <div class="rintro">商品簡介</div>
                <div class="rdate">發布日期</div>
                <div class="rlink">相關連結</div>
            </div>  
        </div>
    </div>
    <div class="areas">
        圖片<input type="file" id="new_img" accept="iamge/png"><br>
        商品名稱<input type="text" id="new_name"><br>
        商品簡介<input type="text" id="new_intro"><br>
        費用<input type="text" id="new_fee"><br>
        相關連結<input type="text" id="new_link"><br>
    </div>
    <div class="areas"></div>
    <div class="place">
        <div class="test A2">
            <div class="row">
                <div class="rname">商品名稱</div>
                <div class="rimg">圖片</div>
            </div>
            <div class="row">
                <div class="rfee">費用</div>
                <div class="rintro">商品簡介</div>
                <div class="rdate">發布日期</div>
                <div class="rlink">相關連結</div>
            </div>  
        </div>
        <button onclick="code()">確定</button>
    </div>
</body>
<script>
    let whtype=$('.A1')[0].innerHTML;
    let timg;
    let tlink;
    let tname;
    let tintro;
    let tdate;
    let tfee;
    $(document).ready(function(){
        $(".place").dialog({
            autoOpen:false,
            height:500,
            width:500,
        });
        $(".areas").dialog({
            autoOpen:false,
            height:500,
            width:500,
        });
        $(".test .row").sortable();
        $(document).on('click','.rows',function(){
            whtype=$(this)[0].innerHTML;
            rowclick();
        });
        $("#new_date").on('change',function(){
            tname=$("#new_date").val();
            $(".look .rdate").append(`
                ${tname}
            `);
        });
        $("#new_date").on('change',function(){
            tname=$("#new_date").val();
            $(".look .rdate").append(`
                ${tname}
            `);
        });
        $("#new_img").on('change',function(){
            timg=this.files[0].name;
            $(".look .rimg").text("");
            $(".look .rimg").append(`
                <img src="cript/${namee}">
            `);
        });
        $("#new_name").on('change',function(){
            tname=$("#new_name").val();
            $(".look .rname").append(`
                ${tname}
            `);
        });
        $("#new_intro").on('change',function(){
            tintro=$("#new_intro").val();
            $(".look .rintro").append(`
                ${tintro}
            `);
        });
        
        codee();
        rowclick();
    });
    function rowclick(){
        $(".look").remove();
        $(".areas:eq(2)").append(`
            <div class="look"></div>
        `);
        $(".look").append(whtype);
    }
    function code(){
        $.post({
            async:false,
            url:"call_mrg.php?call=7",
            data:{
                itext:$(".test")[0].innerText,
                ihtml:$(".test")[0].innerHTML,
            },
            success:function(e){
                $('.place:eq(1)').dialog('close');
                codee();
            },
        });
    }
    function codee(){
        $.post({
            async:false,
            url:"call_mrg.php?call=8",
            success:function(e){
                let list=e.split("+");
                list.pop();
                $(".rows").remove();
                for(let i=0;i<list.length;i++){
                    let arr=JSON.parse(list[i]);
                    $(".areas:eq(0)").append(`
                        <div class="rows new${i}"></div>
                    `);
                    $(".new"+i).append(arr['ihtml']);
                }
            },
        });
    }
</script>
</html>