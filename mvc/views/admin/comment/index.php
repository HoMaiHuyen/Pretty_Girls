  <?php require_once dirname(__DIR__) . '/partials/header.php';  ?>
  <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid px-4">
              <h1 class="mt-4">Comments</h1>

              <div class="card mb-4">
                  <div class="card-header">
                      <i class="fas fa-table me-1"></i>
                      <th><a href="<?php echo ROOT_URL . '/admin/insertProduct' ?>"><button type="button" class="btn btn-light btn-light" style="background-color:blue">Add Comment</button></a></th>
                  </div>
                  <div class="card-body">
                      <table id="datatablesSimple" class="table table-bordered">
                          <thead>
                              <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">User_ID</th>
                                  <th scope="col">Product_ID</th>
                                  <th scope="col">Message</th>
                                  <th scope="col">Comment_time</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if (!empty($comments)) : ?>
                                  <?php foreach ($comments as $row) : ?>
                                      <tr>
                                          <td><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['user_id']; ?></td>
                                          <td><?php echo $row['product_id']; ?></td>
                                          <td><?php echo $row['message']; ?></td>
                                          <td><?php echo $row['comment_time']; ?></td>
                                          <td>
                                              <form action="<?php echo ROOT_URL . '/Comment/deleteComment' ?>" method="POST">
                                                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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

          <?php require_once dirname(__DIR__) . '/partials/footer.php' ?>