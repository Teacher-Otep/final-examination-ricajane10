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
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $middlename = $_POST['middlename'];
        $address = $_POST['address'];
        $contact = $_POST['contact_number'];
        $sql = "INSERT INTO students (surname,name,middlename,address,contact_number) 
                VALUES ('$surname','$name','$middlename','$address','$contact')";
        if($conn->query($sql)){
            echo "<p>Student saved successfully!</p>";
        }
    }
    ?>
</section>
