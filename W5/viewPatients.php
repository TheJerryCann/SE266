<?php
include (__DIR__ . '/model_patients.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $result = deletePatient($id);

        if ($result === 'Data Deleted') {
            header("Location: viewPatients.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Week4 Patients</title>
</head>

<body>
    <h2>Patients</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Married</th>
            <th>Birth Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $p):
        ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['fname']; ?></td>
            <td><?php echo $p['lname']; ?></td>
            <td><?php echo $p['married']; ?></td>
            <td><?php echo $p['bday']; ?></td>
            <td><a href=
            <td><a href="editPatients.php?id=<?php echo $p['id']; ?>">Edit</a></td>
            <td>
                <form method="post" action="viewPatients.php">
                    <input type="hidden" name="delete" value="<?php echo $p['id']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="patientForm.php">Add Patient</a>
</body>
</html>
