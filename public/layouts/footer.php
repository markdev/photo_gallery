    </div>
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Mark Karavan</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
