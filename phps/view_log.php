<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
$sql = "SELECT * FROM  exer_log";
$res = mysqli_query($con, $sql);

if($res) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log List</title>
</head>
<body align="center">
    <table align="center">
        <tr><td colspan="2"><h4>운동 일자</h4></td></tr>
        <tr><td colspan="2">날짜 클릭시 상세한 기록을 볼 수 있습니다.</td></tr>
        <?php
            while($row = mysqli_fetch_array($res)) {
                $date = $row['exer_day'];
        ?>
        <tr>
            <td><a href="/log_detail.php?date=<?php echo $date;?>"><?php echo $date;?></a></td>
            <td><a href="./log_del.php?date=<?php echo $date;?>">삭제하기</a></td>
        </tr>
        <?php
            }
        ?>
    </table> 
    <br><br>
    <a href="../htmls/main_page.html">메인 페이지</a>
</body>
</html>

<?php
}
else {
    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    echo "<script> location.href = \"../htmls/main_page.html\" </script>";
}
?>