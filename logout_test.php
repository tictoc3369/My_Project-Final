<?php
session_start();
session_destroy();
?>
<script>
    alert("로그아웃되었습니다.");
    location.replace('login_test.html');
</script>