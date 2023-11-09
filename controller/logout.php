<?php
session_unset();
session_destroy();
header("Location: http://localhost/index.php?page=login");
exit;
?>