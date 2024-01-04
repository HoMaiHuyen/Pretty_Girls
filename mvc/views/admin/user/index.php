  <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>
  <div id="layoutSidenav_content">
      <main>
          <div class="container">
              <div class="row">
                  <div class="col-10 mx-auto p-4 border mb-5">
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">ID-User</th>
                                  <th scope="col">User Name</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Email</th>
                                  <th scope="col" colspan="2">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($users)) : ?>
                                  <?php foreach ($users as $row) : ?>
                                      <tr>
                                          <td><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['user_name']; ?></td>
                                          <td><?php echo $row['phone']; ?></td>
                                          <td><?php echo $row['address']; ?></td>
                                          <td><?php echo $row['email']; ?></td>
                                          <td>
                                              <form action="<?php echo ROOT_URL . '/Admin/delete' ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                  <button type="submit" class="link-dark" style="border: none; background: none; padding: 0;">
                                                      <i class="fa-solid fa-trash fs-5"></i>
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
      </main>
      <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>