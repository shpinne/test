<?php
if(hasFlash('sudo')): ?>
    <?php
    $data = getFlash('sudo');
    ?>
    <script>
        swal("<?= $data['title'] ?>", "<?= $data['message'] ?>", "<?= $data['type'] ?>");
    </script>
<?php endif; ?>