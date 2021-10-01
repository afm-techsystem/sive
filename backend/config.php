<?php
define("ROOT_DIR", dirname(__FILE__));


if ($_ENV['environment']=='dev') {
  define("DB_HOST", "172.17.0.3");
  define("DB_PORT", "33306");
}

if ($_ENV['environment']=='test') {
  define("DB_HOST", "172.17.0.3");
  define("DB_PORT", "3306");
  define("DB_NAME", "bd_sive_test");
}

if ($_ENV['environment']=='prod') {
  define("DB_HOST", "172.17.0.3");
  define("DB_PORT", "3306");
}
define("DB_NAME", "bd_sive");

define("DB_USER_ADMIN", "admin");
define("DB_PASS_ADMIN", "admin-Sive.21");

define("DB_USER_VENDEDOR", "vendedor");
define("DB_PASS_VENDEDOR", "vendedor-Sive.21");

define("DB_USER_CLIENTE", "cliente");
define("DB_PASS_CLIENTE", "cliente-Sive.21");

// define("DB_HOST", "172.17.0.3");
define("DB_USER", "app");
define("DB_PASS", "app-Sive.21");
// define("DB_NAME", "bd_sive");
// define("DB_PORT", "3306");
