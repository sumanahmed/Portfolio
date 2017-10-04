<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $get_terms = Portfolio::getTermsById($id);
}

if(isset($_POST['submit'])){
    $update_term = Portfolio::updateTermsById($_POST, $id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Term</h2>
            <div class="block copyblock">
                <?php
                if($get_terms){
                ?>
                <form action="" method="POST">
                    <?php if(isset($update_term)){echo $update_term; } ?>
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="term_class" value="<?php echo $get_terms['term_class']; ?>" class="medium" />
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