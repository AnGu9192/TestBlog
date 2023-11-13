
<?php include "../layouts/header.php"; ?>

<table border="1px" align="center">
    <tr>
        <td>
            <form action="<?php echo BASE_URL; ?>actions/uploadAction.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="submit"> Upload</button>
            </form>
        </td>
    </tr>

</table>