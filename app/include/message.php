
<?php if (isset( $_SESSION['id'])):  ?>
    
<div class="msgs <?php echo $_SESSION['type'] ?>" >
    <p > <?php echo ($_SESSION['message']) ?> </p>
<?php 

unset( $_SESSION['message']);
unset( $_SESSION['type']);
?>
</div>

<?php endif; ?> 