<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Blog;
if(isset($_POST['submit'])){
    $add_post = Blog::saveBlogPost($_POST);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php if(isset($add_post)){echo $add_post; }?>
        <div class="block">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Post Title</label>
                        </td>
                        <td>
                            <input type="text" name="post_title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Post Image</label>
                        </td>
                        <td>
                            <input type="file" name="post_image" accept="image/*"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="post_description"></textarea>
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
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>




