  <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>
  <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid px-4">
              <h1 class="mt-4">Users</h1>

              <div class="card mb-4">
                  <div class="card-header">
                      <i class="fas fa-table me-1"></i>
                      <th><a href="<?php echo ROOT_URL . '/admin/insertProduct' ?>"><button type="button" class="btn btn-light btn-light" style="background-color:blue">Add User</button></a></th>
                  </div>
                  <div class="card-body">

                      <table id="datatablesSimple" class="table table-bordered">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th scope="col">ID-User</th>
                                  <th scope="col">User Name</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($users)) : ?>
                                  <?php foreach ($users as $row) : ?>
                                      <tr>
                                          <td>
                                              <input type="checkbox" />
                                          </td>
                                          <td><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['user_name']; ?></td>
                                          <td><?php echo $row['phone']; ?></td>
                                          <td><?php echo $row['address']; ?></td>
                                          <td><?php echo $row['email']; ?></td>
                                          <td>
                                              <form action="<?php echo ROOT_URL . '/Admin/delete' ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                  <button type="submit" class="btn btn-outline-danger" style="border: none; background: none; padding: 0;">
                                                      <i class="fa-solid fa-trash fs-5">Delete</i>
                                                  </button>
                                              </form>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>