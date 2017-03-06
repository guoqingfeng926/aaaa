<?php
session_start();
echo '{"adminName":"'.$_SESSION['adminName'].'",'.'"adminAuth":"'.$_SESSION['adminAuth'].'",'.'"adminFace":"'.$_SESSION['adminFace'].'"}';

?>