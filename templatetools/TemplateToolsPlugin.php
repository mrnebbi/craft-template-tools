<?php
namespace Craft;

class TemplateToolsPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Template Tools');
    }

    function getVersion()
    {
        return '1.3.0';
    }

    function getDeveloper()
    {
        return 'Ian Isted';
    }

    function getDeveloperUrl()
    {
        return 'http://ianisted.co.uk';
    }
    
    public function addTwigExtension()
    {
        Craft::import( 'plugins.templatetools.twigextensions.TemplateToolsTwigExtension' );
        return new TemplateToolsTwigExtension();
    }
}
