<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
function dateTimeToHtml($date){
    if($date==''){
        return '';
    }
    $phpdate = strtotime( $date );
    $mysqldate = date( 'd/m/Y H:i:s', $phpdate );
    return  $mysqldate;
}

// DB table to use
$table = 'caja_familia';
 
// Table's primary key
$primaryKey = 'caja_familia.id_caja_familia';
 
$id_estado_caja_familia = $_GET['id_estado_caja_familia'];
$id_centro_acopio = $_GET['id_centro_acopio'];
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'caja_familia.id_caja_familia', 'dt' => 0 ),
    array( 'db' => 'caja_familia.rut_destinatario', 'dt' => 1 ),
    array( 'db' => 'caja_familia.nombre_destinatario', 'dt' => 2 ),
    array( 'db' => 'caja_familia.fecha_creacion', 'dt' => 3 , 'formatter' => function($d, $row){
        return dateTimeToHtml($d);
    }),
    array( 'db' => 'caja_familia.fecha_entrega', 'dt' => 4 ),
    array( 'db' => 'caja.nombre_caja', 'dt' => 5 )

    );

$join = 'LEFT JOIN caja ON caja.id_caja = caja_familia.id_caja';

$where = '  caja_familia.id_estado_caja_familia = '.$id_estado_caja_familia.' 
            AND caja_familia.id_centro_acopio = '.$id_centro_acopio .' ';

$tableAs = "";

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'acopiochile_db',
    'host' => 'localhost'
);
/*$sql_details = array(
    'user' => 'acopioch_usu',
    'pass' => 'th3w3b0n4',
    'db'   => 'acopioch_db',
    'host' => 'localhost'
);*/
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../../tools/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $join, $where, $tableAs )
);