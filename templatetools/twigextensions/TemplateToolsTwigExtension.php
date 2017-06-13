<?php

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class TemplateToolsTwigExtension extends Twig_Extension {

	public function getName()
	{
		return 'Template Tools';
	}

	public function getFilters()
	{
		return array(
			'firstTag' => new Twig_Filter_Method($this, 'firstTag'),
			'getFirstParagraph' => new Twig_Filter_Method($this, 'getFirstParagraph'),
			'wrapLinesInTag' => new Twig_Filter_Method($this, 'wrapLinesInTag'),
      'preserveQueryStrings' => new Twig_Filter_Method($this, 'preserveQueryStrings')
		);
	}

  public function getFunctions()
    {
        return array(
           // 'getQueryStrings' => new Twig_Function('getQueryStrings', 'getQueryStrings'),
           'getQueryStrings' => new \Twig_SimpleFunction('getQueryStrings', array($this, 'getQueryStrings'), array('is_safe' => array('html')))
        );
    }
  
  public function firstTag($html,$value,$tag = "p",$attr = "-unset-")
  {
      // Adds a class by default.
      // Can also be used to add IDs or other attributes and values
      
      
      // If class is 
      if ((substr($value,0,1) == ".") && ($attr == "-unset-" || $attr == "class")) {
        $value = substr($value,1);
        $attr = "class";
      } elseif ((substr($value,0,1) == "#") && ($attr == "-unset-" || $attr == "id")) {
        $value = substr($value,1);
        $attr = "id";
      } elseif ($attr == "-unset-") {
        $attr = "class";
      }
      
      $return  = preg_replace('/<' . $tag . '([^>]+)?>/', '<' . $tag . '$1 ' . $attr . '="' . $value . '">', $html, 1);
      return TemplateHelper::getRaw($return);
  }
  
  
  public function getFirstParagraph($html,$stripP = false)
  {
      
      // Get the first paragraph and return it to the template
      
      // This function needs to be improved to ignore items before the first paragraph

      $return = substr( $html, 0, strpos( $html, '</p>' ) + 4 );
    	
    	if ($stripP) {
      	$return = strip_tags($return, '<a><strong><em>');
    	}
      
      return TemplateHelper::getRaw($return);
  }


  public function preserveQueryStrings($url)
  {
    if (substr(craft()->request->queryString, 0,2) == "p=") {
      $queries = explode("&", craft()->request->queryString, 2);

      if (sizeof($queries) > 1) {
        $queryStrings = $queries[1];
      } else {
        return TemplateHelper::getRaw($url);
      }
    }

    if (substr($url,-1) != "?") {
      $return = $url . "?";
    } else {
      $return = $url;
    }

    $return = $return . $queryStrings;
    
    return TemplateHelper::getRaw($return);
  }


  public function getQueryStrings($lookForKey = false)
  {
      
    // Get the query string from Craft and break it apart for use in templates
  
    // Break query apart to remove page information if needed
    if (substr(craft()->request->queryString, 0,2) == "p=") {
      $queries = explode("&", craft()->request->queryString, 2);
    }

    // Break query apart to separate individual parts
    if (sizeof($queries) > 1) {
      $queries = explode("&", $queries[1]);
    } else {
      return false;
    }

    // Setup object array to return later
    $objectArray = array();

    // Loop over query parts and add them to the object
    foreach ($queries as $query) {
      $querySplit  = explode("=", $query);
      $queryObject = (object) ['key' => $querySplit[0],'value' => $querySplit[1]];
      if (($lookForKey != false && $querySplit[0] == $lookForKey) || ($lookForKey == false)) {
        array_push($objectArray,$queryObject);
      }
    }

    // Return objects
    $return = $objectArray;
    
    return  $return;
  }
  
  
  public function wrapLinesInTag($html,$tag)
  {
	  $return = '<' . $tag . '>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</$tag>\n<$tag>"),trim($html,"\n\r")).'</' . $tag . '>';
	  return TemplateHelper::getRaw($return);
  }
  
  
}
