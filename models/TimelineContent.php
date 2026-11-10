<?php
 
/**
 * Exhibit model.
 *
 * @package ExhibitBuilder
 */
class TimelineContent extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Exhibit title.
     *
     * @var integer
     */
    public $timeline_id;

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
        return 'Layers_TimelineContent';
    }
}
