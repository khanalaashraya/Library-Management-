<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST["book_id"];
    $action = $_POST["action"];
    if ($action == "return") {
      $sql = "DELETE FROM books WHERE book_id = '$book_id'";
    } elseif ($action == "renew") {
        $sql = "UPDATE books SET date_taken = CURRENT_DATE() WHERE book_id = '$book_id'";
    }
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record updated successfully.')</script>.";
    } else {
        echo "Error updating record: ";
    }
}
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
//displaying data in tabular format
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Book ID</th><th>Date Taken</th><th>Expiry Date</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $book_id = $row["book_id"];
        $date_taken = $row["date_taken"];
        $expiry_date = date('Y-m-d', strtotime($row['date_taken'] . ' + 10 days'));
        echo "<tr><td>" . $row["name"] . "</td><td>" . $book_id . "</td><td>" . $date_taken . "</td><td>" . $expiry_date . "</td><td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='book_id' value='$book_id'>";
        echo "<select name='action'>";
        echo "<option value='return'>Book returned</option>";
        echo "<option value='renew'>Renew</option>";
        echo "</select>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        echo "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<br>No records found<br>";
}
?>
<a href="index.php" class="back-btn">Back</a>
<style>
table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}
table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}
table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.back-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.back-btn:hover {
    background-color: #3e8e41;
}
</style>

