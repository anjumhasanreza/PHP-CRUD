<?php
$fname = $mname = $lname = $email = $mobile = $nid = $gender = $age = $class = $roll = "";
$fnameErr = $mnameErr = $lnameErr = $emailErr = $mobileErr = $genderErr = $ageErr = $classErr = $rollErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
    } else {
        $fname  = test_input($_POST["fname"]);
    }

    if (empty($_POST["mName"])) {
        $mnameErr = "Middle name is required";
    } else {
        $mname  = test_input($_POST["mName"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
    } else {
        $lname  = test_input($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email  = test_input($_POST["email"]);
    }

    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile is required";
    } else {
        $mobile  = test_input($_POST["mobile"]);
    }

    if (empty($_POST["nid"])) {
        // $mobileErr = "Mobile is required";
    } else {
        $nid  = test_input($_POST["nid"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender  = test_input($_POST["gender"]);
    }

    // if (empty($_POST["age"])) {
    //     $ageErr = "Age is required";
    // } else {
    //     $age    = test_input($_POST["age"]);
    // }

    if (empty($_POST["class"])) {
        $classErr = "Class is required";
    } else {
        $class  = test_input($_POST["class"]);
    }

    if (empty($_POST["roll"])) {
        $rollErr = "Roll is required";
    } else {
        $roll   = test_input($_POST["roll"]);
    }


    $filePath = "./database/db.txt";
    if (!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($class) && !empty($roll)) {
        if (file_exists($filePath) && is_writable($filePath)) {

            $data = json_decode(file_get_contents($filePath), true) ?? [];

            $id = 0;
            for ($i = 0; $i <= count($data); $i++) {
                $id++;
            }

            $student = [
                'id'    => $id,
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'email' => $email,
                'mobile' => $mobile,
                'nid'   => $nid,
                'gender'  => $gender,
                'age'   => $age,
                'class' => $class,
                'roll'  => $roll,
            ];

            array_push($data, $student);
            file_put_contents($filePath, json_encode($data));
            header("location: index.php");
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .btn {
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Green */
        .success {
            border-color: #04AA6D;
            color: green;
        }

        .success:hover {
            background-color: #04AA6D;
            color: white;
        }

        /* Blue */
        .info {
            border-color: #2196F3;
            color: dodgerblue;
        }

        .info:hover {
            background: #2196F3;
            color: white;
        }

        /* Orange */
        .warning {
            border-color: #ff9800;
            color: orange;
        }

        .warning:hover {
            background: #ff9800;
            color: white;
        }

        /* Red */
        .danger {
            border-color: #f44336;
            color: red;
        }

        .danger:hover {
            background: #f44336;
            color: white;
        }

        /* Gray */
        .default {
            border-color: #e7e7e7;
            color: black;
        }

        .default:hover {
            background: #e7e7e7;
        }
    </style>




</head>

<body>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Add Student's Information</h2>
                    </div>
                    <div class="card-body">
                        <form class="g-3 m-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="fName" class="form-label">First Name <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="fname" class="form-control" id="fName">
                                    <span class="text-danger"><?php echo $fnameErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="mName" class="form-label">Middle Name <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="mName" class="form-control" id="mName">
                                    <span class="text-danger"><?php echo $mnameErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="lName" class="form-label">Last Name <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="lname" class="form-control" id="lName">
                                    <span class="text-danger"><?php echo $lnameErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="email" class="form-control" id="email">
                                    <span class="text-danger"><?php echo $emailErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="mobile" class="form-label">Mobile <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="mobile" class="form-control" id="mobile">
                                    <span class="text-danger"><?php echo $mobileErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="nid" class="form-label">NID</label>
                                    <input type="text" name="nid" class="form-control" id="nid">
                                    <!-- <span class="text-danger"><?php echo $mobileErr; ?></span> -->
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="ocupation" class="form-label">Ocupation <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="ocupation" class="form-control" id="ocupation">
                                    <!-- <span class="text-danger"><?php echo $ageErr; ?></span> -->
                                </div>
                                <div class="col col-lg-4 col-md-6 col-sm-12">
                                    <label for="gender">Gender <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <div class="mt-2">
                                        <select class="form-select" name="gender" aria-label="Default select example">
                                            <option selected disabled>Please Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <span class="text-danger"><?php echo $genderErr; ?></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="age" class="form-label">Age <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="age" class="form-control" id="age">
                                    <span class="text-danger"><?php echo $ageErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="studentClass" class="form-label">Class <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="class" class="form-control" id="studentClass">
                                    <span class="text-danger"><?php echo $classErr; ?></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="studentRoll" class="form-label">Roll <a class="text-danger" style="text-decoration:none">*</a></label>
                                    <input type="text" name="roll" class="form-control" id="studentRoll">
                                    <span class="text-danger"><?php echo $rollErr; ?></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4"></div>
                                <div class="col-4 d-grid">
                                    <button type="submit" class="btn success">Save</button>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>