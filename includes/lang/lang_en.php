<?php
/*
 * ------------------------------------------------------------------------
 * CanteRa5 (OWSA-INV V2.1)
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 * 
 * Basado en: OSWA-INV (https://github.com/siamon123/warehouse-inventory-system)
 */

//COMMONS
define('NAME', 'Name');
define('USERNAME', 'Username');

//STATUS
define('STATUS', 'Status');
define('ACTIVE', 'Active');
define('INACTIVE', 'Inactive');

//ACTIONS
define('ACTIONS', 'Actions');
define('SELECT', 'Select ');
define('EDIT', 'Edit ');
define('UPDATE', 'Update ');
define('REMOVE', 'Remove ');
define('CHANGE', 'Change ');
define('UPLOAD', 'Upload ');
define('UPLOADED_SUCCESSFULLY', ' has been uploaded successfully!');
define('UPDATED_SUCCESSFULLY', ' has been updated successfully!');
define('CREATED_SUCCESSFULLY', ' has been created successfully!');

//ENTITY
define('ACCOUNT', 'Account');
define('CATEGORIE', 'Categorie');
define('GROUP', 'Group');
define('PRODUCT', 'Product');
define('SALE', 'Sale');
define('USER', 'User');

//PAGE TITLES
define('ADMIN_HOME_PAGE', 'Admin Home Page');
define('ADD_PRODUCT_TITLE', 'Add Product');
define('ADD_GROUP_TITLE', 'Add Group');
define('ADD_SALE_TITLE', 'Add Sale');
define('ADD_USER_TITLE', 'Add User');
define('ALL_USER_TITLE', 'All User');
define('ALL_CATEGORIES_TITLE', 'All Categories');
define('CHANGE_PASSWORD_TITLE', 'Change Password');
define('DAILY_SALES_TITLE', 'Daily Sales');
define('EDIT_CATEGORIE_TITLE', 'Edit Categorie');
define('EDIT_GROUP_TITLE', 'Edit Group');
define('EDIT_PRODUCT_TITLE', 'Edit Product');
define('EDIT_SALE_TITLE', 'Edit Sale');
define('EDIT_USER_TITLE', 'Edit User');
define('ALL_GROUP_TITLE', 'All Group');
define('HOME_PAGE_TITLE', 'Home Page');
define('ALL_IMAGE_TITLE', 'All Image');
define('MONTHLY_SALES_TITLE', 'Monthly Sales');
define('ALL_PRODUCT_TITLE', 'All Product');
define('MY_PROFILE_TITLE', 'My Profile');
define('SALES_REPORT_TITLE', 'Sales Report');
define('ALL_SALE_TITLE', 'All Sale');
define('SALE_REPORT_TITLE', 'Sale Report');

//MENU
define('DASHBOARD', 'Dashboard');
define('USER_MANAGEMENT', 'User Management');
define('MANAGE_GROUPS', 'Manage Groups');
define('MANAGE_USERS', 'Manage Users');
define('USERS', 'Users');
define('CATEGORIES', 'Categories');
define('PRODUCTS', 'Products');
define('MANAGE_PRODUCTS', 'Manage products');
define('ADD_PRODUCT', 'Add product');
define('MEDIAS', 'Medias');
define('SALES', 'Sales');
define('MANAGE_SALES', 'Manage Sales');
define('ADD_SALE', 'Add Sale');
define('SALES_REPORT', 'Sales Report');
define('SALES_BY_DATES', 'Sales by dates');
define('MONTHLY_SALES', 'Monthly sales');
define('DAILY_SALES', 'Daily sales');
define('PROFILE', 'Profile');
define('SETTINGS', 'Settings');
define('LOGOUT', 'Logout');

//INDEX
define('HELLO', 'Hello ');
define('WELCOME', 'Welcome');
define('A', ' to ');
define('SIGN_IN_TO_START_YOUR_SESSION', 'Sign in to start your session');
define('PASSWORD', 'Password');
define('LOGIN', 'Login');

//DASHBOARD
define('HIGHEST_SALEING_PRODUCTS', 'Highest Saleing Products');
define('LATEST_SALES', 'Latest Sales');
define('RECENTLY_ADDED_PRODUCTS', 'Recently Added Products');
define('TITLE', 'Title');
define('TOTAL_SOLD', 'Total Sold');
define('TOTAL_QUANTITY', 'Total Quantity');
define('PRODUCT_NAME', 'Product Name');
define('DATE', 'Date');
define('TOTAL_SALE', 'Total Sale');

//ACCOUNT
define('EDIT_ACCOUNT', 'Edit Account');
define('EDIT_MY_ACCOUNT', 'Edit My Account');
define('EDIT_PROFILE', 'Edit profile');
define('CHANGE_MY_PHOTO', 'Change My Photo');
define('CHOOSE_FILE_TO_UPLOAD', 'Choose file to upload...');
define('PHOTO_HAS_BEEN_UPLOADED', 'photo has been uploaded.');
define('LANGUAGE', 'Language');
define('CHANGE_PASSWORD', 'Change Password');

