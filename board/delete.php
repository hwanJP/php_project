<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name+"viewport" content="width=device-width, initial-scale=1.0">
    <title>삭제 결과</title>
</head>
<body>
    <h1>게시판</h1>
    <h2>삭제 결과</h2>
    <ul>
    <?php
        $conn = mysqli_connect("localhost", "root", "fpl2021", "abc_corp");
        if(!$conn){
            echo 'DB에 연결하지 못했습니다.'.mysqli_connect_error();
        }else{
            echo 'DB에 접속했습니다.';
        }
        $user_delnum = $_POST['delnum'];

        $sql_del = "DELETE FROM msg_board WHERE number = $user_delnum";
        mysqli_query($conn, $sql_del);

        $sql = "SELECT * FROM msg_board";
        $result = mysqli_query($conn, $sql);
        $list = '';
        while($row = mysqli_fetch_array($result)){
            $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        }
        echo $list;
        mysqli_close($conn);
    ?>
    </ul>
    <p>
        <?php 
            echo $user_delnum.'번째 데이터가 삭제 되었습니다.';
        ?>
    </p>
    <p><a href='index.php'>메인화면으로 이동하기</a></p>
    
</body>
</html>