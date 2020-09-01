<script type="text/javascript">
    function test()
        {
         var t1=3;
         t1 = t1+2;
         alert(t1);
         //return t1;
        }
</script>

<?php
        echo "<script type='text/javascript'>test();</script>";
?>