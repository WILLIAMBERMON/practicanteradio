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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'index/index';
$route['unoticia'] = 'unoticia/listado_noticias';
$route['unoticia/(:any)'] = 'unoticia/index/$1';
$route['unoticia/boletin_informativo/(:any)'] = 'unoticia/boletin_informativo/$1';
$route['unoticia/listado_noticias'] = 'unoticia/listado_noticias';
$route['informacion/(:any)'] = 'unoticia/informacion/$1';
$route['ufps_conticgo'] = 'unoticia/estrategias_covid/ufps_conticgo';
$route['ufps_conticgo_est'] = 'unoticia/estrategias_covid/ufps_conticgo_est';
$route['ufps_conticgo_doc'] = 'unoticia/estrategias_covid/ufps_conticgo_doc';
$route['ufps_conticgo_adm'] = 'unoticia/estrategias_covid/ufps_conticgo_adm';
$route['ueventos/(:any)'] = 'ueventos/index/$1';
$route['ueventos/calendario'] = 'ueventos/calendario';
$route['udestacado/(:any)'] = 'udestacado/index/$1';
$route['udestacado/listado_destacados'] = 'udestacado/listado_destacados';
$route['universidad/rectoria/(:any)'] = 'universidad/rectoria/$1';
//$route['universidad/(:any)'] = 'universidad/index/$1';
//$route['universidad/(:any)/(:any)'] = 'universidad/index/$1/$2';
//$route['universidad/(:any)/(:any)/(:any)'] = 'universidad/index/$1/$2/$3';
$route['universidad/normatividad'] = 'universidad/normatividad';
$route['universidad/normatividad/(:any)'] = 'universidad/normatividad/44/$1';
$route['universidad/normatividad/(:any)/(:any)'] = 'universidad/normatividad/44/$1/$2';
$route['universidad/atencion_ciudadano'] = 'universidad/atencion_ciudadano';
$route['universidad/atencion_ciudadano/(:any)'] = 'universidad/atencion_ciudadano/152/$1';
$route['universidad/transparencia'] = 'universidad/transparencia';
$route['universidad/transparencia/(:any)'] = 'universidad/transparencia/152/$1';
$route['universidad/convocatorias'] = 'universidad/convocatorias';
$route['universidad/convocatorias/(:any)'] = 'universidad/convocatorias/$1';
$route['universidad/seleccion'] = 'universidad/seleccion';
$route['universidad/seleccion/(:any)'] = 'universidad/seleccion/$1';
$route['universidad/perfiles/(:any)/(:any)'] = 'universidad/perfiles/$1/$2';
$route['organismo/(:any)/(:any)'] = 'universidad/organismo/$1/$2';
$route['organismo/(:any)/(:any)/(:any)'] = 'universidad/organismo/$1/$2/$3';
$route['universidad/(:any)/(:any)'] = 'universidad/institucion/$1/$2';
$route['universidad/(:any)/(:any)/(:any)'] = 'universidad/institucion/$1/$2/$3';
$route['vicerrectoria/(:any)/(:any)'] = 'universidad/vicerrectoria/$1/$2';

$route['radiocontenido/(:any)/(:any)'] = 'radiocontenido/institucion/$1/$2';
$route['ufpsradio'] = 'uradio';

$route['universidad/audiencia_publica'] = 'universidad/audiencia_publica';

$route['oferta-academica/(:any)'] = 'useccion/index/$1';
$route['oferta-academica/(:any)/(:any)'] = 'useccion/index/$1/$2';
$route['oferta-academica/(:any)/(:any)/(:any)'] = 'useccion/index/$1/$2/$3';

$route['seccion/(:any)/(:any)'] = 'useccion/contenido/$1/$2';
$route['seccion/calendario'] = 'useccion/calendario';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
