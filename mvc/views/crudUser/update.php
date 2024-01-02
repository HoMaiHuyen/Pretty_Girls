<div class="container">
    <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any information</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">User Name:</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name'] ?>">
                </div>

                <div class="col">
                    <label class="form-label">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>