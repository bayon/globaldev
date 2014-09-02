<?php
// SINCE ajax calls are asynchronous I need to include the necessary db connections and models separately.
// However, I was getting warnings when I called the "synchronous" model includes twice, from the ajax controller.
include_once('../app_lib/app_lib_includes.php');
include_once('User.php');
include_once('Appointment.php');
include_once('Attachment.php');

?>