<?php
include("../page/header.php");
include('..\page\status_1.php');
?>
<br><br>
<form action="upload.php" method="post" enctype="multipart/form-data" name="form1">
  <input name="fileCSV" type="file" id="fileCSV">
  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">
</form>
<br>
<br>
<?php
include("../page/footer.php");
?>