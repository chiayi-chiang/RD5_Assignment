<script>
function text(x)
{
    let money ={
        money:document.getElementById(x).value
    }
    $.ajax({
		type: "post",
		url:"expense.php",
        data:money
	}).then(function(e){
		$("#balance").val(e);
	})

    
}
$("input").keyup(function(){
  txt=$("input").val();
  $.post("demo_ajax_gethint.asp",{suggest:txt},function(result){
    $("span").html(result);
  });
});
</script>