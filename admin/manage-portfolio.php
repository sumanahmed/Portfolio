<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $delTerm = Portfolio::deletePortfolioById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Portfolio List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Portfolio Title</th>
                        <th>Portfolio Link</th>
                        <th>Portfolio Term</th>
                        <th>Portfolio Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $portfolio = Portfolio::getAllPortfolio();
                $i=1;
                while ($value = mysqli_fetch_assoc($portfolio)){
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['portfolio_title']; ?></td>
                        <td><?php echo $value['portfolio_link']; ?></td>
                        <td><?php echo $value['term_class']; ?></td>
                        <td><img src="<?php echo $value['portfolio_image']; ?>" alt="Portfolio Image" style="width:100px"; height="100px"></td>
                        <td>
                            <a href="edit-portfolio.php?id=<?php echo $value['id']; ?>">Edit</a> ||
                            <a onclick="return confirm('Are You Sure to Delete ?');" href="?id=<?php echo $value['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>


<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>