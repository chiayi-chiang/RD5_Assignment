# RD5_Assignment
1. 所需功能
- sql->bank.sql/database.php    check
- 登入/註冊->login.php/singup.php     check
- 登出／會員登入->index.php    check
- 存款 ->income.php   check
- 提款 ->expense.php   check
- 查詢餘額 ->secret.php   check
- 查詢明細 -> secret.php   check
2. 使用者介面
- 介面需顯示餘額, 排版可自由發揮 (可增加設定使
用 * 屏蔽餘額 加分題)->secret.php   check
<script>
function listBtn() {
    var listBtn = document.getElementById('listBtn');
    var textlistn = document.getElementById('textlistn');
    if (textlistn.style.display === 'none') {//當物件被點擊時 判斷 id為textlistn的style.display是否為'none'
        textlistn.style.display = 'block';//是的話就把style.display變成'block'
        listBtn.innerText = "<?="$"." ".$sqltotal["total"]?> ";//顯示total
    } else {
        textlistn.style.display = 'none';//否的話就變成'none'
        listBtn.innerText = "******";//none時呈現*******
    }
}
</script>
- 需有第一點列出之功能