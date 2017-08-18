<?php
 
/**
* Endpoint for API 
* @var string
*/
const BASE_URI = 'http://0.0.0.0:3000/api/';


/**
* Gets the instance to make HTTP Requests
*/
function getClient()
{
    $client = new GuzzleHttp\Client([
        // Base URI is used with relative requests
        'base_uri' => $_ENV['END_POINT'],
        // 'base_uri' => BASE_URI,
        // You can set any number of default request options.
        'timeout'  => 2.0,
    ]);
    return $client;
}

function slugify($input)
{
    $tittles  = ['/Ã/','/À/','/Á/','/Ä/','/Â/','/È/','/É/','/Ë/','/Ê/','/Ì/','/Í/','/Ï/','/Î/','/Ò/','/Ó/','/Ö/','/Ô/','/Ù/','/Ú/','/Ü/','/Û/','/ã/','/à/','/á/','/ä/','/â/','/è/','/é/','/ë/','/ê/','/ì/','/í/','/ï/','/î/','/ò/','/ó/','/ö/','/ô/','/ù/','/ú/','/ü/','/û/','/Ñ/','/ñ/','/Ç/','/ç/','/ /','/%/'];
    $original = ['A','A','A','A','A','E','E','E','E','I','I','I','I','O','O','O','O','U','U','U','U','a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','u','u','u','u','n','n','c','c','-','p'];
    
    return strtolower(str_replace('$','c', preg_replace($tittles, $original, $input)));
}

/*
* Verify if there's an attribute named '$attribute'
* If it does exists, it will return the value
* If it doesn't it will return an empty string
*/
function pv($object, $attribute)
{
    return isset($object->{$attribute}) ? $object->{$attribute} : '';
}

// Corregir, aun no devuelve bien la fecha
function pvDate($object, $attribute)
{
     if(isset($object->{$attribute})) {
         $dateArray = date_parse($object->{$attribute});
         $date = $dateArray['year']. '-';
         $date = $date . ( strlen( (string)$dateArray['month'] == 1)   ?  $dateArray['month']   : '0'.$dateArray['month']) . '-';
         $date = $date . ( strlen( (string)$dateArray['day']   == 1)   ?  '0'.$dateArray['day'] : $dateArray['day']);
         
         return $date;
     } else 
         return '';
}
