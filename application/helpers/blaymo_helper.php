<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//-------------Recopilacion de  funciones cadena prop. general

function array_str( $aDatos ){
    
    $cad = '';
    foreach ($aDatos as $key => $value) {
        
        $cad .= $key.' = '. $value.' | ';
        
    }
    
    return $cad ; 
}

//devuelve la url sin la cadena "public/"
function my_url($param)
{        
    return str_replace('public/','',site_url($param));    
}

//formatea un numero estilo español
function numero_es($numero)
{    
    return number_format($numero,2,',','.');    
}

//formatea un numero estilo mysql
function numero_mysql($numero)
{    
    return number_format($numero,2,'.',',');    
}

//limpia un input de texto
function valida_input($data)
{    
    return cleanInput(trim(htmlspecialchars(strip_tags(stripslashes($data)), ENT_QUOTES|ENT_HTML5, 'ISO-8859-15')));
}

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
  
  
//rellena a 0 por la izquierda
function format_cero($nro)
{               
    return str_pad($nro,4,"0", STR_PAD_LEFT);
}  

//rellena a 0 por la izquierda
function cod_cte_prov($nro)
{               
    return str_pad($nro,5,"0", STR_PAD_LEFT);
}  


/**
 * Generate an encryption key for CodeIgniter.
 * http://codeigniter.com/user_guide/libraries/encryption.html
 */
 
function z_generate_token ($len = 32){
    $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );
    shuffle($chars);
    $num_chars = count($chars) - 1;
    $token = '';
    // Create random token at the specified length.
    for ($i = 0; $i < $len; $i++)
    {
            $token .= $chars[mt_rand(0, $num_chars)];
    }
return $token;
}

function generate_token ($len = 32){
    $bytes = random_bytes($len);
    return substr(bin2hex($bytes),0,$len);    
}

// Cambiando las cabeceras conseguimos que se refresque
// la página sin tener que forzar una recarga de nuestro navegador.
// Ver codeigniter CI_output set_header
function removeCache()
{
    $CI =& get_instance();
    $CI->output->set_header("HTTP/1.0 200 OK");
    $CI->output->set_header("HTTP/1.1 200 OK");
    $CI->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $CI->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
    $CI->output->set_header('Pragma: no-cache');
}



//convierte todas las entidades HTML del string a sus caracteres correspondientes. 
function clean_html($param)
{
    return html_entity_decode($param,ENT_HTML5);
}

//ENCODE HTML ENTITIES
function encode_html( $input )
{
    return htmlentities($input);
}

//crea la carpeta para ficheros 
function createFolder(){
    if(!is_dir("./files"))
    {
        mkdir("./files", 0777);
        //mkdir("./files/pdfs", 0777);
    }
}    
// Borra un fichero (Imagen )

function borra_file( $file ){
    $ret = FALSE;
    if(file_exists($file)){
        $ret = unlink($file);        
    }
    return $ret;
}

//transfroma un objeto en array
function object2array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        }
        else {
            $array = $object;
        }
        return $array;
    }

   
//------------------------ funciones de fecha--------------------------------

//devuelve la fecha local formateada empleando la libreria moment
function ahora()
{    
    //gmDate("Y-m-d\TH:i:s\Z")
    //return gmdate(DATE_ISO8601); fecha GMT
    //return date("Y-m-d\TH:i:s\Z",  time()); //fecha local
    //date("Y-m-d H:i:s"); TIMESTAMP MySQL                
    //return date(DATE_ISO8601,  time()); //fecha local si no empleamos moment
     
    $m = new \Moment\Moment('now', 'Europe/Madrid');
    return $m->format();
    
}

//devuelve la fecha local formateada para events empleando la libreria moment
function evahora()
{    
    //gmDate("Y-m-d\TH:i:s\Z")
    //return gmdate(DATE_ISO8601); fecha GMT
    //return date("Y-m-d\TH:i:s\Z",  time()); //fecha local
    //date("Y-m-d H:i:s"); TIMESTAMP MySQL                
    //return date(DATE_ISO8601,  time()); //fecha local si no empleamos moment
     
    $m = new \Moment\Moment('now', 'Europe/Madrid');
    return $m->format('Y-m-d H:m:s');
    
}

  
//devuelve un string fecha actual como cadena de texto para presentar en pantalla
function fecha_es()
{
    
    $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
            'Miercoles', 'Jueves', 'Viernes', 'Sabado');
     
   $hora = date('H').':'.date('m').':'.date('s');
   return  $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y').', a '.$hora;

}  

