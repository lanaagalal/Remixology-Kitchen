<script src="sweetalert.min.js"></script>
<?php
    session_start(); // Ensure session is started
    if(isset($_SESSION["status"]) !="" && $_SESSION["status_code"] != "")
    {
        ?>
        <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Okay",
        });
        </script>
        <?php
        // Unset the session variables to avoid repeated alerts on page refresh
        unset($_SESSION["status"]);
        unset($_SESSION["status_code"]);
    }
?>
