<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
$sql = "SELECT * FROM  exer_log where exer_day='".$_GET['date']."';";
$res = mysqli_query($con, $sql);

if($res){
    $row = mysqli_fetch_array($res);
    $content = $row['log'];
    $title = $row['title'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Write</title>
</head>
<body align="center">
    <form action="log_fix_pro.php" method="post">
        운동 일자 : <input type="date" name="exer_date" value="<?php echo $_GET['date'];?>" readonly> <br><br>
        제목 : <input type="text" name="title" value="<?php echo $title;?>" > <br><br>
        내용 : <br>
        <input type="text" name="content" value="<?php echo $content;?>" style="height: 300px; width: 500px;"><br><br>

        <table align="center"  border="1">
        <tr><td colspan="5">운동 인원</td></tr>
        <tr><td>삭제여부</td><td>ID</td><td>나이</td><td>가입연도</td><td>이름</td></tr>
        <?php
            
            $sql2 = "SELECT * FROM exer_mem where exer_day='".$_GET['date']."'";
        
            $res2 = mysqli_query($con, $sql2);
            if($res2) {   
                while( $row2 = mysqli_fetch_array($res2)) {
                    $sql = "SELECT * FROM person where id='".$row2['p_id']."';";                   
                    $res3 = mysqli_query($con, $sql);

                    while($row3 = mysqli_fetch_array($res3)) {
                        $pid = $row3['id'];
                        $age = $row3['age'];
                        $year = $row3['join_year'];
                        $name = $row3['pname'];
        ?> 
                    <tr>
                        <td><input type="checkbox" name="del_id[]" value="<?php echo $pid;?>"></td>
                        <td><?php echo $pid;?></td>
                        <td><?php echo $age;?></td>
                        <td><?php echo $year;?></td>
                        <td><?php echo $name;?></td>
                    </tr>
        <?php
                    }
                }
            }
            else {
                echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
                echo "<script> location.href = \"../htmls/main_page.html\" </script>";
                //echo "실패 원인 :".mysqli_error($con);
            }
        ?>

    </table>
        <br>
        <input type="submit" value="수정하기">
        <br><br>
        <a href="../htmls/main_page.html">메인 페이지</a>
    </form>
    
</body>
</html>

<?php
}
else {
    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    echo "<script> location.href = \"./main_page.html\" </script>";
}
?>