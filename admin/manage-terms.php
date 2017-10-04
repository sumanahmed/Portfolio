<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Portfolio;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $delTerm = Portfolio::deleteTermsById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Term List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Term Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $term = Portfolio::getAllTerms();
                $i=1;
                while ($value = mysqli_fetch_assoc($term)){
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value['term_class']; ?></td>
                        <td>
                            <a href="edit-terms.php?id=<?php echo $value['term_id']; ?>">Edit</a> ||
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