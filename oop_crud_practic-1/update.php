<?php
include 'database.php';
$dataupdate = new Database();
$id = $_GET['id'];
$query = "SELECT * FROM student where id=$id";
$getdata = $dataupdate->select($query)->fetch_assoc();
// var_dump('<pre>',$obj);

if (isset($_POST['submit'])) {
    // var_dump('<pre>', $_REQUEST);
    // die();
    // $id = mysqli_real_escape_string($obj->mysqli, $_POST['id']);
    // $student_name = mysqli_real_escape_string($obj->mysqli, $_POST['student_name']);
    $student_name = $dataupdate->mysqli->real_escape_string($_REQUEST['name']);
    $my_age = $dataupdate->mysqli->real_escape_string($_REQUEST['age']);
    $city = $dataupdate->mysqli->real_escape_string($_REQUEST['city']);

    // var_dump($student_name, $age, $city);
    // die();

    if (empty($student_name) || empty($my_age) || empty($city)) {
        $error = "Field must not be Empty !!";
    } else {
        $param = "UPDATE student
        SET
       student_name  = '$student_name',
        age = '$my_age',
        city = '$city'
        WHERE id = $id";

        $update = $dataupdate->update($param);
        // var_dump('<pre>',  $create);
        // die();
    }
}

?>

<?php
if (isset($_POST['delete'])) {
    $param = "DELETE FROM student WHERE id=$id";
    $deleteData = $dataupdate->delete($param);
}
?>





<!doctype html>
<html>

<head>
    <title>PHP OOP CRUD</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="phpcoding">
        <section class="headeroption">
            <h2>
                <?php echo "CRUD Using OOP PHP and MYSQLi"; ?>
            </h2>

            <!-- table data -->
            <?php
            if (isset($error)) {
                echo "<span style='color:red'>" . $error . "</span>";
            }
            ?>
            <form action="update.php?id=<?php echo $id; ?>" method="post">
                <table>

                    <tr>
                        <td>Student name</td>
                        <td>
                            <input type="text" name="name" value="<?php echo $getdata['student_name']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" value="<?php echo $getdata['age']; ?>" /></td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td><input type="text" name="city" value="<?php echo $getdata['city']; ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Submit" />
                            <input type="submit" name="delete" value="delete" />
                            <input type="reset" Value="Cancel" />
                        </td>
                    </tr>

                </table>
            </form>
            <a href="index.php">Go Back</a>
        </section>
        <section class="maincontent">
        </section>
        <section class="footeroption">
            <p>©
                <?php echo date("Y"); ?> MD Zannatun Nayem
            </p>
            <h2>
                <?php echo "nayemtp@gmail.com"; ?>
            </h2>
        </section>
    </div>
</body>

</html>