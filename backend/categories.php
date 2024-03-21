 <h3 id="categories" class="mb-4 text-danger">Categories</h3>
 <div class="row">
     <div class="col-4 shadow px-4 py-5">
         <form action="admin-dashboard.php" method="post">
             <h4 class="text-center mt-3">Create Category</h4>
             <div class="mb-3">
                 <input type="text" required placeholder="Category Name..." name="name" class="form-control">
             </div>

             <input type="submit" value="Create" name="create_cat" class="btn btn-primary ">
             ​
         </form>
     </div>
     <div class="col-8 shadow p-3">
         <h4 class="text-center mt-5">Categories List</h4>
         <table class="table table-striped table-hover ">
             <thead>
                 ​
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Name</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $sql = "SELECT * FROM categories";
                    $s = $pdo->prepare($sql);
                    $s->execute();
                    $res = $s->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($res as $key => $value) { ?>
                     <tr>
                         <td scope="row"><?= ++$key ?></td>
                         <td scope="row"><?= $value['name'] ?></td>
                         <td class="">
                             <a href="category-edit.php?id=<?= $value['category_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                             <a href="delete.php?id=<?= $value['category_id'] ?>&tbname=categories&tbid=category_id" class="btn btn-sm btn-danger" onclick="alert('are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                             ​
                         </td>
                     </tr>
                 <?php } ?>
             </tbody>
             ​
         </table>
     </div>
 </div>