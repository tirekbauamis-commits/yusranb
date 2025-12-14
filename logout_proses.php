<?php
session_start();
session_unset();
session_destroy();

header("Location: /yusran_bakery/login.php");
exit;
