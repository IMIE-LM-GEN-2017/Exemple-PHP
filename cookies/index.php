<?php

var_dump($_COOKIE);
// unset($_COOKIE['monCookie']);
setcookie("monCookie",'oui, c\'est bon les cookies',time()+360, '/');

var_dump($_COOKIE);
