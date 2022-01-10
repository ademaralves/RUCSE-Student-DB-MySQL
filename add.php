<?php
require_once 'database/studentManager.php';

$json = file_get_contents('hometown.json');
$hometown = json_decode($json, true);

if(isset($_POST['submit']))
{
    $student = array(
        'name' => strip_tags($_POST['name']),
        'student_id' => strip_tags($_POST['student_id']),
        'gender' => strip_tags($_POST['gender']),
        'email' => strip_tags($_POST['email']),
        'phone' => strip_tags($_POST['phone']),
        'blood_group' => strip_tags($_POST['blood_group']),
        'session' => strip_tags($_POST['session']),
        'student_type' => strip_tags($_POST['student_type']),
        'hometown' => strip_tags($_POST['hometown'])
    );

    Create($student);

    header("Location: /index.php");
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

    <style>
        .table.is-borderless td,
        .table.is-borderless th {
            border: 0;
        }

        .is-square{
            border-radius: 0px !important;
        }
    </style>
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
                <div class="navbar-item" style="margin-right: 100px;">
                    <form action="/index.php" name="form" method="get">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input" type="text" placeholder="Find a student" name="search" id="search" style="border-radius: 0px; border: 0px;">
                            </div>
                            <div class="control">
                                <input class="button" type="submit" value="Search" style="background-color:lightblue; border-radius: 0px; border: 0px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="width: 40%;">
        <h1 class="title" style="text-align: center; margin-top: 15px;">Insert New Student</h1>
        <form action="add.php" method="post" name="form" class="box" style="margin-bottom: 100px; border-radius: 0px;">
            <table class="table is-fullwidth is-borderless">
                <tr class="field">
                    <td>
                        <label class="label">Name</label>
                    </td>
                    <td>
                        <div class="control">
                            <input required class="input is-square" type="text" id="name" name="name" placeholder="Student Name">
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Student ID</label>
                    </td>
                    <td>
                        <div class="control">
                            <input required class="input is-square" type="text" id="student_id" name="student_id" placeholder="Student ID">
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Gender</label>
                    </td>
                    <td>
                        <div class="control">
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="gender" value="Male" required>
                                    Male
                                </label>
                                <label class="radio">
                                    <input type="radio" name="gender" value="Female">
                                    Female
                                </label>
                            </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Email</label>
                    </td>
                    <td>
                        <div class="control">
                            <input required class="input is-square" type="email" id="email" name="email" placeholder="Student Email">
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Phone</label>
                    </td>
                    <td>
                        <div class="control">
                            <input required class="input is-square" type="text" id="phone" name="phone" placeholder="Student Phone No">
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Blood Group</label>
                    </td>
                    <td>
                        <div class="control">
                            <div class="select" style="width: 100%;">
                                <select class="is-square" name="blood_group" required style="width: 100%;">
                                        <option> A+ </option>
                                        <option> B+ </option>
                                        <option> O+ </option>
                                        <option> AB+ </option>
                                        <option> A- </option>
                                        <option> B- </option>
                                        <option> O- </option>
                                        <option> AB- </option>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>


                <tr class="field">
                    <td>
                        <label class="label">Session</label>
                    </td>
                    <td>
                        <div class="control">
                            <input required class="input is-square" type="text" id="session" name="session" placeholder="Student Session">
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Student Type</label>
                    </td>
                    <td>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="student_type" value="Current" required>
                                Current
                            </label>
                            <label class="radio">
                                <input type="radio" name="student_type" value="Graduated">
                                Graduated
                            </label>
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td>
                        <label class="label">Hometown</label>
                    </td>
                    <td>
                        <div class="control">
                            <div class="select" style="width: 100%;">
                                <select class="is-square" name="hometown" required style="width: 100%;">
                                    <?php foreach ($hometown as $key => $value) : ?>
                                        <option> <?php echo $value['district'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="field">
                    <td></td>
                    <td>
                        <input class="button is-link is-square" name="submit" type="submit" value="Submit" style="float: right;">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>