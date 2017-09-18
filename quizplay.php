<?php
session_start();
echo "topic chosen  : ".$_SESSION['topics-name'];
echo "<br/>";
echo "friend chosen : ".$_SESSION['friend'];
?>