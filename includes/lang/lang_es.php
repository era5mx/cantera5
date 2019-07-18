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
define('NAME', 'Nombre');
define('USERNAME', 'Usuario');

//STATUS
define('STATUS', 'Estatus');
define('ACTIVE', 'Activo');
define('INACTIVE', 'Inactivo');

//ACTIONS
define('ACTIONS', 'Acciones');
define('SELECT', 'Selecciona ');
define('EDIT', 'Editar ');
define('UPDATE', 'Actualizar ');
define('REMOVE', 'Eliminar ');
define('CHANGE', 'Cambiar ');
define('UPLOAD', 'Subir ');
define('UPLOADED_SUCCESSFULLY', ' ha sido subido exitosamente!');
define('UPDATED_SUCCESSFULLY', ' ha sido actualizado exitosamente');
define('CREATED_SUCCESSFULLY', ' ha sido creado exitosamente');

//ENTITY
define('ACCOUNT', 'Cuenta');
define('CATEGORIE', 'Categoria');
define('GROUP', 'Grupo');
define('PRODUCT', 'Producto');
define('SALE', 'Venta');
define('USER', 'Usuario');

//PAGE TITLES
define('ADMIN_HOME_PAGE', 'Admin Home Page');
define('ADD_PRODUCT_TITLE', 'Añadir Producto');
define('ADD_GROUP_TITLE', 'Añadir Grupo');
define('ADD_SALE_TITLE', 'Añadir Venta');
define('ADD_USER_TITLE', 'Añadir Usuario');
define('ALL_USER_TITLE', 'Todos los usuarios');
define('ALL_CATEGORIES_TITLE', 'Todas las Categorias');
define('CHANGE_PASSWORD_TITLE', 'Cambiar Contraseña');
define('DAILY_SALES_TITLE', 'Ventas Diarias');
define('EDIT_CATEGORIE_TITLE', 'Editar Categoría');
define('EDIT_GROUP_TITLE', 'Editar Grupo');
define('EDIT_PRODUCT_TITLE', 'Editar Producto');
define('EDIT_SALE_TITLE', 'Editar Venta');
define('EDIT_USER_TITLE', 'Editar Usuario');
define('ALL_GROUP_TITLE', 'Todos los Grupos');
define('HOME_PAGE_TITLE', 'Página de Inicio');
define('ALL_IMAGE_TITLE', 'Todas las Imágenes');
define('MONTHLY_SALES_TITLE', 'Ventas Mensuales');
define('ALL_PRODUCT_TITLE', 'Todos los Productos');
define('MY_PROFILE_TITLE', 'Mi Perfil');
define('SALES_REPORT_TITLE', 'Informe de Ventas');
define('ALL_SALE_TITLE', 'Todas las Ventas');
define('SALE_REPORT_TITLE', 'Informe de Ventas');

//MENU
define('DASHBOARD', 'Tablero de control');
define('USER_MANAGEMENT', 'Gestión de Usuarios');
define('MANAGE_GROUPS', 'Administrar Grupos');
define('MANAGE_USERS', 'Administrar Usuarios');
define('USERS', 'Usuarios');
define('CATEGORIES', 'Categorias');
define('PRODUCTS', 'Productos');
define('MANAGE_PRODUCTS', 'Administrar productos');
define('ADD_PRODUCT', 'Añadir producto');
define('MEDIAS', 'Imagenes');
define('SALES', 'Ventas');
define('MANAGE_SALES', 'Gestión de ventas');
define('ADD_SALE', 'Añadir venta');
define('SALES_REPORT', 'Reporte de ventas');
define('SALES_BY_DATES', 'Ventas por fecha');
define('MONTHLY_SALES', 'Ventas mensuales');
define('DAILY_SALES', 'Ventas diarias');
define('PROFILE', 'Perfil');
define('SETTINGS', 'Ajustes');
define('LOGOUT', 'Salir');

//INDEX
define('HELLO', 'Hola ');
define('WELCOME', 'Bienvenido');
define('A', ' a ');
define('SIGN_IN_TO_START_YOUR_SESSION', 'Ingresa para iniciar tu sesión');
define('PASSWORD', 'Contraseña');
define('LOGIN', 'Entrar');

//DASHBOARD
define('HIGHEST_SALEING_PRODUCTS', 'Productos de mayor venta');
define('LATEST_SALES', 'Últimas ventas');
define('RECENTLY_ADDED_PRODUCTS', 'Productos recientemente agregados');
define('TITLE', 'Titulo');
define('TOTAL_SOLD', 'Venta Total');
define('TOTAL_QUANTITY', 'Cantidad Total');
define('PRODUCT_NAME', 'Nombre del Producto');
define('DATE', 'Fecha');
define('TOTAL_SALE', 'Venta total');

//ACCOUNT
define('EDIT_ACCOUNT', 'Editar Cuenta');
define('EDIT_MY_ACCOUNT', 'Editar Mi Cuenta');
define('EDIT_PROFILE', 'Editar perfil');
define('CHANGE_MY_PHOTO', 'Cambiar Mi Foto');
define('CHOOSE_FILE_TO_UPLOAD', 'Selecciona el archivo a subir...');
define('PHOTO_HAS_BEEN_UPLOADED', 'La foto ha sido subida.');
define('LANGUAGE', 'Lenguaje');
define('CHANGE_PASSWORD', 'Cambiar Contraseña');

