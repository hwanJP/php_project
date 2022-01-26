<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name+"viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "fpl2021", "abc_corp");
if(!$conn){
    echo 'DB에 연결하지 못했습니다.'.mysqli_connect_error();
}else{
    echo 'DB에 접속했습니다.';
}
$user_name = $_POST['name'];
$user_msg = $_POST['message'];

$sql = "INSERT INTO msg_board (name, message) VALUES ('$user_name', '$user_msg')";

$result = mysqli_query($conn, $sql);
if($result == false){
    echo '저장하지 못했습니다';
    error_log(mysqli_error($conn));
}else{
    echo '저장 성공';
}
mysqli_close($conn);
print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";
?>

</body>
</html>