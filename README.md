## CanteRa5 (OSWA - Inventory v.2.1)

#Warehouse inventory system
- - - -

OSWA-INV is a web based Inventory System, that will allow you to keep tracking of the quantity buying and selling price of the products existing in your warehouse or business. When creating a new products, you can set a quantity, buying and selling price. 

The application was initially created by **Siamon Hasan**, using [php](http:php.net), [mysql](https://www.mysql.com) and [bootstrap](http://getbootstrap.com).

CanteRa5 (OSWA - Inventory v.2.1) modification made by [David Rengifo](http://david.rengifo.mx) to update the frameworks JQuery 3.3.1, Bootstrap 3.4.1 and Bootstrap Datepicker 1.9.0 besides incorporating the bilingual capacity (English - Spanish) and include some other improvements.

![CanteRa5 (OSWA - Inventory v.2.1)](http://cant.era5.mx/cantera5ss.jpg)

****

If you find any bug, and a fix for that bug, please leave a comment on the github page for this project and i will push the change into the master branch.


### Installing this application is fairly easy, just follow these steps:
****


1. Download the latest version with git (`git clone https://github.com/era5mx/cantera5.git`)

2. Import/load cantera5.sql into your mysql database. This should set up the basic structure of the database system.

3. Modify the includes/config.php and change the variables to match your host, port, database name, username and passwords.

4. Modify the includes/config.php and define the application configuration.

5. Change all Folder permission inside uploads folder either add them to group call `www` if available or `777`.

6. Then loging by typing **username** and **password**:


   Administrator        | Special User           | Default User
   ---------------------| -----------------------| -------------------
   **Username** : admin | **Username** : special | **Username** : user
   **Password** : admin | **Password** : special | **Password** : user

7. Good luck!  