//CATEGORIE
define('CATEGORIE_NAME', 'Categorie Name');
define('ADD_NEW_CATEGORIE', 'Add New Categorie');
define('ADD_CATEGORIE', 'Add Categorie');
define('UPDATE_CATEGORIE', 'Update Categorie');
define('CATEGORIE_DELETED','Categorie deleted.');
define('CATEGORIE_DELETION_FAILED','Categorie deletion failed.');

//GROUP
define('GROUPS', 'Groups');
define('ADD_NEW_USER_GROUP', 'Add New User Group');
define('GROUP_NAME', 'Group Name');
define('GROUP_LEVEL', 'Group Level');

//PRODUCT
define('ADD_NEW_PRODUCT', 'Add Product');
define('PHOTO', 'Photo');
define('PRODUCT_TITLE', 'Product Title');
define('PRODUCT_CATEGORIE', 'Product Categoríe');
define('PRODUCT_PHOTO', 'Product Photo');
define('PRODUCT_QUANTITY', 'Product Quantity');
define('IN_STOCK', 'In Stock');
define('PRODUCT_ADDED', 'Product Added');
define('PRODUCT_DELETED','Product deleted.');
define('PRODUCT_DELETION_FAILED','Product deletion failed.');
define('PHOTO','Photo');
define('PHOTO_NAME','Photo Name');
define('PHOTO_TYPE','Photo Type');

//SALE
define('ADD_SALE', 'Add Sale');
define('FIND_IT', 'Find It');
define('SEARCH_FOR_PRODUCT_NAME', 'Search for product name');
define('DATE_RANGE', 'Date Range');
define('GENERATE_REPORT', 'Generate Report');
define('FROM', 'From');
define('TO', 'To');
define('DATE_REPORT', 'Date');
define('PRODUCT_TITLE_REPORT', 'Product Title');
define('QUANTITY', 'Quantity');
define('QUANTITY_SOLD_REPORT', 'Quantity Sold');
define('BUYING_PRICE_REPORT', 'Buying Price');
define('SELLING_PRICE_REPORT', 'Selling Price');
define('TOTAL_QTY_REPORT', 'Total Qty');
define('TOTAL_REPORT', 'TOTAL');
define('GRAND_TOTAL', 'Grand Total');
define('PROFIT', 'Profit');

define('ITEM', 'Item');
define('PRICE', 'Price');
define('QTY', 'Qty.');
define('TOTAL', 'Total');
define('ACTION', 'Action');

//USER
define('ADD_USER', 'Add User');
define('ADD_NEW_USER', 'Add New User');
define('USER_ROLE', 'User Role');
define('LAST_LOGIN', 'Last Login');
define('USER_PASSWORD', 'User Password');
define('USER_PASSWORD_HAS_BEEN_UPDATED', 'User password has been updated!');
define('CHANGE_YOUR_PASSWORD', 'Change your Password');
define('NEW_PASSWORD', 'New Password');
define('OLD_PASSWORD', 'Old Password');
define('TYPE_USER_NEW_PASSWORD','Type user new password');
define('YOUR_OLD_PASSWORD_NOT_MATCH', 'Your old password not match');
define('LOGIN_WITH_YOUR_NEW_PASSWORD', 'Login with your new password.');
define('USER_DELETED','User deleted.');
define('USER_DELETION_FAILED_OR_MISSING_PRM','User deletion failed Or Missing Prm.');

//MESSAGES
define('INFO_HOME_H1', 'This is your new home page!');
define('INFO_HOME_P', 'Just browes around and find out what page you can access.');

//ERRORS
define('SORRY', '<b>Sorry!</b> ');
define('USERNAME_PASSWORD_INCORRECT', ' Username/Password incorrect.');
define('PRODUCT_NAME_NOT_REGISTER_IN_DATABASE', 'product name not register in database');
define('ERROR_ON_THIS_QUERY', 'Error on this Query :');
define('ENTERED_GROUP_NAME_ALREADY_IN_DATABASE', 'Entered Group Name already in database!');
define('ENTERED_GROUP_LEVEL_ALREADY_IN_DATABASE', 'Entered Group Level already in database!');
define('FAILED_TO_ADDED', 'Failed to added ');
define('FAILED_TO_CREATE', 'Failed to create ');
define('FAILED_TO_UPDATED', 'Failed to updated ');
define('NO_SALES_HAS_BEEN_FOUND', 'No sales has been found. ');
define('THE_FIELD','The field ');
define('CANT_BE_BLANK',' can\'t be blank.');

?>