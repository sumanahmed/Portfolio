<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Login;
if(isset($_POST['submit'])){
    $update_social = Login::updateSocailButonLink($_POST);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php if(isset($update_social)){echo $update_social; } ?>
                <div class="block">
            <?php
            $socials = Login::socialButtonLink();
            if($socials){
            ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb_link" value="<?php echo $socials['fb_link']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw_link" value="<?php echo $socials['tw_link']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln_link" value="<?php echo $socials['ln_link']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp_link" value="<?php echo $socials['gp_link']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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
