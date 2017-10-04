<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $get_portfolio = Portfolio::getPortfolioById($id);
}

if(isset($_POST['submit'])){
    $update_portfolio = Portfolio::updatePortfolioById($_POST, $id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Portfolio</h2> <?php if(isset($update_portfolio)){echo $update_portfolio;} ?>
            <div class="block">
                <?php
                if($get_portfolio){
                ?>
                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="form">
                        <tr>
                            <td><label>Portfolio Title</label></td>
                            <td><input type="text" name="portfolio_title" value="<?php echo $get_portfolio['portfolio_title']; ?>" class="medium" /></td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Link</label></td>
                            <td><input type="text" name="portfolio_link" value="<?php echo $get_portfolio['portfolio_link']; ?>" class="medium" /></td>
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
                                            <option <?php if ($value['term_id'] == $get_portfolio['term_id']) { echo "selected"; } ?> value="<?php echo $value['term_id']; ?>"><?php echo $value['term_class'];?></option>
                                        <?php } } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Portfolio Image</label></td>
                            <td><input type="file"  name="portfolio_image" accept="image/*"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img src="<?php echo $get_portfolio['portfolio_image']; ?>" alt="Portfolio Image" style="width: 80px; height: 80px;"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" Value="Update" /></td>
                        </tr>
                    </table>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>


<?php include 'inc/footer.php'; ?>


