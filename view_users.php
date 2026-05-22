<?php
include "header.php";

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
                    $stmt = $pdo->prepare("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><img src="uploads/<?= $user['profile_image'] ?>" alt="Profile Image" class="img-thumbnail"
                                    width="50"></td>
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