//CATEGORIE
define('CATEGORIE_NAME', 'Nombre de Categoria');
define('ADD_NEW_CATEGORIE', 'Añadir Nueva Categoria');
define('ADD_CATEGORIE', 'Añadir Categoria');
define('UPDATE_CATEGORIE', 'Actualizar Categoria');
define('CATEGORIE_DELETED','Categoria Eliminada.');
define('CATEGORIE_DELETION_FAILED','Ocurrió un error al intentar eliminar la Categoría.');

//GROUP
define('GROUPS', 'Grupos');
define('ADD_NEW_USER_GROUP', 'Añadir Nuevo Grupo de Usuario');
define('GROUP_NAME', 'Nombre del Grupo');
define('GROUP_LEVEL', 'Nivel del Grupo');

//PRODUCT 
define('ADD_NEW_PRODUCT', 'Añadir Producto');
define('PHOTO', 'Foto');
define('PRODUCT_TITLE', 'Título del Producto');
define('PRODUCT_CATEGORIE', 'Categoría del Producto');
define('PRODUCT_PHOTO', 'Foto del Producto');
define('PRODUCT_QUANTITY', 'Cantidad de Producto');
define('IN_STOCK', 'En Existencia');
define('PRODUCT_ADDED', 'Producto Añadido');
define('PRODUCT_DELETED','Producto Eliminado.');
define('PRODUCT_DELETION_FAILED','Ocurrió un error al intentar eliminar el Producto.');
define('PHOTO','Foto');
define('PHOTO_NAME','Nombre de la Foto');
define('PHOTO_TYPE','Tipo de la Foto');

//SALE
define('ADD_SALE', 'Añadir Venta');
define('FIND_IT', 'Encuéntralo');
define('SEARCH_FOR_PRODUCT_NAME', 'Buscar el nombre del producto');
define('DATE_RANGE', 'Rango de Fechas');
define('GENERATE_REPORT', 'Generar Reporte');
define('FROM', 'Desde');
define('TO', 'Hasta');
define('DATE_REPORT', 'Fecha');
define('PRODUCT_TITLE_REPORT', 'Titulo del Producto');
define('QUANTITY', 'Cantidad');
define('QUANTITY_SOLD_REPORT', 'Cantidad Vendida');
define('BUYING_PRICE_REPORT', 'Precio de Compra');
define('SELLING_PRICE_REPORT', 'Precio de Venta');
define('TOTAL_QTY_REPORT', 'Cantidad Total');
define('TOTAL_REPORT', 'TOTAL');
define('GRAND_TOTAL', 'Gran Total');
define('PROFIT', 'Ganancia');

define('ITEM', 'Elemento');
define('PRICE', 'Precio');
define('QTY', 'Cant.');
define('TOTAL', 'Total');
define('ACTION', 'Acción');

//USER
define('ADD_USER', 'Añadir Usuario');
define('ADD_NEW_USER', 'Añadir Nuevo Usuario');
define('USER_ROLE', 'Rol del Usuario');
define('LAST_LOGIN', 'Último Ingreso');
define('USER_PASSWORD', 'La Contraseña');
define('USER_PASSWORD_HAS_BEEN_UPDATED', 'La contraseña ha sido actualizada!');
define('CHANGE_YOUR_PASSWORD', 'Cambia tu Contraseña');
define('NEW_PASSWORD', 'Nueva Contraseña');
define('OLD_PASSWORD', 'Vieja Contraseña');
define('TYPE_USER_NEW_PASSWORD','Ingrese una nueva Contraseña');
define('YOUR_OLD_PASSWORD_NOT_MATCH', 'Tu contraseña anterior no coincide');
define('LOGIN_WITH_YOUR_NEW_PASSWORD', 'Inicia sesión con tu nueva contraseña');
define('USER_DELETED','Usuario eliminado.');
define('USER_DELETION_FAILED_OR_MISSING_PRM','El borrado del Usuario falló');

//MESSAGES
define('INFO_HOME_H1', 'Esta es tu nueva página de inicio!');
define('INFO_HOME_P', 'Simplemente frunce el ceño y descubra a qué página puede acceder.');

//ERRORS
define('SORRY', '<b>Lo siento!</b> ');
define('USERNAME_PASSWORD_INCORRECT', ' Usuario/Contraseña incorrecto.');
define('PRODUCT_NAME_NOT_REGISTER_IN_DATABASE', 'Nombre de producto no registrado en la base de datos');
define('ERROR_ON_THIS_QUERY', 'Error en esta consulta :');
define('ENTERED_GROUP_NAME_ALREADY_IN_DATABASE', '¡Nombre de grupo ingresado ya en la base de datos!');
define('ENTERED_GROUP_LEVEL_ALREADY_IN_DATABASE', 'Nivel de grupo ingresado ya en la base de datos!');
define('FAILED_TO_ADDED', 'Ocurrió un fallo al añadir ');
define('FAILED_TO_CREATE', 'Ocurrió un fallo al crear ');
define('FAILED_TO_UPDATED', 'Ocurrió un fallo al actualizar ');
define('NO_SALES_HAS_BEEN_FOUND', 'No se han encontrado ventas. ');
define('THE_FIELD','El campo ');
define('CANT_BE_BLANK',' no puede estar vacio.');

?>