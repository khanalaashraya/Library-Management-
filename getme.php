<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $bookID = $_POST["bookID"];
    $date = $_POST["date"];
    $sql = "INSERT INTO books (name, book_id, date_taken) VALUES ('$name', '$bookID', '$date')";
if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Record submitted successfully!');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

