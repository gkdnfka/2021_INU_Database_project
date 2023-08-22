<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join to exer</title>
</head>
<body >

    <form action="joinex_process.php" method="post" align="center">
        <table border="1">
            <tr><td colspan = "2"><h3>운동 날짜 선택</h3></td></tr>
            <tr><td></td><td>날짜</td></tr>
            <?php
                $sql = "SELECT * FROM exer_log";
                $res = mysqli_query($con, $sql);

                if($res) {
                    while($row = mysqli_fetch_array($res)) {
                        $date = $row['exer_day'];
                        echo "<tr><td><input type=\"radio\" name=\"date\" value=\"".$date."\"></td>";
                        echo "<td>".$date."</td></tr>";
                    }
                }

                else {
                    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
                    echo "<script> location.href = \"../htmls/main_page.html\" </script>";
                }
            ?>
        </table>
        <br><br>
        
        <table>
            <tr><td colspan="2"><h3>운동 부원 선택</h3></td></tr>
            <tr><td></td><td>이름</td></tr>
            <?php
                $sql = "SELECT * FROM person";
                $res = mysqli_query($con, $sql);

                if($res) {
                    while($row = mysqli_fetch_array($res)) {
                        $pid = $row['id'];
                        $name = $row['pname'];

                        echo "<tr><td><input type=\"checkbox\" name=\"exer_pid[]\" value=\"".$pid."\"></td>";
                        echo "<td>".$name."</td></tr>";
                    }
                }

                else {
                    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
                    echo "<script> location.href = \"../htmls/main_page.html\" </script>";
                }
            ?>
        </table>
        <input type="submit" value="선택 완료">
    </form>
    <br><br>
    <a href="../htmls/main_page.html">메인 페이지</a>
</body>
</html>