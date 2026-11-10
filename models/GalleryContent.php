<?php
 
/**
 * Exhibit model.
 *
 * @package ExhibitBuilder
 */
class GalleryContent extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Exhibit title.
     *
     * @var integer
     */
    public $gallery_id;

    /**
     * Exhibit title.
     *
     * @var integer
     */
    public $layer_id;
    
    public $collection_id;

    public $enabled;

    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'Layers_GalleryContent';
    }
}
