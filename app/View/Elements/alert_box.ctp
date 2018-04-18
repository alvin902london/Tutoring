<div class="alert <?php echo $class;?> alert-dismissible" role="alert">
    <button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();return false;"><span aria-hidden="true">&times;</span></button><strong><?php echo $message; ?></strong>
</div>