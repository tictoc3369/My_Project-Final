<?php
session_start();
?>

<?php
    $db_connect = mysqli_connect('localhost','root','1234','test') or die ("DB Connect Fail");

    $id=$_POST['id']; 
    $pw=$_POST['pw'];

    $sql = "select * from admin_info where admin_id = '$id' and admin_pw = sha1('$pw')";

    $result = $db_connect->query($sql);

    if ($result-> num_rows > 0 ) {
        $_SESSION["id"] = $id; // 로그인 성공한 사용자의 ID를 기억
        echo "<script>alert('로그인 성공')</script>";
        echo "<script>location.href= 'search_test.php'</script>";
	}else{  // 로그인 실패
        echo "<script>alert('로그인 실패')</script>";
        echo "<script>location.href='login_test.html'</script>";
    };
?>

<!-- https://m.blog.naver.com/scyan2011/222010827871 --> 
<!-- 참고한 사이트 -->