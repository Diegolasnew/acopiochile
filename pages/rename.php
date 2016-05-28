<?php
$directorio = 'categoria_tipo_aporte - copia';
$oldDir = $directorio;

$buscar = 'categoria_tipo_aporte';
$reemplazo = 'tipo_aporte';

$ficheros1  = $scanned_directory = array_diff(scandir($directorio), array('..', '.'));
var_dump($ficheros1);

foreach ($ficheros1 as $key => $value) {
	
	$file = $directorio.'/'.$value;

	if(!is_dir($file)){
		$data = file_get_contents($file);

		// do tag replacements or whatever you want
		$data = str_replace($buscar, $reemplazo, $data);

		//save it back:
		file_put_contents($file, $data);
	}
	rename($directorio.'/'.$value, $directorio.'/'.str_replace($buscar, $reemplazo, $value));
}






$directorio = $directorio.'/mod_'.$reemplazo;

$ficheros1  = $scanned_directory = array_diff(scandir($directorio), array('..', '.'));
var_dump($ficheros1);

foreach ($ficheros1 as $key => $value) {
	
	$file = $directorio.'/'.$value;

	if(!is_dir($file)){
		$data = file_get_contents($file);

		// do tag replacements or whatever you want
		$data = str_replace($buscar, $reemplazo, $data);

		//save it back:
		file_put_contents($file, $data);
	}
	rename($directorio.'/'.$value, $directorio.'/'.str_replace($buscar, $reemplazo, $value));
}
$ficheros1  = $scanned_directory = array_diff(scandir($directorio), array('..', '.'));

rename($oldDir, $reemplazo);

var_dump($ficheros1);
?>