<?php
include 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM employees");
$data = $result->fetch_all(MYSQLI_ASSOC);

$specific_employees = mysqli_query($conn, "SELECT fname, lname FROM employees WHERE start_year BETWEEN 2006 AND 2009");
$data_spec_empl = $specific_employees->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>MySQL - Ovn1</title>
</head>

<body>

  <?php
  for ($i = 0; $i < count($data_spec_empl); $i++) {
  ?>
    <ul>
      <li>Förnamn: <?php echo $data_spec_empl[$i]['fname']; ?></li>
      <li>Efternamn: <?php echo $data_spec_empl[$i]['lname']; ?></li>
    </ul>
  <?php
  }
  ?>

  <table>
    <tr>
      <th>id</th>
      <th>fname</th>
      <th>lname</th>
      <th>title</th>
      <th>start_year</th>
      <th>phone</th>
      <th>email</th>
      <th>street_address</th>
      <th>postal_code</th>
      <th>city</th>
    </tr>

    <?php foreach ($data as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['fname']) ?></td>
        <td><?= htmlspecialchars($row['lname']) ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['start_year']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['street_address']) ?></td>
        <td><?= htmlspecialchars($row['postal_code']) ?></td>
        <td><?= htmlspecialchars($row['city']) ?></td>
      </tr>
    <?php endforeach ?>

  </table>

</body>

</html>
