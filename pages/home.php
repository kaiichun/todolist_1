<?php

    // start with an empty array for students
    $tasks = [];

    $db = new DB();

    // call the fetchAll function from the DB class to get all the students
    $todolist = $db->fetchAll('SELECT * FROM todolist');

        require 'parts/header.php';
    ?>

  <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 600px;">
        <div class="card-body">
            <h3 class="card-title">My Todo List</h3>
            <div class="d-flex gap-3">
                <?php if ( isset( $_SESSION["users"] ) ) { ?>
                    <!-- <a href="logout.php">Logout</a> -->
                <?php } else { ?>
                    <a href="/login">Login</a>
                    <a href="/signup">Sign Up</a>
                <?php } ?>
            </div>

  <?php if ( isset( $_SESSION["users"] ) ) { ?>
    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <ul class="list-group">
          <?php foreach ($todolist as $task) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <form method="POST" action="/task/update">
                  <input 
                      type="hidden"
                      name="update_complete"
                      value="<?= $task["completed"]; ?>"
                      />
                      <input 
                        type="hidden"
                        name="update_id"
                        value="<?= $task["id"]; ?>"
                      />

                  <?php if($task['completed'] == 1) {
                      echo '<button class="btn btn-sm btn-success">'.'<i class="bi bi-check-square"></i>'.'</button>'.'<span class="ms-2 text-decoration-line-through">' . $task['task'] . '</span>';
                    } else {
                      echo '<button class="btn btn-sm btn-light">'.'<i class="bi bi-square"></i>'.'</button>'.'<span class="ms-2">' . $task['task'] . '</span>';                    
                      }
                    ?>
                </form>
                    </div>
                <div>
              <form method="POST" action="/task/delete">
                    <input 
                        type="hidden"
                        name="delete_id"
                        value="<?= $task["id"]; ?>"
                        />
                      <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </button>  
                </form>
              </div>
          </li>
            <?php endforeach ?>       
        </ul>

        <div class="mt-4">
          <?php require "parts/error_box.php"; ?>
          <form method="POST" action="/task/add">
          <div class="d-flex justify-content-between align-items-center">
            <input
              type="text"
              class="form-control"
              placeholder="Add new item..."
              name="add_task"
            />
            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>    
    <div
          class="d-flex justify-content-center align-items-center gap-3 mx-auto pt-3"
          style="max-width: 500px;"
        >
          <a href="/logout" class="text-decoration-none small"
            ><i class="bi bi-arrow-left-circle"></i> Log Out</a
          >
        </div>
      </div>
    <?php } ?>

<?php

require 'parts/footer.php';