<?php
include 'database.php';

$database = new Database();
if (isset($_POST['submit'])) {
    // var_dump('<pre>', $_REQUEST);
    // die();
    // $id = mysqli_real_escape_string($obj->mysqli, $_POST['id']);
    // $student_name = mysqli_real_escape_string($obj->mysqli, $_POST['student_name']);
    $student_name = $database->mysqli->real_escape_string($_REQUEST['name']);
    $my_age = $database->mysqli->real_escape_string($_REQUEST['age']);
    $city = $database->mysqli->real_escape_string($_REQUEST['city']);

    // var_dump($student_name, $age, $city);
    // die();

    if (empty($student_name) || empty($my_age) || empty($city)) {
        $error = "Field must not be Empty !!";
    } else {
        $param = "INSERT INTO  student(student_name,age , city) 
         Values('$student_name', '$my_age', '$city')";

        $create = $database->insert($param);
        // var_dump('<pre>',  $create);
        // die();
    }
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
            <form action="./create.php" method="post">
                <table>

                    <tr>
                        <td>Student name</td>
                        <td>
                            <input type="text" name="name" placeholder="Please enter  name" />
                        </td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" placeholder="Please enter  Age" /></td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td><input type="text" name="city" placeholder="Please enter  city" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Update" />
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