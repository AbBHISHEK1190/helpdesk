<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome/Home';
$route['admin/create-account'] = 'welcome/Home/createaccount';
$route['savedataintosignup'] = 'welcome/Home/savedataintosignup';
$route['checkusername'] = 'welcome/Home/checkusername';
$route['create-ticket'] = 'welcome/Createticket/index';
$route['getcategory'] = 'welcome/Createticket/getcategory';
$route['getsubcategory'] = 'welcome/Createticket/getsubcategory';
$route['getfaq'] = 'welcome/Createticket/getfaq';
$route['getfaqres'] = 'welcome/Createticket/getfaqres';
$route['getdistrict'] = 'welcome/Createticket/getdistrict';
$route['getblock'] = 'welcome/Createticket/getblock';
$route['getgpdata'] = 'welcome/Createticket/getgpdata';
$route['saveticket'] = 'welcome/Createticket/saveticket';
$route['login'] = 'welcome/Login/index';
$route['logincheck'] = 'welcome/Login/logincheck';
$route['logout'] = 'welcome/Login/logout';
//Routes for Admin
$route['admin/dashboard'] = 'welcome/Admin/index';
$route['admin/alltickets'] = 'welcome/Admin/alltickets';
$route['admin/allclosedtickets'] = 'welcome/Admin/allclosedtickets';
//$route['upload'] = 'welcome/Login/upload';
$route['admin/ticket-details/(:any)'] = 'welcome/Admin/ticket_details/$1';
$route['admin/saveadminmessage'] = 'welcome/Admin/saveadminmessage';
$route['admin/assignedticketbyadmin'] = 'welcome/Admin/assignedticketbyadmin';
$route['admin/unassigned-ticket'] = 'welcome/Admin/unassigned_ticket';
$route['admin/assignedticketbyadmins'] = 'welcome/Admin/assignedticketbyadmins';
$route['admin/mytickets'] = 'welcome/Admin/mytickets';
$route['admin/answered'] = 'welcome/Admin/answered';
$route['admin/profile'] = 'welcome/Admin/profile';
$route['admin/overdue'] = 'welcome/Admin/overdue';
$route['admin/allstaff'] = 'welcome/Admin/allstaff';
$route['admin/allstaff-details/(:any)'] = 'welcome/Admin/allstaff_details/$1';
$route['admin/changestaffstatus'] = 'welcome/Admin/changestaffstatus';
$route['admin/department'] = 'welcome/Admin/departmentlist';
$route['admin/adddepartment'] = 'welcome/Admin/adddepartment';
$route['admin/deletefromdepart'] = 'welcome/Admin/deletefromdepart';
$route['admin/editslatime'] = 'welcome/Admin/editslatime';
$route['admin/helptopic'] = 'welcome/Admin/helptopic';
$route['admin/addhelptopic'] = 'welcome/Admin/addhelptopic';
$route['admin/deletefromhelptopic'] = 'welcome/Admin/deletefromhelptopic';
$route['admin/edithelptopic'] = 'welcome/Admin/edithelptopic';
$route['admin/faq'] = 'welcome/Admin/faq';
$route['admin/addfaq'] = 'welcome/Admin/addfaq';
$route['admin/deletefromfaq'] = 'welcome/Admin/deletefromfaq';
$route['admin/editfaq'] = 'welcome/Admin/editfaq';
$route['admin/editdepartment'] = 'welcome/Admin/editdepartment';
$route['admin/approvestaff'] = 'welcome/Admin/approvestaff';
$route['admin/changepassword'] = 'welcome/Admin/changepassword';
$route['admin/subcategoty'] = 'welcome/Admin/subcategoty';
$route['admin/adssubcategory'] = 'welcome/Admin/adssubcategory';
$route['admin/editsubcat'] = 'welcome/Admin/editsubcat';
$route['admin/deletefromsubcat'] = 'welcome/Admin/deletefromsubcat';
$route['admin/faqanswers'] = 'welcome/Admin/faqanswers';

//Routes for ticketstatus

