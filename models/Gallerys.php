<?php 
/**
 * Exhibit model.
 *
 * @package ExhibitBuilder
 */
class Gallerys extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Map title.
     *
     * @var string
     */
    public $title;
    
    public $description;

    public $owner;
    
    public $permissions;
    
    public $image;
    
    public $video;
    
    public $author;

    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'Layers_Gallerys';
    }
}
 
