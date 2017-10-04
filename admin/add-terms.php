<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_POST['submit'])){
    $queryResult = Portfolio::savePortfolioTerms($_POST);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Term</h2>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                     <?php if(isset($queryResult)){echo $queryResult; } ?>
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="term_class" placeholder="Enter Term Class..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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