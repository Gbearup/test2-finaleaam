<fieldset>
    <legend>會員註冊</legend>
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
                        loaction.reload()
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


</script>