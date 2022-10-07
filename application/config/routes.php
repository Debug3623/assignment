<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
| my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'auth';

/*
|----------------------------------------------------------------------
| SUPPLIER API ROUTES
|----------------------------------------------------------------------
*/
$route['auth/signup'] = 'auth/signup';
$route['auth/login'] = 'auth/Login';
$route['auth/profile/update'] = 'auth/updateProfileImage';
$route['auth/social/login'] = 'auth/socialLogin';
$route['auth/password/forgot'] = 'auth/forgotPassword';
$route['auth/password/verifycode'] = 'auth/verifyPasswordCode';
$route['auth/password/reset'] = 'auth/resetPassword';
$route['auth/changePassword'] = 'auth/changePassword';
$route['auth/updatePassword'] = 'auth/updatePassword';
$route['supplier/getcurrency'] = 'supplier/getCurrency';
$route['supplier/getbrands'] = 'supplier/getBrands';
$route['supplier/updatecurrency'] = 'supplier/updateCurrency';
$route['supplier/brand/logo'] = 'supplier/updateBrandLogo';
$route['supplier/brand/name'] = 'supplier/updateBrand';
$route['supplier/profile'] = 'supplier/getProfile';
$route['supplier/profile/update'] = 'supplier/updateProfile';
$route['supplier/getproductscurrinces'] = 'supplier/getBrandCurrency';
$route['supplier/convert/currency'] = 'supplier/currency_file';
$route['invoice'] = 'Welcome/invoice';

/*
|----------------------------------------------------------------------
| CUSTOMER API ROUTES
|----------------------------------------------------------------------
*/
$route['auth/customer/signup'] = 'auth/customerSignup';
$route['customer/updateprofile'] = 'customer/updateProfile';
$route['customer/getprofile'] = 'customer/getProfile';
$route['customer/getcustomers'] = 'customer/getcustomers';


/*
|----------------------------------------------------------------------
| PRODUCT API ROUTES
|----------------------------------------------------------------------
*/
$route['books'] = 'books/getBooks';
$route['books/add'] = 'books/addBooks';
$route['books/getAll'] = 'books/getBooksAll';

$route['products/update'] = 'products/updateProduct';
$route['books/book'] = 'books/getSingleBook';
$route['products/delete'] = 'products/deleteProduct';
$route['books/getBooksOfCategory'] = 'books/getBooksOfCategory';
$route['books/getBooksOfUser'] = 'books/getBooksOfUser';




/*
|----------------------------------------------------------------------
| CATEGORY API ROUTES
|----------------------------------------------------------------------
*/
$route['categories/all'] = 'categories/getAllCategories';
$route['categories/add'] = 'categories/addCategory';
$route['categories/delete'] = 'categories/deleteCategory';
$route['categories/update'] = 'categories/updateCategory';
$route['categories/category'] = 'categories/getSingleCategory';

/*
|----------------------------------------------------------------------
| INVOICE API ROUTES
|----------------------------------------------------------------------
*/
$route['invoice'] = 'invoice/getProducts';
$route['invoices/add'] = 'invoices/addProductCart';
$route['invoice/update'] = 'invoice/updateProduct';
$route['invoice/product'] = 'invoice/getSingleProduct';
$route['invoices/cart/delete'] = 'invoices/deleteProductCartItem';
$route['invoices/cart/profile'] = 'invoices/cartProductProfile';
$route['invoices/cart/complete'] = 'invoices/completeCartProduct';
$route['invoices/update'] = 'invoices/updateInvoices';
$route['invoices/details'] = 'invoices/invoiceDetails';
$route['invoices/customer/assign'] = 'invoices/InvoiceAssignCustomer';
$route['invoices/customerInvoices'] = 'invoices/getCustomerInvoice';
$route['invoices/customerInvoice/details'] = 'invoices/getCustomerInvoiceDetails';
$route['invoices/processingstatus/update'] = 'invoices/updateProcessingStatus';
$route['invoices/finalinvoices/update'] = 'invoices/updateFinalInvoices';
$route['invoices/status/update'] = 'invoices/updateInvoiceStatus';
$route['invoices/unassign'] = 'invoices/unAssignInvoices';
$route['invoices/unassigned/add'] = 'invoices/addUnassignedInvoice';
$route['invoices/orders'] = 'invoices/getOrders';
$route['invoices/monthly'] = 'invoices/getMonthlyInvoice';
$route['invoices/delete'] = 'invoices/deleteInvoice';
$route['invoices/final'] = 'invoices/finalInvoices';




