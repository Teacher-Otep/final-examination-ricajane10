<?php
include '../includes/db.php';


if(isset($_POST['delete'])){
    $id = $_POST['id'] ?? null;
    if($id){
        $sql = "DELETE FROM students WHERE id=" . intval($id);
        if($conn->query($sql)){
            echo "<p>Record deleted!</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <a href="#" onclick="showSection('home')">
            <img src="../images/logo.svg" id="logo" alt="Logo">
        </a>
        <h1>Student Management System</h1>
    </header>

    <div class="container">

        <button onclick="showSection('home')">🏠 Home</button>
        <button onclick="showSection('create')">➕ Create</button>
        <button onclick="showSection('information')">📋 Information</button>
        <button onclick="showSection('update')">✏️ Update</button>
        <button onclick="showSection('delete')">❌ Delete</button>

        
        <section id="home" class="content" style="display:block;">
            <h2>Welcome to the Student Management System</h2>
            <p>Select an option above to<br>manage student records.</p>
        </section>


        <section id="create" class="content">
            <h2>Insert New Student</h2>
            <form method="post" action="">
                <input type="text" name="surname" placeholder="Surname">
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="middlename" placeholder="Middle Name">
                <input type="text" name="address" placeholder="Address">
                <input type="number" name="contact_number" placeholder="Mobile Number">
                <button type="button" onclick="clearFields()">Clear Fields</button>
                <button type="submit" name="save">Save</button>
            </form>
            <?php
            if(isset($_POST['save'])){
                $surname    = $_POST['surname'] ?? '';
                $name       = $_POST['name'] ?? '';
                $middlename = $_POST['middlename'] ?? '';
                $address    = $_POST['address'] ?? '';
                $contact    = $_POST['contact_number'] ?? '';

                if(!empty($surname) && !empty($name)){
                    $sql = "INSERT INTO students (surname, name, middlename, address, contact_number) 
                            VALUES ('$surname', '$name', '$middlename', '$address', '$contact')";
                    if($conn->query($sql)){
                        echo "<div class='success'>Student saved successfully!</div>";
                    }
                } else {
                    echo "<div class='error'>Surname and Name are required!</div>";
                }
            }
            ?>
        </section>


        <section id="information" class="content">
            <h2>Student Information</h2>
            <?php
            $result = $conn->query("SELECT * FROM students");
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $surname    = $row['surname'] ?? '';
                    $name       = $row['name'] ?? '';
                    $middlename = $row['middlename'] ?? '';
                    $address    = $row['address'] ?? '';
                    $contact    = $row['contact_number'] ?? '';
                    $id         = $row['id'] ?? '';

                    echo "<div class='info-card'>
                            <h2>{$surname}, {$name} {$middlename}</h2>
                            <p><strong>ID:</strong> {$id}</p>
                            <p><strong>Address:</strong> {$address}</p>
                            <p><strong>Contact:</strong> {$contact}</p>
                          </div>";
                }
                echo "<p>Total Students: " . $result->num_rows . "</p>";
            } else {
                echo "<p>No Record Found</p>";
            }
            ?>
        </section>


        <section id="update" class="content">
            <h2>Update Student</h2>
            <form method="post" action="">
                <input type="number" name="id" placeholder="Student ID">
                <input type="text" name="name" placeholder="New Name">
                <input type="text" name="surname" placeholder="New Surname">
                <input type="text" name="middlename" placeholder="New Middle Name">
                <input type="text" name="address" placeholder="New Address">
                <input type="number" name="contact_number" placeholder="New Mobile Number">
                <button type="submit" name="update">Update</button>
            </form>
            <?php
            if(isset($_POST['update'])){
                $id         = $_POST['id'] ?? null;
                $name       = $_POST['name'] ?? '';
                $surname    = $_POST['surname'] ?? '';
                $middlename = $_POST['middlename'] ?? '';
                $address    = $_POST['address'] ?? '';
                $contact    = $_POST['contact_number'] ?? '';

                if($id){
                    $sql = "UPDATE students SET 
                            name='$name', 
                            surname='$surname', 
                            middlename='$middlename', 
                            address='$address', 
                            contact_number='$contact' 
                            WHERE id=" . intval($id);
                    if($conn->query($sql)){
                        echo "<p>Record updated!</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Please provide a valid Student ID.</p>";
                }
            }
            ?>
        </section>


        <section id="delete" class="content">
            <h2>Delete Student</h2>
            <form method="post" action="">
                <input type="number" name="id" placeholder="Student ID">
                <button type="submit" name="delete">Delete</button>
            </form>
        </section>
    </div>
</body>
</html>
