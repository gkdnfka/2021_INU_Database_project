<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View members</title>
</head>
<body align="center">
    <table align="center" border="1">
        <tr><td colspan="6"><h4>회원 명부</h4></td></tr>
        <tr><td>ID</td><td>나이</td><td>가입연도</td><td>이름</td></tr>
        <?php
            $sql = "SELECT * FROM person";
            $res = mysqli_query($con, $sql);

            if($res) {
                while($row = mysqli_fetch_array($res)) {
                    $pid = $row['id'];
                    $age = $row['age'];
                    $year = $row['join_year'];
                    $name = $row['pname'];
          
        ?>
            <tr>
                <td><?php echo $pid; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $year; ?></td>
                <td><?php echo $name; ?></td>
                <td><a href="./member_fix.php?id=<?php echo $pid; ?>">수정하기</a></td>
                <td><a href="./member_del.php?id=<?php echo $pid; ?>">삭제하기</a></td>
                
            </tr>
        <?php
                }
            }
            else {
                echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
                echo "<script> location.href = \"../htmls/main_page.html\" </script>";
            }
        ?>
    </table>

    <br><br>
    <a href="../htmls/main_page.html">메인 페이지</a>
</body>
</html>