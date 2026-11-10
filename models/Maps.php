<?php
/**
 * @copyright Roy Rosenzweig Center for History and New Media, 2007-2012
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package ExhibitBuilder
 */
 
/**
 * Exhibit model.
 *
 * @package ExhibitBuilder
 */
class Maps extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Map title.
     *
     * @var string
     */
    public $title;

    public $north_lat;
    
    public $south_lat;
    
    public $east_lng;
    
    public $west_lng;
    
    /**
     * ID of the attached file, if any.
     *
     * @var integer
     */
    public $message_id;
    
    /**
     * ID of the attached file, if any.
     *
     * @var integer
     */
    public $key_id;
    
    public $message_url;

    public $owner;
    
    public $permissions;
    
    public $description;
    
    public $cluster;
    

    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'Layers_Maps';
    }
}
