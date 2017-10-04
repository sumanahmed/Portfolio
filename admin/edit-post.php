<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Blog;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $get_post = Blog::getBlogPostById($id);
}
if(isset($_POST['submit'])){
    $update_post = Blog::updateBlogPost($_POST, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php if(isset($update_post)){echo $update_post; }?>
        <div class="block">
            <?php
            if($get_post){
            ?>
            <form name="myform" action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Post Title</label>
                        </td>
                        <td>
                            <input type="text" name="post_title" value="<?php echo $get_post['post_title']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Post Image</label>
                        </td>
                        <td>
                            <input type="file" name="post_image" accept="image/*"/>
                            <img src="<?php echo $get_post['post_image']; ?>" alt="Post Image" style="width: 80px; height: 80px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="post_description"><?php echo $get_post['post_description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Publication Status</label>
                        </td>
                        <td>
                            <select name="publication_status" id="">
                                <option value="1">Published</option>
                                <option value="0">Unublished</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    document.forms['myform'].elements['publication_status'].value='<?php echo $get_post['publication_status']; ?>'
</script>
<?php include 'inc/footer.php'; ?>




