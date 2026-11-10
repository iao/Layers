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
class Layers extends Omeka_Record_AbstractRecord implements Zend_Acl_Resource_Interface
{
    /**
     * Exhibit title.
     *
     * @var string
     */
    public $title;

    /**
     * Exhibit title.
     *
     * @var string
     */
    public $slug;
    
    /**
     * Exhibit description (in HTML).
     *
     * @var string
     */
    public $description;
    
    public $enabled;


    public $owner;
    
    public $permissions;
    
    public $color;
    
    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'Layers_Layers';
    }
}
