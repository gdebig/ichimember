<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//login anggota
$routes->get('/anggota', 'Anggota::index', ['filter' => 'authlogin']);
$routes->get('/anggota/profile', 'Anggota::profile', ['filter' => 'authlogin']);
$routes->get('/anggota/buatprofile', 'Anggota::buatprofile', ['filter' => 'authlogin']);
$routes->get('/anggota/buatprofileproses', 'Anggota::buatprofileproses', ['filter' => 'authlogin']);
$routes->get('/anggota/ubahprofile/(:any)', 'Anggota::ubahprofile/$1', ['filter' => 'authlogin']);
$routes->get('/anggota/ubahprofileproses', 'Anggota::ubahprofileproses', ['filter' => 'authlogin']);
$routes->get('/anggota/ubahpass/(:any)', 'Anggota::ubahpass/$1', ['filter' => 'authlogin']);
$routes->get('/anggota/ubahpassproses', 'Anggota::ubahpassproses', ['filter' => 'authlogin']);
$routes->get('/anggota/konfirmasi', 'Anggota::konfirmasi', ['filter' => 'authlogin']);
$routes->get('/anggota/konfirmproses', 'Anggota::konfirmproses', ['filter' => 'authlogin']);
$routes->get('/anggota/ubahrole', 'Anggota::ubahrole', ['filter' => 'authlogin']);
$routes->get('/pendidikan', 'Pendidikan::index', ['filter' => 'authlogin']);
$routes->get('/pendidikan/tambahpendidikan', 'Pendidikan::tambahpendidikan', ['filter' => 'authlogin']);
$routes->get('/pendidikan/tambahpendproses', 'Pendidikan::tambahpendproses', ['filter' => 'authlogin']);
$routes->get('/pendidikan/ubahpendidikan/(:any)', 'Pendidikan::ubahpendidikan/$1', ['filter' => 'authlogin']);
$routes->get('/pendidikan/ubahpendproses', 'Pendidikan::ubahpendproses', ['filter' => 'authlogin']);
$routes->get('/pendidikan/hapuspendidikan/(:any)', 'Pendidikan::hapuspendidikan/$1', ['filter' => 'authlogin']);
$routes->get('/pengkerja', 'Pengkerja::index', ['filter' => 'authlogin']);
$routes->get('/pengkerja/tambahkerja', 'Pengkerja::tambahkerja', ['filter' => 'authlogin']);
$routes->get('/pengkerja/tambahkerjaproses', 'Pengkerja::tambahkerjaproses', ['filter' => 'authlogin']);
$routes->get('/pengkerja/hapuskerja/(:any)', 'Pengkerja::hapuskerja/$1', ['filter' => 'authlogin']);
$routes->get('/pengkerja/ubahkerja/(:any)', 'Pengkerja::ubahkerja/$1', ['filter' => 'authlogin']);
$routes->get('/pengkerja/ubahkerjaproses', 'Pengkerja::ubahkerjaproses', ['filter' => 'authlogin']);
$routes->get('/organisasi', 'Organisasi::index', ['filter' => 'authlogin']);
$routes->get('/organisasi/tambahorg', 'Organisasi::tambahorg', ['filter' => 'authlogin']);
$routes->get('/organisasi/tambahorgproses', 'Organisasi::tambahorgproses', ['filter' => 'authlogin']);
$routes->get('/organisasi/hapusorg/(:any)', 'Organisasi::hapusorg/$1', ['filter' => 'authlogin']);
$routes->get('/organisasi/ubahorg/(:any)', 'Organisasi::ubahorg/$1', ['filter' => 'authlogin']);
$routes->get('/organisasi/ubahorgproses', 'Organisasi::ubahorgproses', ['filter' => 'authlogin']);
$routes->get('/publikasi', 'Publikasi::index', ['filter' => 'authlogin']);
$routes->get('/publikasi/tambahpub', 'Publikasi::tambahpub', ['filter' => 'authlogin']);
$routes->get('/publikasi/tambahpubproses', 'Publikasi::tambahpubproses', ['filter' => 'authlogin']);
$routes->get('/publikasi/hapuspub/(:any)', 'Publikasi::hapuspub/$1', ['filter' => 'authlogin']);
$routes->get('/publikasi/ubahpub/(:any)', 'Publikasi::ubahpub/$1', ['filter' => 'authlogin']);
$routes->get('/publikasi/ubahpubproses', 'Publikasi::ubahpubproses', ['filter' => 'authlogin']);

//login superadmin
$routes->get('/superadmin', 'Superadmin::index', ['filter' => 'authlogin']);
$routes->get('/mandpr', 'Mandpr::index', ['filter' => 'authlogin']);
$routes->get('/mandpr/tambahdpr', 'Mandpr::tambahdpr', ['filter' => 'authlogin']);
$routes->get('/mandpr/tambahdprproses', 'Mandpr::tambahdprproses', ['filter' => 'authlogin']);
$routes->get('/mandpr/ubahdpr/(:any)', 'Mandpr::ubahdpr/$1', ['filter' => 'authlogin']);
$routes->get('/mandpr/ubahdprproses', 'Mandpr::ubahdprproses', ['filter' => 'authlogin']);
$routes->get('/mandpr/hapusdpr/(:any)', 'Mandpr::hapusdpr/$1', ['filter' => 'authlogin']);
$routes->get('/mananggota', 'Mananggota::index', ['filter' => 'authlogin']);
$routes->get('/mananggota/tambahmember', 'Mananggota::tambahmember', ['filter' => 'authlogin']);
$routes->get('/mananggota/tambahmemberproses', 'Mananggota::tambahmemberproses', ['filter' => 'authlogin']);
$routes->get('/mananggota/ubahmember/(:any)', 'Mananggota::ubahmember/$1', ['filter' => 'authlogin']);
$routes->get('/mananggota/ubahmemberproses', 'Mananggota::ubahmemberproses', ['filter' => 'authlogin']);
$routes->get('/mananggota/hapusmember/(:any)', 'Mananggota::hapusmember/$1', ['filter' => 'authlogin']);

//login admin
$routes->get('/admin', 'Admin::index', ['filter' => 'authlogin']);
$routes->get('/infodpr', 'Infodpr::index', ['filter' => 'authlogin']);
$routes->get('/infodpr/ubahdpr/(:any)', 'Infodpr::ubahdpr/$1', ['filter' => 'authlogin']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}