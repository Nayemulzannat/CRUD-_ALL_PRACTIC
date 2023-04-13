<?php
include 'database.php';




$obj = new Database();
$query = "SELECT * FROM student";
$read = $obj->select($query);
// var_dump('<pre>',$obj);
?>
<?php
if (isset($_GET['sms'])) {
    echo "<span style='color:red'>" . $_GET['sms'] . "</span>";
}
// var_dump('<pre>', $_GET);
// die();
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
                    <th width="10%">Serial</th>
                    <th width="35%">student_name</th>
                    <th width="25%">Age</th>
                    <th width="15%">city</th>
                    <th width="15%">Action</th>
                </tr>


                <?php if ($read) { ?>
                <?php while ($row = $read->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>"> Edit</a></td>
                </tr>

                <?php } ?>
                <?php } else { ?>
                <p>Data is not available !!</p>
                <?php } ?>


            </table>
            <a href="create.php">create</a>


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