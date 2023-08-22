<?php
$con = mysqli_connect("localhost", "id201701539", "pw201701539", "manage_exer") or die("disconneted"); 
$sql = "SELECT * FROM person where id='".$_GET['id']."'";
$res = mysqli_query($con, $sql);
if($res) {
    $row = mysqli_fetch_array($res);
    $age = $row['age'];
    $year = $row['join_year'];
    $name = $row['pname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join to Club</title>
</head>
<body>
    <form action="./fix_process.php" method="post">
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        이름 : <input type="text" name="name" value="<?php echo $name;?>"> <br>
        나이 : <input type="text" name="age" value="<?php echo $age;?>"> <br>
        가입 년도 : <input type="number" name="year" value="<?php echo $year;?>" min="2010" max="2021"> <br><br>

        <input type="submit" value="수정하기">
    </form>

    <a href="../htmls/main_page.html">메인 페이지로..</a>

</body>
</html>
<?php
}
else {
    echo "<script> alert(\"실패했습니다. 메인 페이지로 이동합니다.\") </script>";
    echo "<script> location.href = \"../htmls/main_page.html\" </script>";
}
?>