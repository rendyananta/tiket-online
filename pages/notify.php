<?php if (isset($_SESSION['notify'])): ?>
  <script type="text/javascript">
    $.notify({ message : "<?= $_SESSION['notify']['message'] ?>" }, { type : "<?= $_SESSION['notify']['type'] ?>" });
    setTimeout(function () { $.notifyClose() }, 1500);
  </script>
<?php unset($_SESSION['notify']) ?>
<?php endif; ?>
