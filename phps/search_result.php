<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted");

$name = $_POST["name"];
$sql = "SELECT * FROM exer_mem where p_id= (SELECT id FROM person where pname = '".$name."');";
$res = mysqli_query($con, $sql);

if($res) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search result</title>
</head>
<body>
    <table>
        <tr><td><?php echo $name;?>이/가 참여한 운동입니다.</td></tr>
        <?php
        while($row = mysqli_fetch_array($res)) {
        ?>
        <tr><td><a href="./log_detail"><a href="./log_detail.php?date=<?php echo $row['exer_day'];?>"><?php echo $row['exer_day'];?></a></a></td></tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <a href="../htmls/search_person.html">검색화면으로</a>
</body>
</html>

<?php
}
else {
    //echo "실패 원인 :".mysqli_error($con);
    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    echo "<script> location.href = \"../htmls/main_page.html\" </script>";
}
?>