
<section id="update" class="content">
    <h2>Update Student</h2>
    <form method="post" action="">
        <input type="number" name="id" placeholder="Student ID">
        <input type="text" name="name" placeholder="New Name">
        <input type="text" name="surname" placeholder="New Surname">
        <button type="submit" name="update">Update</button>
    </form>
    <?php
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $sql = "UPDATE students SET name='$name', surname='$surname' WHERE id=$id";
        if($conn->query($sql)){
            echo "<p>Record updated!</p>";
        }
    }
    ?>
</section>
