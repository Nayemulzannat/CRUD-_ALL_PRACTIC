<?php
include 'Database.php';

?>
<?php
$id = $_GET['id'];
$database = new Database();
$pram = "SELECT * FROM emplyee where id=$id";
$getdata = $database->show($pram)->fetch_assoc();
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
        $param = " UPDATE emplyee
        SET
        NAME ='$name',
        AGE ='$age',
        ADDRESS = '$address',
        SALARY = '$salary'
        where id=$id;
        ";


        $update = $database->update($param);

        // var_dump('<pre>', $create);
        // die();
    }
}

?>
<?php
if (isset($_POST['delete'])) {
    $param = "DELETE FROM emplyee where id=$id";
    $deleteData = $database->delete($param);
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
            <form action="update.php ?id=<?php echo $id; ?>" method="post">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php echo $getdata['NAME'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" value="<?php echo $getdata['AGE'] ?>"></td>
                    </tr>
                    <br>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $getdata['ADDRESS'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td><input type="text" name="salary" value="<?php echo $getdata['SALARY'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Update">
                            <input type="submit" name="delete" value="delete">
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