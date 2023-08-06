<!DOCTYPE html>
<html>

<head>
    <title>ٍSearchStd</title>
    <style>

        input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border: 3px solid #ccc;
            border-radius: 5px;
            width: 90%;
        }

        button[type="submit"] {
            padding: 5px 10px;
            font-size: 16px;
            background-color:#ddd;
            color: black;
            border:#000;
            border-radius: 15px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color:#ccc;
            color:#000;
        }
    </style>
</head>

<body>

<form method="post" action="">

<input class="form-control mr-sm-2 ml-15" type="text" id="search" name="search" placeholder="Search" required>
<a name="Search"  href="searchStd.php" class="nav-link"><button  type="submit" class="btn btn-secondary my-2 my-sm-0 ml-4">Search</button></a>
</form>


    <?php
    if (isset($_POST['search'])) {
        $searchChar = $_POST['search'];

        require "config/openDB.php";
    //    $sql = "SELECT STDNO, FNAME, LNAME, EMAIL, MOBILE, DOB, MAJOR, ADDRESS, m.name , m.ID FROM students_tb s , majors_tb m WHERE s.MAJOR = m.id AND FNAME LIKE '$searchChar%; ";

       $sql = "SELECT STDNO, FNAME, LNAME, EMAIL, MOBILE, DOB, MAJOR, ADDRESS, m.name as majorName , m.ID FROM students_tb s , majors_tb m WHERE s.MAJOR = m.id AND FNAME LIKE '$searchChar%'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>" . $searchChar . ":</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>STDNO</th>";
            echo "<th>FNAME</th>";
            echo "<th>LNAME</th>";
            echo "<th>EMAIL</th>";
            echo "<th>MOBILE</th>";
            echo "<th>DOB</th>";
            echo "<th>MAJOR</th>";
            echo "<th>ADDRESS</th>";
            echo "</tr>";

            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' .   $i . '</td>';
                echo '<td>' . $row["FNAME"] . '</td>';
                echo '<td>' . $row["LNAME"] . '</td>';
                echo '<td>' . $row["EMAIL"] . '</td>';
                echo '<td>' . $row["MOBILE"] . '</td>';
                echo '<td>' . $row["DOB"] . '</td>';
                echo '<td>' . $row["majorName"] . '</td>';
                echo '<td>' . $row["ADDRESS"] . '</td>';
                echo '</tr>';
                 $i++; 
            }

            echo "</table>";
        } else {
            echo "<p>No data.</p>";
        }

        mysqli_close($conn);
    }
    ?>
    <!-- <a href="adminStudents.php" class="btn" style="width:auto; text-decoration:none;">StdPage</a> -->

</body>

</html>