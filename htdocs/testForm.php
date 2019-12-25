<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>
<style>
    select {
        width: 1000px;
    }
</style>
<form>
    <select multiple="multiple">   
        <option value="1">Test1</option>
        <option value="2">Test2</option>
        <option value="3">Test3</option>
        <option value="4">Test4</option>
    </select>
</form>

<script>
$("select").change(()=>console.log($("select").val()));

</script>