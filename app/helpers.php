<?php

/**
* Gets the instance to make HTTP Requests
*/
function getClient()
{
    $client = new GuzzleHttp\Client([
        // Base URI is used with relative requests
        'base_uri' => $_ENV['END_POINT'],
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

// Returns date in correct format
function pvDate($object, $attribute)
{

     if(isset($object->{$attribute})) {

        $date = new DateTime($object->{$attribute});
        $date = $date->format('Y-m-d');
        
        return $date;
     } else 
         return '';
}

function pvsDat($object, $attribute)
{
    if(isset($object->{$attribute})) {
        $dateArray = date_parse($object->{$attribute});
        return $dateArray['day']. '/'. $dateArray['month']. '/' .$dateArray['year']. ' '. $dateArray['hour']. ':'. $dateArray['minute'];
    } else 
        return '';
}
/**
* Create an associative array giving an object.
*
* @param  Object  $object
* @param  String  $firstParam
* @param  String  $secondParam
*
* @return Array
*/
function makeAsocArray($object, $firstParam, $secondParam)
{
    $array=[];
    foreach ($object as $value) 
        $array[$value->{$firstParam}] = $value->{$secondParam};
    
    return $array;
}
