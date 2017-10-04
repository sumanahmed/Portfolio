<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Section;
if(isset($_POST['submit'])){
    $update = Section::updateSection($_POST);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Update Section Content</h2>
            <div class="block copyblock">
                <?php
                $value = Section::getAllSectionsValues();
                if($value){
                ?>
                <form action="" method="POST">
                    <?php if(isset($update)){echo $update; } ?>
                    <table class="form">
                        <tr>
                            <td colspan="2" align="center"><h2>About Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>About Title</label></td>
                            <td><input type="text" name="about_title" value="<?php echo $value['about_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>About Content</label></td>
                            <td><textarea name="about_content" id="" cols="60" rows="10"><?php echo $value['about_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><h2>Skill Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>Skill Title</label></td>
                            <td><input type="text" name="skill_title" value="<?php echo $value['skill_title']; ?>" class="medium" /></td>
                        </tr>

                        <tr>
                            <td><label>Skill Content</label></td>
                            <td><textarea name="skill_content" id="" cols="60" rows="10"><?php echo $value['skill_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><h2>Portfolio Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Title</label></td>
                            <td><input type="text" name="portfolio_s_title" value="<?php echo $value['portfolio_s_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Content</label></td>
                            <td><textarea name="portfolio_s_content" id="" cols="60" rows="10"><?php echo $value['portfolio_s_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><h2>Service Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>Service Title</label></td>
                            <td><input type="text" name="service_title" value="<?php echo $value['service_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Service Content</label></td>
                            <td><textarea name="service_content" id="" cols="60" rows="10"><?php echo $value['service_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><h2>Blog Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>Blog Title</label></td>
                            <td><input type="text" name="blog_title" value="<?php echo $value['blog_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Blog Content</label></td>
                            <td><textarea name="blog_content" id="" cols="60" rows="10"><?php echo $value['blog_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><h2>Contact Section</h2></td>
                        </tr>
                        <tr>
                            <td><label>Contact Title</label></td>
                            <td><input type="text" name="contact_title" value="<?php echo $value['contact_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Contact Content</label></td>
                            <td><textarea name="contact_content" id="" cols="60" rows="10"><?php echo $value['contact_content']; ?></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
                    <?php } ?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>