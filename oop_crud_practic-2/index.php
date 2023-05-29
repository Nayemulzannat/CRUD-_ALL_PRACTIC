<?php
include 'Database.php';
$obj = new Database();


?>
<?php
$pram = "SELECT * FROM emplyee";
$read = $obj->show($pram);
// var_dump('<pre>', $_GET);
// die();
?>
<?php
if (isset($_GET['sms'])) {
    echo "<span style='color:red'>" . $_GET['sms'] . "</span>";
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
            <table class="tblone">
                <tr>
                    <th width="10%">NAME</th>
                    <th width="30%">NAME</th>
                    <th width="10%">AGE</th>
                    <th width="20%">ADDRESS </th>
                    <th width="15%">SALARY</th>
                    <th width="15%">Action</th>
                </tr>
                <?php if ($read) { ?>
                    <?php while ($data = $read->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['NAME'] ?></td>
                            <td><?php echo $data['AGE'] ?></td>
                            <td><?php echo $data['ADDRESS'] ?></td>
                            <td><?php echo $data['SALARY'] ?></td>
                            <td><a href="update.php?id=<?php echo urlencode($data['id']) ?>"> Edit</a></td>
                        </tr>


                    <?php } ?>
                <?php } else { ?>
                    <p>Data is not available !!</p>
                <?php } ?>


            </table>
            <a href="create.php">CREATE</a>


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