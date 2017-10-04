<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Login;
if(isset($_POST['submit'])){
    $copyright_text = $_POST['copyright_text'];
    $update_copyright = Login::changeCopyright($copyright_text);
}

$copy_text = Login::getCopyrightText();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php if(isset($update_copyright)){echo $update_copyright; } ?>
                <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="copyright_text" value="<?php echo $copy_text['copyright_text']; ?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>