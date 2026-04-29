<!-- DELETE -->
<section id="delete" class="content">
    <h2>Delete Student</h2>
    <form method="post" action="">
        <input type="number" name="id" placeholder="Student ID">
        <button type="submit" name="delete">Delete</button>
    </form>
    <?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM students WHERE id=$id";
        if($conn->query($sql)){
            echo "<p>Record deleted!</p>";
        }
    }
    ?>
</section>
