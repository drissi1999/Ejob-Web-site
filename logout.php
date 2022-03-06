<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

session_unset();

session_destroy();
header('Location: index.php');

?>

</body>
</html>