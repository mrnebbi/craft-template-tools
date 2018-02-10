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
        return '1.3.2';
    }

    function getDeveloper()
    {
        return 'Mr Nebbi';
    }

    function getDeveloperUrl()
    {
        return 'http://ianisted.co.uk';
    }

    function getDocumentationUrl()
    {
        return 'https://github.com/mrnebbi/craft-template-tools/';
    }

    function getReleaseFeedUrl()
    {
        return 'https://raw.github.com/mrnebbi/craft-template-tools/master/releases.json';
    }
    
    public function addTwigExtension()
    {
        Craft::import( 'plugins.templatetools.twigextensions.TemplateToolsTwigExtension' );
        return new TemplateToolsTwigExtension();
    }
}
