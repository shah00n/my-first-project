<?php
    // include "config/openDB.php";
    require "config/openDB.php";


    if(isset($_GET['updateStudent'])){
        $id = $_GET['updateStdNo'];
        $qry = "SELECT * FROM students_tb WHERE stdNo = '$id'; ";
        $result = mysqli_query($conn, $qry);
        $stdUpdate = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

     
    
    // $qry = "SELECT * FROM students_tb; ";
    $qry = "SELECT STDNO, FNAME, LNAME, EMAIL, MOBILE, DOB, MAJOR, ADDRESS, m.name as majorName , m.ID FROM students_tb s , majors_tb m WHERE s.MAJOR = m.id; ";
    $result = mysqli_query($conn, $qry);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);




     mysqli_free_result($result);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Title</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Maba</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    
                </li>
                <li class="nav-item"><a class="nav-link">Products</a></li>
                <li class="nav-item"><a class="nav-link">Users</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a name="Search" href="searchStd.php" class="nav-link">Search</a>
                <button class="btn btn-secondary my-2 my-sm-0 ml-4">Profile</button>
                <button class="btn btn-secondary my-2 my-sm-0 ml-2">LogOut</button>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">students</h1>
        <a href="addStudent.php"><button type="button" class="btn btn-success float-right">
            Add student
        </button></a>

        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STDNO</th>
                    <th scope="col">FName</th>
                    <th scope="col">LName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Major</th>
                    <th scope="col">Address</th>
                    
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                
                foreach($students as $std) {?>
                <tr>
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $std['FNAME']?> </td>
                    <td> <?php echo $std['LNAME']?> </td>
                    <td> <?php echo $std['EMAIL']?> </td>
                    <td> <?php echo $std['MOBILE']?> </td>
                    <td> <?php echo $std['DOB']?> </td>
                    <td> <?php echo $std['majorName']?> </td>
                    <td> <?php echo $std['ADDRESS']?> </td>
                    <td>
                         
                        <form action="editStudent.php" method="get">
                            <input type="hidden" name="updateStdNo" value="<?php echo $std['STDNO']?>">
                            <button class="btn btn-outline-primary" name="updateStudent" value="updateStudent">Edit</button>
                        </form>
                        
                        |

                        <form action="deleteStudent.php" method="get">
                            <input type="hidden" name="delStdNo" value="<?php echo $std['STDNO']?>">
                            <button class="btn btn-danger" name="deleteStudent" value="deleteStudent">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Maba</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>