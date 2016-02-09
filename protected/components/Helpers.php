<?php

/**
* Iterates through messages directories
* @return array list of avaible languages
*/
function getLanguages()
{
    return array_keys(Yii::app()->translate->acceptedLanguages);
} 
	
function convertCase($str, $case = 'upper')
{ //yours, courtesy of table4.com  :)
  switch($case)
  {
    case "upper" :
    default:
      $str = strtoupper($str);
      $pattern = '/&([A-Z])(UML|ACUTE|CIRC|TILDE|RING|';
      $pattern .= 'ELIG|GRAVE|SLASH|HORN|CEDIL|TH);/e';
      $replace = "'&'.'\\1'.strtolower('\\2').';'"; //convert the important bit back to lower
    break;
    
    case "lower" :
      $str = strtolower($str);
    break;
  }
  
  $str = preg_replace($pattern, $replace, $str);
  return $str;
}
?>