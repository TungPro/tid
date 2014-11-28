<?php
session_start();
session_destroy();
header("Location: http://tid.com/thoat?redirect_uri=http://music.tid.com");
?>