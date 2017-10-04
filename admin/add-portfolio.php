<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_POST['submit'])){
    $insert_portfolio = Portfolio::savePortfolio($_POST);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Portfolio</h2><?php if(isset($insert_portfolio)){echo $insert_portfolio;} ?>
            <div class="block">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td><label>Portfolio Title</label></td>
                            <td><input type="text" name="portfolio_title" placeholder="Enter Portfolio Title..." class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Link</label></td>
                            <td><input type="text" name="portfolio_link" placeholder="Enter Portfolio Link..." class="medium" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Portfolio Term</label>
                            </td>
                            <td>
                                <select id="select" name="term_id">
                                    <?php
                                    $terms = Portfolio::getAllTerms();
                                    if($terms){
                                        while ($value = mysqli_fetch_assoc($terms)){
                                    ?>
                                    <option value="<?php echo $value['term_id']; ?>"><?php echo $value['term_class']; ?></option>
                                    <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Image</label></td>
                            <td><input type="file" name="portfolio_image" accept="image/*"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" Value="Save" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>


