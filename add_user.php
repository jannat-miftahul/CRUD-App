<?php
session_start();
include "header.php";
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Add New User</h3>
                </div>
                <div class="card-body">
                    <form action="./controllers/add_user_controller.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>

                            <?php
                            if (isset($_SESSION['name_err'])) { ?>
                                <span class="text-danger"> <?= $_SESSION['name_err'] ?> </span>
                                <?php
                            }
                            ?>
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>

                            <?php
                            if (isset($_SESSION['email_err'])) { ?>
                                <span class="text-danger"> <?= $_SESSION['email_err'] ?> </span>
                                <?php
                            }
                            ?>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">

                            <?php
                            if (isset($_SESSION['error'])) { ?>
                                <span class="text-danger"> <?= $_SESSION['error'] ?> </span>
                                <?php
                            }
                            ?>
                        </div> -->

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control summernote" id="description" name="description"
                                rows="3"></textarea>

                            <?php
                            if (isset($_SESSION['description_err'])) { ?>
                                    <span class="text-danger"> <?= $_SESSION['description_err'] ?> </span>
                                    <?php
                            }
                            ?>
                        </div>


                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <textarea class="form-control summernote" id="experience" name="experience"
                                rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="project" class="form-label">Project</label>
                            <textarea class="form-control summernote" id="project" name="project" rows="3"></textarea>
                        </div>

                        <!-- profile -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            <?php
                            if (isset($_SESSION['image_err'])) { ?>
                                    <span class="text-danger"> <?= $_SESSION['image_err'] ?> </span>
                                    <?php
                            }
                            ?>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 100
        });
    });
</script>