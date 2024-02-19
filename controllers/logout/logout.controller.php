<?php

// destroy all tooken from session
session_start();
session_destroy();

// Switch page into login
header('location: /login');