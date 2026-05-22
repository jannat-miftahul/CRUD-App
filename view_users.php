<?php
include "header.php";
include "./config/db.php";
$stmt = $conn->prepare("SELECT id, name, email, description, experience, project, image_name, image_url FROM users WHERE 1");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
// print_r($result);

?>

<div class="container mt-5">
    <div class="card col-md-8 mx-auto">
        <div class="card-header bg-primary">
            <h3 class="text-white mb-0">All Users</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($users as $key => $user) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><img src="<?= $user['image_url'] ?>" alt="profile" class="img-thumbnail" width="50"></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>