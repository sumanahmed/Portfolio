<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Blog;
use App\classes\Service;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $del_blog = Blog::deleteBlogById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Portfolio List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Post Title</th>
                    <th>Post Description</th>
                    <th>Post Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $posts = Blog::getAllBlogPost();
                $i=1;
                while ($value = mysqli_fetch_assoc($posts)){
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['post_title']; ?></td>
                        <td><?php echo Service::textShorten($value['post_description'],30); ?></td>
                        <td><img src="<?php echo $value['post_image']; ?>" alt="Post Image" style="width:100px"; height="100px"></td>
                        <td><?php echo $value['publication_status']==1 ? 'Published' : 'Unpublished'; ?></td>
                        <td>
                            <a href="edit-post.php?id=<?php echo $value['id']; ?>">Edit</a> ||
                            <a onclick="return confirm('Are You Sure to Delete ?');" href="?id=<?php echo $value['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>


<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>