<?php

define('DB_USER', "root");                      //db user
define('DB_PASSWORD', "");                        //db password
define('DB_DATABASE', "cat_recommendation(5,3,1,2,6,6)");        // database name
define('DB_SERVER', "localhost:3306");             // db server

/*
 *  DEFINING TABLE NAME
 * 
 */
define('CATS', "cats");
define('CATS_SIZE', "cats_size");
define('CATS_COLOR', "cats_color");
define('CATS_PRICE', "cats_price");
define('CATS_COAT', "cats_coat");
define('CATS_CHILDFRIENDLY', "cats_childfriendly");
define('CATS_DOGFRIENDLY', "cats_dogfriendly");
define('CATS_CONTACT', "cats_contact");
define('ADMIN', "admin");
/*
 *	UPLOAD DIR
 */

define('UPLOAD_DIR', '../../assets/cats_img/newcatsedit_img/');
define('UPLOAD_DIR1', '../../assets/cats_img/newcats_img/');


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
mysqli_set_charset($con, 'utf8');
// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
