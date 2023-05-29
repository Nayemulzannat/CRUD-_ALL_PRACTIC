<?php
include 'Database.php';

?>
<?php
$database = new Database();
if (isset($_POST['submit'])) {
    // var_dump('<pre>', $_POST);
    // die();
    $name = $database->connected->real_escape_string($_REQUEST['name']);
    $age = $database->connected->real_escape_string($_REQUEST['age']);
    $address = $database->connected->real_escape_string($_REQUEST['address']);
    $salary = $database->connected->real_escape_string($_REQUEST['salary']);

    // var_dump($name,  $age, $address, $salary);
    // die();


    if (empty($name) || empty($age) || empty($address) || empty($salary)) {
        $error = "Field must not be empty!!";
    } else {
        $param = "INSERT INTO  emplyee(NAME,AGE,ADDRESS,SALARY)
        values('$name','$age','$address','$salary')";
        
        $create = $database->create($param);

        // var_dump('<pre>', $create);
        // die();
    }
}

?>


<!doctype html>
<html>

<head>
    <title>PHP OOP CRUD</title>
    <link rel="stylesheet" href="style.css">
    <!-- css style -->

</head>

<body>
    <div class="phpcoding">
        <section class="headeroption">
            <h2><?php echo "CRUD Using OOP PHP and MYSQLi"; ?></h2>

            <!-- table data -->
            <?php
            if (isset($error)) {
                echo "<span style='color:red'>" . $error . "</span>";
            }
            ?>
            <form action="create.php" method="post">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" placeholder="Pleace Enter your name..."></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" placeholder="Pleace Enter your name..."></td>
                    </tr>
                    <br>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" placeholder="Pleace Enter your name..."></td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td><input type="text" name="salary" placeholder="Pleace Enter your name..."></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Update">
                            <input type="reset" value="cancel">
                        </td>
                    </tr>
                </table>
            </form>

            <a href="index.php">Go Back</a>


        </section>
        <section class="maincontent">
        </section>
        <section class="footeroption">
            <p>© <?php echo date("Y"); ?> MD Zannatun Nayem</p>
            <h2><?php echo "nayemtp@gmail.com"; ?></h2>
        </section>
    </div>
</body>

</html>