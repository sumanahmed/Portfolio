<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
use App\classes\Progressbar;
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $delprog = Progressbar::deleteProgressById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Progress List</h2><?php if(isset($delprog)){echo $delprog;} ?>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr align="center">
                    <th>Serial No.</th>
                    <th>Progress Persent</th>
                    <th>Progress Title</th>
                    <th>Progress Color</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $prog = Progressbar::getAllProgress();
                $i=1;
                while ($value = mysqli_fetch_assoc($prog)){
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['progress_percent']; ?></td>
                        <td><?php echo $value['progress_title']; ?></td>
                        <td style="background: #<?php echo $value['progress_color']; ?>;"><?php echo $value['progress_color']; ?></td>
                        <td>
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