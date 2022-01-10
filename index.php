<?php

require_once "./database/studentManager.php";

$students = Get();


if (isset($_GET['search'])) {
    $search_term = strip_tags($_GET['search']);
    $search_length = strlen($search_term);
    $search_term = strtolower($search_term);
    $search_term = explode(" ", $search_term);

    $search_item = array();
    foreach ($students as $key => $student) {
        $name = strtolower($student->name);

        for ($i = 0; $i < sizeof($search_term); $i += 1) {
            if ($search_term[$i] == "" || $search_term[$i] == " ") continue;
            if (strpos((string)$name, (string)($search_term[$i])) !== false) {
                array_push($search_item, $students[$key]);
            }
        }
    }
    if ($search_length != 0) {
        $students = $search_item;
    }
}
?>

<!DOCTYPE html>
<html style="background-color: #f5f5f5;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RU CSE Student Database</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="./controller.js"></script>
</head>

<body>

    <!--Navigation Bar-->
    <nav class="navbar" role="navigation" aria-label="main navigation" style="background-color:#435d7d;">
        <div class="navbar-brand">
            <a class="navbar-item" href="/index.php">
                <h1 class="title" style="margin-left: 100px; color: white;">RUCSE 25</h1>
            </a>
        </div>

        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <form action="/index.php" name="form" method="get">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text" placeholder="Find a student" name="search" id="search" style="border-radius: 0px; border: 0px;">
                            </div>
                            <div class="control">
                                <input class="button" type="submit" value="Search" style="background-color:lightblue; border:0px; border-radius: 0px;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="navbar-item" style="margin-right: 100px;">
                    <a class="navbar-item" href="/add.php">
                        <button class="button" style="background-color: #28a745; color: white; border-radius: 0px; border:0px;">
                            <span class="icon">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <span>Add New Student</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Group</th>
                    <th>Session</th>
                    <th>Student Type</th>
                    <th>Hometown</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($students as $key => $value) : ?>
                    <tr>
                        <td> <?php echo $key+1 ?> </td>
                        <td> <?php echo $value->name ?> </td>
                        <td> <?php echo $value->student_id ?> </td>
                        <td> <?php echo $value->gender ?> </td>
                        <td> <?php echo $value->email ?> </td>
                        <td> <?php echo $value->phone ?> </td>
                        <td style="text-align: center;"> <?php echo $value->blood_group ?> </td>
                        <td> <?php echo $value->session_year ?> </td>
                        <td> <?php echo $value->student_type ?> </td>
                        <td> <?php echo $value->hometown ?> </td>
                        <td>
                            <button onclick="openModal(<?php echo $value->id ?>)" class="button" style="background-color: #dc3545; color: white; border-radius: 0px; border:0px;" data-target="modal-js-example">
                                <span class="icon">
                                    <i class="fas fa-minus-circle"></i>
                                </span>
                                <span>Delete<span>
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="modal-js-example" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card" style="width:35%;">
            <section class="box" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <span class="title is-5">DELETE USER?</span>
                <span class="subtitle is-6">This action cannot be undone.</span>
                <div style="display: flex; flex-direction: row; width: 100%; justify-content: center; align-items: center;">
                    <button onclick="closeModal()" style="background-color: #f2f2f2; margin-right: 5px;" class="button">Cancel</button>
                    <button onclick="deleteUser()" style="background-color: #dc3545; color: white; margin-left: 5px;" class="button">Delete</button>
                </div>
            </section>
        </div>
    </div>


    <footer>
        <div class="content has-text-centered">
            <p>
                Developed By <a href="https://niazbinsiraj.wordpress.com" target="_blank"><b>NIAZ BIN SIRAJ</b></a>
            </p>
        </div>
    </footer>

</body>

</html>