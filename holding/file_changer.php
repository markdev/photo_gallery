<?php

echo fileowner('file_permissions.php');
echo "<br/>";

echo decoct(fileperms('file_permissions.php'));
echo "<br/>";

chmod('file_permissions.php', 0444);
echo decoct(fileperms('file_permissions.php'));
echo "<br/>";

echo is_readable('file_permissions.php') ? 'yes' : 'no';
echo "<br/>";
echo is_writable('file_permissions.php') ? 'yes' : 'no';
echo "<br/>";
?>
