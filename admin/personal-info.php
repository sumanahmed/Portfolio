<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\About;
if(isset($_POST['submit'])){
    $update_info = About::updatePersonalInformation($_POST);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <?php if(isset($update_info)){echo $update_info; } ?>
        <div class="block">
            <?php
            $pinfo = About::getPersonalInformation();
            if($pinfo){
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td><label>Name</label></td>
                            <td><input type="text" name="name" value="<?php echo $pinfo['name']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>
                            <td><input type="text" name="email" value="<?php echo $pinfo['email']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Presenet Address</label></td>
                            <td><textarea name="present_address" id="" cols="30" rows="10"><?php echo $pinfo['present_address']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Permanent Address</label></td>
                            <td><textarea name="permanent_address" id="" cols="30" rows="10"><?php echo $pinfo['permanent_address']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Phone</label></td>
                            <td><input type="text" name="phone" value="<?php echo $pinfo['phone']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Nationality</label></td>
                            <td><input type="text" name="nationality" value="<?php echo $pinfo['nationality']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Upload New Image</label></td>
                            <td><input type="file" name="about_image" id="" accept="image/*"></td>
                        </tr>
                        <tr>
                            <td><label>Previous Image</label></td>
                            <td><img src="<?php echo $pinfo['about_image']; ?>" alt="" style="width: 80px;height: 80px;"></td>
                        </tr>
                        <tr>
                            <td><label>My Biodata</label></td>
                            <td><textarea name="my_biodata" id="" cols="30" rows="10"><?php echo $pinfo['my_biodata']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update"></td>
                        </tr>
                    </table>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
