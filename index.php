<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>The AK library</title>
  </head>
  <body>
  <nav>
      <div class="navbar">
        <h1>The Ak Library</h1>
        <!-- <a href="logout.php" id="logout-btn">Logout</a> -->
  <a href="view.php" class="view-records-link">View All Records</a>
      </div>
    </nav>
    <form action="getme.php" method="post" autocomplete="off">
      <h1>Enter Records</h1>
      <label for="name">Name</label>
      <input type="text" id="name" name="name" maxlength="20" minlength="4"
      required "><br /><br />
      <label for="bookID">Book ID:</label>
      <input type="text" id="bookID" required name="bookID" /><br /><br />
      <label for="date">Date Taken:</label>
      <input type="date" id="date" name="date" /><br /><br />
      <input type="submit" value="Submit" />
      <input type="reset" value="Reset" />
    </form>
    <script>
      //making the date default as today's date.
      var today = new Date().toISOString().substr(0, 10);
      document.getElementById("date").value = today;
    </script>
  </body>
</html>
