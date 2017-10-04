<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Service;
if(isset($_POST['submit'])){
    $queryResult = Service::saveService($_POST);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Service</h2><?php if(isset($queryResult)){echo $queryResult; } ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">
                        <tr><td>Service Title</td>
                            <td>
                                <input type="text" name="service_title" placeholder="Enter Service Title..." class="medium" />
                            </td>
                        </tr>
                        <tr><td>Service Text</td>
                            <td>
                                <textarea name="service_text" placeholder="Enter Service Text.." rows="10" cols="60"></textarea>
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