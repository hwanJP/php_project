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
$number = $_POST['number'];
$user_name = $_POST['name'];
$user_msg = $_POST['message'];

$sql = "UPDATE msg_board SET name = '$user_name', message = '$user_msg' WHERE '$number'";

$result = mysqli_query($conn, $sql);
if($result == false){
    echo '수정하지 못했습니다';
    error_log(mysqli_error($conn));
}else{
    echo '수정 성공';
}
mysqli_close($conn);
print "<hr/><a href='index.php'>메인화면으로 이동하기</a>";
?>

</body>
</html>