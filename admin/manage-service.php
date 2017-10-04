<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Service;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $delservice = Service::deleteServicesById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Service List</h2><?php if(isset($delservice)){echo $delservice; } ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Service Title</th>
                        <th>Service Text</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $service = Service::getAllServices();
                $i=1;
                while ($value = mysqli_fetch_assoc($service)){
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['service_title']; ?></td>
                        <td><?php echo Service::textShorten($value['service_text'], 30); ?></td>
                        <td>
                            <a href="edit-service.php?id=<?php echo $value['id']; ?>">Edit</a> ||
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