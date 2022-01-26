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
    <title>글수정</title>
</head>
<body>
    <h1>수정하기</h1>
    <?php
    if($row = mysqli_fetch_array($result)){

    ?>
    <form action="insert_update.php" method="post">
        <input type="hidden" name="number" value="<?= $view_num ?>">
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>">
        </p>
        <p>
            <label for="message">메세지:</label>
            <textarea name="message" id="message" cols="30" rows="10"><?= $row['message'] ?></textarea>
        </p>
        <input type="submit" value="글쓰기">
    </form>
    <?php } 
        mysqli_close($conn);
    ?>
</body>
</html>