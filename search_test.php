<?php
session_start()
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>사용자 정보조회</title>
  </head>
  <body>
    <p>사용자 정보조회</p>
    <form method="GET" action="search_test.php">
      <input type="text" name="keyword" placeholder="검색어를 입력하세요" autocomplete="off" size="100">
      <input type="submit" value="검색"><br><br>
      <input type="button" value="로그아웃" onclick="location.href='logout_test.php'">
    </form>
<?php

  if(!empty($_SESSION['id'])) {
    echo "Login ID : ".$_SESSION['id']."<br><br>"; //로그인ID를 노출
} else {
    echo "<script>alert('로그인 정보가 없습니다.')</script>";  
    echo "<script>location.href='login_test.html'</script>"; //로그인정보가없으면 경고문 출력 후 로그인페이지로 이동
};

  if(empty($_GET['keyword'])) {
    echo die("검색어를 입력하세요");
};
  
  $keyword = $_GET['keyword'];
  
  $db_connect=mysqli_connect('localhost', 'root', '1234', 'test') or die("DB Connect Fail");

  $sql = "select * from member where id = '$keyword'";

  $result = mysqli_query($db_connect, $sql);
  
  if(mysqli_num_rows($result) > 0)
 {
  $table = '
  <table border=1>
    <tr>
      <th>아이디</th>
      <th>비밀번호</th>
      <th>이름</th>
    </tr>';
  while($row = mysqli_fetch_array($result)) {
   $table .= '
    <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["pw"].'</td>
      <td>'.$row["name"].'</td>
    </tr>';
  }
  $table .= '</table>';
  echo $table;
 };
?>
 </body>
</html>
<!-- https://www.delftstack.com/ko/howto/php/create-table-php/  -->
<!-- ↑참고한사이트 --><!-- 작성날짜 2022/07/23 -->