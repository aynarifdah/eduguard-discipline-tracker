<?php
session_start(); 
session_unset(); 
session_destroy(); 

echo "<script>
    alert('Anda Yakin ingin logout?');
    window.location.href = 'login.php';
</script>";
exit;

?>
