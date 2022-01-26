<?php
        $conn = mysqli_connect("localhost", "root", "fpl2021", "abc_corp");
        if(!$conn){
            echo 'DB에 연결하지 못했습니다.'.mysqli_connect_error();
        }else{
            echo 'DB에 접속했습니다.';
        }
        $view_num = $_GET['number'];
        $sql = "SELECT * FROM msg_board WHERE number = $view_num";
        $result = mysqli_query($conn, $sql);
        
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name+"viewport" content="width=device-width, initial-scale=1.0">
    <title>view - abc 게시판</title>
</head>
<body>
    <h1>게시판</h1>
    <h1>글내용</h1>
    <?php
    if($row = mysqli_fetch_array($result)){

    ?>
    <h3>글번호: <?=$row['number']?>/ 글쓴이: <?=$row['name'] ?></h3>
    <div>
        <?= $row['message']?>
    </div>
    <?php } ?>
    <p><a href='index.php'>메인화면으로 이동하기</a></p>
    <p><a href="update.php?number=<?= $row['number'] ?>">수정하기</a></p>
</body>
</html>