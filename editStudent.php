<?php
    require "config/openDB.php";

    //استقبال البيانات من صفحة عرض الطلاب للتعديل
    //يتم اخضار بيانات الطالب حسب رقم المفتاح الاساسي المرسل عبر قيت
    if(isset($_GET['updateStudent'])){
        $id = $_GET['updateStdNo'];

        $qry = "SELECT * FROM students_tb WHERE stdNo = '$id'; ";
        $result = mysqli_query($conn, $qry);
        // $stdUpdate = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $stdUpdate = mysqli_fetch_array($result);

        // mysqli_free_result($result);
        // mysqli_close($conn);
        
    } 
    
    //عند الضغط علي زر تعديل البيانات 
    //بتم عمل جملة تعديل علي قاعدة البيانات
    if(isset($_POST['editStudent'])){
        $stdNo = $_POST['STDNO'];
        $fname = $_POST['FNAME'];
        $lname = $_POST['LNAME'];
        $email = $_POST['EMAIL'];
        $mobile = $_POST['MOBILE'];
        $dob = $_POST['DOB'];
        $major = $_POST['MAJOR'];
        $address = $_POST['ADDRESS'];

        $qry = "UPDATE students_tb SET FNAME='$fname', LNAME='$lname', EMAIL='$email', MOBILE='$mobile', DOB='$dob', MAJOR='$major', ADDRESS='$address' WHERE STDNO='$stdNo'";        $result = mysqli_query($conn, $qry);
        // $cnt = mysqli_fetch_rows($conn);
        if($result){
            header('Location:adminStudents.php');
            exit();
        } else{
            echo $qry;
            echo mysqli_error($conn);
        }

        mysqli_close($conn);
    }

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
                <li class="nav-item"><a class="nav-link">About</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 ml-15" type="text" placeholder="Search" />
                <a class="p-cart">
                    <span class="material-icons md-48 ">shopping_cart</span>
                    <span class="badge badge-light bg-secondary">4</span>
                </a>
                <button class="btn btn-secondary my-2 my-sm-0 ml-4">Sign up</button>
                <button class="btn btn-secondary my-2 my-sm-0 ml-2">Login</button>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Student</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="FName" class="col-4 col-form-label">FName</label>
                                <div class="col-8">
                                
                                    <input id="FName" name="FNAME" value="<?php echo $stdUpdate['FNAME']; ?>" placeholder="FName" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="LName" class="col-4 col-form-label">LName</label>
                                <div class="col-8">
                                    <input id="LName" name="LNAME" value="<?php echo $stdUpdate['LNAME']; ?>"  placeholder="LName" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input id="Email" name="EMAIL" value="<?php echo $stdUpdate['EMAIL']; ?>"  placeholder="Email" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Mobile" class="col-4 col-form-label">Mobile</label>
                                <div class="col-8">
                                    <input id="Mobile" name="MOBILE" value="<?php echo $stdUpdate['MOBILE']; ?>"  placeholder="Mobile" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="DOB" class="col-4 col-form-label">DOB</label>
                                <div class="col-8">
                                    <input id="DOB" name="DOB" value="<?php echo $stdUpdate['DOB']; ?>"  placeholder="DOB" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Major" class="col-4 col-form-label">Major</label>
                                <div class="col-8">
                                  
                                    <!-- الكود الخاص باختيار القيمة من القائمة المنسدلة حسب القيمة التي في قاعدة البيانات -->
                                    <select id="Major" name="MAJOR"  placeholder="price" class="form-control here">
                                        <?php 
                                            include "config/openDB.php";
                                            

                                            $qry = "SELECT * FROM majors_tb;";
                                            $result = mysqli_query($conn, $qry);
                                            $cnt = mysqli_num_rows($result);
                                            for($i=0; $i<$cnt; $i++){
                                                $row = mysqli_fetch_array($result);
                                                if ($row['id'] ==  $stdUpdate['MAJOR']){
                                                    echo "<option selected='selected'  value='" .  $row['id'] . "'>" .  $row['NAME'] . "</option>";

                                                }else{
                                                    echo "<option value='" .  $row['id'] . "'>" .  $row['NAME'] . "</option>";
                                                } 
                                            }
                                        ?>
                                    </select>


                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Address" class="col-4 col-form-label">Address</label>
                                <div class="col-8">
                                    <input id="Address" name="ADDRESS" value="<?php echo $stdUpdate['ADDRESS']; ?>"  placeholder="Address" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please name is required.</div>
                                </div>
                            </div>




                            
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="editStudent" value="editStudent" type="submit" class="btn btn-primary">
                                        Edit 
                                    </button>
                                    <input type="hidden" name="STDNO" value="<?php echo $stdUpdate['STDNO']; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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