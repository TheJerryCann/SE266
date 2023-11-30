<?php
include (__DIR__ . '/model_patients.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
else {
    $patients = getPatients();
}

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

if (isset($_POST['searchButton'])) {
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $married = filter_input(INPUT_POST, 'married');
}
else{
    $fname = '';
    $lname = '';
    $married = '';
}

$patients = searchPatients($fname, $lname, $married);
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
<form method="post">
        <label>First Name:</label>
        <input type="text" name="fname" />

        <label>Last Name:</label>
        <input type="text" name="lname" />

        <label for="married">Are They Single?:</label>
        <input type="checkbox" name="married" >
        <input type="submit" name="searchButton" value="Search" /><br><br>
    </form>
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
<a href="viewPatients.php">Reset</a>
<a href="logoff.php">Logoff</a>
</body>
</html>
