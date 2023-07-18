<?php

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if (isset($_POST['delete'])) {
    $userid = $_POST["userid"];
    $sql = "DELETE FROM user WHERE user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userid);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Successfully delete user</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting user</div>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM user";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    ?>
    <h2>List of all Users</h2>
    <table class='table table-bordered table-striped'>
    <tr>
         <td>Firstname</td>
         <td>Lastname</td>
         <td>Address</td>
         <td>Contact</td>
         <td width='70px'>Delete</td>
         <td width='70px'>Edit</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <form action='' method='POST'>
            <input type='hidden' name='userid' value='<?php echo $row["user_id"]; ?>' />
            <tr>
                <td><?php echo $row["firstname"]; ?></td>
                <td><?php echo $row["lastname"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["contact"]; ?></td>
                <td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>
                <td><a href='edit.php?id=<?php echo $row["user_id"]; ?>' class='btn btn-primary'>Edit</a></td>
            </tr>
        </form>
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "<br><br>No Record Found";
}

echo "</div>";

require_once 'footer.php';
?>
