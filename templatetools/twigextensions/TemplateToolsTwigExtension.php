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
  
  
}
