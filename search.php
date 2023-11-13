<?php
include "../layouts/header.php"; ?>

<div class="container pt-5">
        <form action="<?php echo BASE_URL; ?>pages/search.php" method="get">
            <input type="text" placeholder="Найти комментарии" name="search" />
            <button class="btn btn-dark btn-sm" name="submit" >Найти</button>
        </form>
            <table class="table">
                <?php
                    if(isset($_GET['submit'])){
                        $serachvalues = $_GET['search'];

                        $min_length = 3;

                        $query = "select *  from post  inner join comment on comment.userId = post.postId where post.body
                        like '%$serachvalues%'";
                        
                        $data = mysqli_query($connection, $query);

                         if(strlen($serachvalues) >= $min_length){

                                $serachvalues= htmlspecialchars($serachvalues);     
    
                        if(mysqli_num_rows($data) > 0)
                        {
                           
                            foreach($data as $items)
                            {
                                ?>
                                <tr class="">
                                    <th>PostId</th>
                                    <th>Title</th>
                                    <th>email</th>
                                    <th>Body</th>
                                    <th>Name</th>

                                </tr>
                                <tr>
                                    <td><?= $items['postId']; ?></td>
                                    <td><?= $items['title']; ?></td>
                                    <td><?= $items['email']; ?></td>
                                    <td><?= $items['body']; ?></td>                                    
                                    <td><?= $items['name']; ?></td>
                                </tr>
                                <?php
                            }
                         
                        }
                        
                   
                        else
                        {
                            ?>
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                            <?php
                        }
                    }
                }
                ?>
               
            </table>
        </div>
  

<?php
include "../layouts/footer.php";
?>