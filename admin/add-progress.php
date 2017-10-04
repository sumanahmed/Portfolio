<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use \App\classes\Progressbar;
if(isset($_POST['submit'])){
    $queryResult = Progressbar::saveProgress($_POST);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Skill</h2>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                     <?php if(isset($queryResult)){echo $queryResult; } ?>
                    <table class="form">
                        <tr>
                            <td>Progress Persent</td>
                            <td>
                                <input type="text" name="progress_percent" placeholder="Enter Progress Percent..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Progress Title</td>
                            <td>
                                <input type="text" name="progress_title" placeholder="Enter Progress Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Progress Color</td>
                            <td>
                                <input type="text" name="progress_color" placeholder="Enter Progress Color Code..." class="medium" />
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