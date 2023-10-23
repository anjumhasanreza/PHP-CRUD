<?php
$filePath = "./database/db.txt";

// $allStudents = "";
if (file_exists($filePath) && is_readable($filePath)) {
    $allStudents = json_decode(file_get_contents($filePath), true);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
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
            <div class="col-md-1 col-sm-0"></div>
            <div class="col-md-10 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tenant Information</h4>
                    </div>
                    <div class="card-header bg-dark">
                        <a href="create.php" class="btn success">Add Tenant</a>
                        <input type="text" style="float:right; width:300px; height:55px; font-size:20px" placeholder="Search..">
                    </div>
                    <div class="card-body bg-success">
                        <table class="table  text-white">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Sl</th>
                                    <!-- <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Mobile</th>
                                    <th scope="col" class="text-center">NID</th>
                                    <th scope="col" class="text-center">Gender</th>
                                    <th scope="col" class="text-center">Age</th>
                                    <th scope="col" class="text-center">Class</th>
                                    <th scope="col" class="text-center">Roll</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allStudents as $student) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $student['id']; ?></td>
                                        <!-- <td><?php echo $student['fname']; ?></td>
                                        <td><?php echo $student['mname']; ?></td>
                                        <td><?php echo $student['lname']; ?></td> -->
                                        <td><?php echo $student['fname'] . " " . $student['mname'] . " " . $student['lname']; ?></td>
                                        <td><?php echo $student['email']; ?></td>
                                        <td class="text-center"><?php echo $student['mobile']; ?></td>
                                        <td class="text-center"><?php echo $student['nid']; ?></td>
                                        <td class="text-center"><?php echo $student['gender']; ?></td>
                                        <td class="text-center"><?php echo $student['age']; ?></td>
                                        <td class="text-center"><?php echo $student['class']; ?></td>
                                        <td class="text-center"><?php echo $student['roll']; ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn info">View</a>
                                            <a href="#" class="btn warning">Edit</a>
                                            <a href="#" class="btn danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>