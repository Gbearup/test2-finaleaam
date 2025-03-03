<fieldset >
    <legend>帳號管理</legend>
    <table class='ct' style="margin:auto" width='75%'>
        <tr>
            <th>帳號</th>
            <th>密碼</th>
            <th>刪除</th>
        </tr>

<?php

$rows=$User->all();
foreach($rows as $row):?>

        <tr>
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*",strlen($row['pw']));?></td>
            <td>
            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
            
            </td>
            
        </tr>
<?php endforeach;?>
<tr> <td>
<button onclick="del()">確定刪除</button>
<button onclick="resetChk()">清空選取</button>
</td></tr>
    </table>

<h3>新增會員</h3>
<div style="color=red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>

    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>信箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="resetForm()">清除</button>
            </td>
        </tr>
     
    </table>

</fieldset>

<script>

function del(){
    let dels=$("input[name='del[]']:checked");
    let ids=new Array();

    dels.each((idx,item)=>{
        ids.push($(item).val())
    })

    $.post('api/del_user.php',{ids},()=>{
        locaiton.reload()
    })
}



function reg(){
    let user={
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        pw2:$("#pw2").val(),
        email:$("#email").val(),
    }
    
    if(user.acc==""||user.pw==""||user.pw2==""||user.email==""){
        alert('不可空白')
    }else if(user.pw!=user.pw2){
        alert('密碼錯誤')
    }else{
         
        $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{  
            if(parseInt(res)>0){
                alert("帳號重複")
            }else{
                $.post("./api/reg.php",user,(res)=>{
                    if(parseInt(res)==1){
                        alert('註冊成功')
                        location.reload()
                    }
                })
            }
        })
    }
    
    
    
}



function resetForm(){
        $("#acc").val("")
        $("#pw").val("")
        $("#pw2").val("")
        $("#email").val("")
    }


    function resetChk(){
        $("input[type='checkbox']").prop("checked",false)
        
    }


</script>