//cadena de fecha formato español empleando libreria moment
function str_fecha_es($fecha)
{                      
    //$nfecha = date(DATE_RFC850, strtotime($fecha));
    //$nfecha = str_replace('Jan','Ene',date(DATE_RFC850, strtotime($fecha)));
    //$nfecha = str_replace('Thursday','Jueves',date(DATE_RFC850, strtotime($fecha)));    
    //return $nfecha;
    //return $m->format();
    
    \Moment\Moment::setLocale('es_ES');
    $m = new \Moment\Moment($fecha, 'CET');
    
    //return $m->format('LLLL', new \Moment\CustomFormats\MomentJs());
    //return $m->format('l, dS F Y / H:i (e)'); // lunes, 06 febrero 2017 / 22:03 (CET)
    return $m->format('l, d F Y / H:i:s');
}


function myTimeStamp( $fecha = NULL ){
    if ($fecha == NULL) { $fecha = ahora();}
    $d = new DateTime($fecha, new DateTimeZone('Europe/Madrid'));
    //var_dump($d->getTimestamp()); // 1457690400
    return $d->getTimestamp();
}

function fechaTimeStamp( $fecha ){
    $d = new DateTime($fecha, new DateTimeZone('Europe/Madrid'));    
    return $d->getTimestamp();
}



//convierte un TimeStamp en cadena de fecha
function myInvTimeStamp ($param){
    
    $dtms011 = new DateTime();    
    $dtms011->setTimestamp(($param * 1));       
    return $dtms011->format("l, d-m-Y H:i:s\Z");           
}

//add una cantidad fija a un objeto tiempo
function myDate($fecha = null){
    /* si no se emplea moment hay que habilitar las lineas que siguen
    $fecha = date(gmdate(DATE_ISO8601, time()));    
    $new_fecha = strtotime($fecha.'+ 6 hours 20 seconds');
    return date(DATE_ISO8601,$new_fecha);      
    */ 
    
    if ($fecha == null){
        $fecha = date(DATE_ISO8601, time());
    }
    
    $m = new \Moment\Moment($fecha, 'CET');
    return $m->addHours(3)->addMinutes(20)->addSeconds(15)->format();
}

//add una cantidad de dias a un objeto tiempo
function add_dias_Date($dias){
    /* si no se emplea moment hay que habilitar las lineas que siguen
    $fecha = date(gmdate(DATE_ISO8601, time()));    
    $new_fecha = strtotime($fecha.'+ 6 hours 20 seconds');
    return date(DATE_ISO8601,$new_fecha);      
    */ 
    
    $fecha = date(DATE_ISO8601, time());  
    $m = new \Moment\Moment($fecha, 'CET');
    return $m->addDays($dias)->format("d-m-Y H:i:s");
}

//resta una cantidad de dias a un objeto tiempo
function resta_dias_Date($dias){
    /* si no se emplea moment hay que habilitar las lineas que siguen
    $fecha = date(gmdate(DATE_ISO8601, time()));    
    $new_fecha = strtotime($fecha.'+ 6 hours 20 seconds');
    return date(DATE_ISO8601,$new_fecha);      
    */ 
    
    $fecha = date(DATE_ISO8601, time());  
    $m = new \Moment\Moment($fecha, 'CET');
    return $m->subtractDays($dias)->format("d-m-Y H:i:s");
}


//add una hora a un objeto tiempo
//recibe un string formateado 
function add_horas_Date($date){
    /* si no se emplea moment hay que habilitar las lineas que siguen
    $fecha = date(gmdate(DATE_ISO8601, time()));    
    $new_fecha = strtotime($fecha.'+ 6 hours 20 seconds');
    return date(DATE_ISO8601,$new_fecha);      
    */ 
    
    //$fecha = date(DATE_ISO8601, $date);
    $fecha = $date;
    $m = new \Moment\Moment($fecha, 'CET');    
    return $m->addHours(1)->addMinutes(0)->addSeconds(0)->format("d-m-Y H:i:s");
}

function dif_date($date_ini){
    \Moment\Moment::setLocale('es_ES');           
    $m = new \Moment\Moment('@'.$date_ini,'CET');
           
    //return $m->format('d-m-Y H:m');
    return $m->calendar();    
}


function trimestre($fecha){
    
    $m = new \Moment\Moment( date(DATE_ISO8601, strtotime($fecha)) );
    $momentPeriodVo = $m->getPeriod('quarter');
    return $momentPeriodVo->getInterval();
}    

