<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "admin_main";
$route['404_override'] = 'Error/Error_404';
//$route['Home'] = "home";

$route["Admin"] = "admin_main";
$route["Login"] = "admin_main/login";










/*//For Contact Us Navigation
$route['Contact-Us'] = "Contact";
$route['Contact-us'] = "Contact";
$route['contact-us'] = "Contact";
$route['contact'] = "Contact";
//For About Us Navigation
$route['About-Us'] = "About";
$route['About-us'] = "About";
$route['about-us'] = "About";
$route['about'] = "About";

$NandE ="News-And-Events";
$route['News-and-Events'] = "News/Main/";
$route[strtotime($NandE)] = "News/Main/";
$route[strtoupper($NandE)] = "News/Main/";
$route['News-and-Events/Page/([0-9]+)'] = "News/Main/$1";
$route['News-and-Events/Read/([a-zA-Z0-9-]+)'] = "News/Read/$1";

//For Blog
$Blog = "Blog";
$route[$Blog] = "Blog/Main";
$route["Blog/([0-9]+)"] = "Blog/Main/$1";
// $route[strtolower($Blog)."/:num"] = "Blog/Main/$1";
// $route[strtoupper($Blog)]."/:num"] = "Blog/Main/$1";
 $route[$Blog."/Read/([a-zA-Z0-9-]+)"] = "Blog/Show/$1";
 $route[$Blog."/Page"] = "Blog/Main";
 $route[$Blog."/Page/([0-9]+)"] = "Blog/Main/$1";

//For Forms
//
//For Admin

$route["Admin/Abstract"] = "System_Admin/Home";
$route["Admin/Abstract/New-Abstract"] = "System_Admin/Abstract_New";
$route["Admin/Abstract/Edit/([0-9]+)"] = "System_Admin/Edit_Abstract_With_Num/$1";
$route["Admin/Abstract/Edit/Save"] = "System_Admin/SaveEditedAbstract";
$route["Admin/Abstract/CreateAbstract"] = "System_Admin/Abstract_Create";*/





/*$route["Admin/Login"] = "System_Admin/Login";
$route["Admin/Authenticate"] = "System_Admin/Authenticate";
$route["Admin/Dashboard"] = "System_Admin/Home";
$route["Admin/dashboard"] = "System_Admin/Home";
//Log out
$route["Admin/Logout"] = "System_Admin/logout";

$route['search']='thesis/search';
$route['search/admin']='thesis/searchAdmin';*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */

?>