$route['checkticket-status'] = 'welcome/Ticketstatus/index';
$route['ticketstatuscheck'] = 'welcome/Ticketstatus/ticketstatuscheck';
$route['ticket/dashboard'] = 'welcome/Myticket/index';
$route['ticket/allmyticket'] = 'welcome/Myticket/allmyticket';
$route['ticket/allmytickets'] = 'welcome/Myticket/allmytickets';
$route['ticket/details/(:any)'] = 'welcome/Myticket/details/$1';
$route['ticket/saveotmessage'] = 'welcome/Myticket/saveotmessage';

//Routes for Team Leaders
$route['tl/dashboard'] = 'welcome/Teamleader/index';
$route['tl/alltickets'] = 'welcome/Teamleader/alltickets';
$route['tl/allclosedtickets'] = 'welcome/Teamleader/allclosedtickets';
$route['tl/assignedticketbytl'] = 'welcome/Teamleader/assignedticketbytl';
$route['tl/myticket'] = 'welcome/Teamleader/myticket';
$route['tl/answered'] = 'welcome/Teamleader/answered';
$route['tl/unassignedticket'] = 'welcome/Teamleader/unassignedticket';
$route['tl/assignedname'] = 'welcome/Teamleader/assignedname';
$route['tl/ticketdetails/(:any)'] = 'welcome/Teamleader/ticketdetails/$1';
$route['tl/overdue'] = 'welcome/Teamleader/overdue';
$route['tl/savetlmessage'] = 'welcome/Teamleader/savetlmessage';
$route['tl/profile'] = 'welcome/Teamleader/profile';
$route['tl/allstaff'] = 'welcome/Teamleader/allstaff';
$route['tl/allstaff-details/(:any)'] = 'welcome/Teamleader/allstaff_details/$1';
$route['tl/changepassword'] = 'welcome/Teamleader/changepassword';
$route['tl/create-account'] = 'welcome/Teamleader/create_account';
$route['tl/savedataintosignuptab'] = 'welcome/Teamleader/savedataintosignuptab';
$route['tl/changestaffstatus'] = 'welcome/Teamleader/changestaffstatus';

$route['tl/helptopic'] = 'welcome/Teamleadersettng/index';
$route['tl/addhelptic'] = 'welcome/Teamleadersettng/addhelptic';
$route['tl/editaddhelptic'] = 'welcome/Teamleadersettng/editaddhelptic';
$route['tl/deletefromhelptc'] = 'welcome/Teamleadersettng/deletefromhelptc';
$route['tl/subcategoty'] = 'welcome/Teamleadersettng/subcategoty';
$route['tl/addsubcat'] = 'welcome/Teamleadersettng/addsubcat';
$route['tl/deletefromsubact'] = 'welcome/Teamleadersettng/deletefromsubact';
$route['tl/editsubcat'] = 'welcome/Teamleadersettng/editsubcat';
$route['tl/faq'] = 'welcome/Teamleadersettng/faq';
$route['tl/addfaq'] = 'welcome/Teamleadersettng/addfaq';
$route['tl/editfaq'] = 'welcome/Teamleadersettng/editfaq';
$route['tl/deletefromfaq'] = 'welcome/Teamleadersettng/deletefromfaq';
$route['tl/addfaqans'] = 'welcome/Teamleadersettng/addfaqans';
$route['tl/editfaq_ans'] = 'welcome/Teamleadersettng/editfaq_ans';

//Routes for Team Staff
$route['staff/dashboard'] = 'welcome/Staff/index';
$route['staff/all-tickets'] = 'welcome/Staff/all_tickets';
$route['staff/allmy_tickets'] = 'welcome/Staff/allmy_tickets';
$route['staff/details/(:any)'] = 'welcome/Staff/details/$1';
$route['staff/saveot_message'] = 'welcome/Staff/saveot_message';
$route['staff/profile'] = 'welcome/Staff/profile';
$route['staff/changepassword'] = 'welcome/Staff/changepassword';

$route['forgotpassword'] = 'welcome/Forgotpassword/index';
$route['f_password'] = 'welcome/Forgotpassword/f_password';
$route['reset-password/(:any)'] = 'welcome/Forgotpassword/reset_password/$1';
$route['updatepassword'] = 'welcome/Forgotpassword/updatepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
