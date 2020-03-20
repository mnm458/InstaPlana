<?php
/**
 * Define database credentials
 */
define("DB_HOST", "InstaPlana"); 
define("DB_NAME", "instaplana"); 
define("DB_USER", "instaplana"); 
define("DB_PASS", "FtAgBHS123!"); 
define("DB_ENCODING", "utf8"); // DB connnection charset



/**
 * Define DB tables
 */
define("TABLE_PREFIX", "rp_");

// Set table names without prefix
define("TABLE_USERS", "users");
define("TABLE_ACCOUNTS", "accounts");
define("TABLE_PACKAGES", "packages");
define("TABLE_POSTS", "posts");
define("TABLE_GENERAL_DATA", "general_data");
define("TABLE_OPTIONS", "options");
define("TABLE_ORDERS", "orders");

define("TABLE_FILES", "files");
define("TABLE_CAPTIONS", "captions");
define("TABLE_PROXIES", "proxies");

define("TABLE_PLUGINS", "plugins");
define("TABLE_THEMES", "themes");
