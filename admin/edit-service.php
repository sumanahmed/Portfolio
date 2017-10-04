<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Service;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $get_service = Service::getServicesById($id);
}

if(isset($_POST['submit'])){
    $update_service = Service::updateServicesById($_POST, $id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Update Service</h2><?php if(isset($update_service)){echo $update_service; } ?>
            <div class="block copyblock">
                <?php
                if($get_service){
                ?>
                <form action="" method="POST">
                    <table class="form">
                        <tr><td>Service Title</td>
                            <td>
                                <input type="text" name="service_title" value="<?php echo $get_service['service_title']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr><td>Service Text</td>
                            <td>
                                <textarea name="service_text" rows="10" cols="60"><?php echo $get_service['service_text']; ?></textarea>
                            </td>
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