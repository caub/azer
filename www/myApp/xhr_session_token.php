<?php

session_start();
echo $_SESSION['accessToken'];
session_write_close();