<?php
// Retrieve the applications data from the session
$applications = isset($_SESSION['applications']) ? $_SESSION['applications'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>House Applications</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>House Applications</h1>
    <?php if (!empty($applications)): ?>
        <table>
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Relation Status</th>
                    <th>Occupation</th>
                    <th>Tenant Response</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['ApplicationId']); ?></td>
                        <td><?php echo htmlspecialchars($application['FullName']); ?></td>
                        <td><?php echo htmlspecialchars($application['Email']); ?></td>
                        <td><?php echo htmlspecialchars($application['gender']); ?></td>
                        <td><?php echo htmlspecialchars($application['relation_status']); ?></td>
                        <td><?php echo htmlspecialchars($application['occupation']); ?></td>
                        <td><?php echo htmlspecialchars($application['TenantResponse']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No applications found.</p>
    <?php endif; ?>
</body>
</html>

<?php
// Clear the applications data from the session
unset($_SESSION['applications']);
?>
