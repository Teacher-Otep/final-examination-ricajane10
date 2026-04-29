<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Op<?php
include '../includes/db.php';

// DELETE logic muna para ma-update agad ang data
if(isset($_POST['delete'])){
    $id = $_POST['id'] ?? null;
    if($id){
        $sql = "DELETE FROM students WHERE id=$id";
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
            <img src="../image/logo.svg" id="logo" alt="Logo">
        </a>
        <h1>Student Management System</h1>
    </header>

    <div class="container">

        <button onclick="showSection('home')">🏠 Home</button>
        <button onclick="showSection('create')">➕ Create</button>
        <button onclick="showSection('information')">📋 Information</button>
        <button onclick="showSection('update')">✏️ Update</button>
        <button onclick="showSection('delete')">❌ Delete</button>

        <!-- HOME -->
        <section id="home" class="content" style="display:block;">
            <h2>Welcome to the Student Management System</h2>
            <p>Select an option above to<br>manage student records.</p>
        </section>

        <!-- CREATE -->
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

        <!-- INFORMATION -->
        <section id="information" class="content">
            <h2>Student Information</h2>
            <?php
            $result = $conn->query("SELECT * FROM students");
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    echo "<div class='info-card'>
                            <h2>{$row['surname']}, {$row['name']} {$row['middlename']}</h2>
                            <p><strong>ID:</strong> {$row['id']}</p>
                            <p><strong>Address:</strong> {$row['address']}</p>
                            <p><strong>Contact:</strong> {$row['contact_number']}</p>
                          </div>";
                }
                echo "<p>Total Students: " . $result->num_rows . "</p>";
            } else {
                echo "<p>No Record Found</p>";
            }
            ?>
        </section>

        <!-- UPDATE -->
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

                if($id && !empty($name) && !empty($surname)){
                    $sql = "UPDATE students 
                            SET name='$name', surname='$surname', middlename='$middlename', address='$address', contact_number='$contact' 
                            WHERE id=$id";
                    if($conn->query($sql)){
                        echo "<p>Record updated!</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Please fill in required fields (ID, Name, Surname).</p>";
                }
            }
            ?>
        </section>

        <!-- DELETE -->
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
erations</title>
    <link   rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/northhub.svg" id="logo"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" > Read </button>
            <button class="navbarbuttons" > Update </button>
            <button class="navbarbuttons" > Delete </button>
    </nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <form action="../includes/insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" required><br/>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" required><br/>

        <label for="middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="middlename" class="field"><br/>

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field"><br/>

        <label for="contact" class="label">Mobile Number</label>
        <input type="text" name="contact" id="contact" class="field"><br/>

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>

        <div id="success-toast" class="toast-hidden">
            Registration Successful!
        </div>
    </form>   

    </section>

<br/><br/><br/><br/>

    <section id="read" class="content"> View Students </section>
    <section id="update" class="content"> Update Student Records </section>
    <section id="delete" class="content"> Remove Student Records </section>



    <script src="script.js"></script>
</body>
</html>