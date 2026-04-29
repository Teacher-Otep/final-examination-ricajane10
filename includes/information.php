<!-- READ -->
<section id="infomation" class="content">
    <h2>All Students</h2>
    <?php
    $result = $conn->query("SELECT * FROM students");
    echo "<table><tr><th>ID</th><th>Surname</th><th>Name</th><th>Middle</th><th>Address</th><th>Contact</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>{$row['id']}</td><td>{$row['surname']}</td><td>{$row['name']}</td><td>{$row['middlename']}</td><td>{$row['address']}</td><td>{$row['contact_number']}</td></tr>";
    }
    echo "</table>";
    ?>
</section>
