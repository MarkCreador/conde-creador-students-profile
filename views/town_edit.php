<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the Student class file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data by ID from the database
    $db = new Database();
    $town = new TownCity($db);
    $townData = $town->read($id); // Implement the read method in the town_city.php class

    if ($townData) {
        // The student data is retrieved, and you can pre-fill the edit form with this data.
    } else {
        echo "Town city not found.";
    }
} else {
    echo "Town city ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'town_name' => $_POST['name'],
        
    ];

    $db = new Database();
    $town = new TownCity($db);

    // Call the edit method to update the town data
    if ($town->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Town</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit Town Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $townData['id']; ?>">
        
        <label for="first_name">Town City Name:</label>
        <input type="text" name="town_name" value="<?php echo $towntData['name']; ?>">
        
        
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
