<?php 
/**
 *
 * @package  Unity 3D Viewer
 */

class LayersPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array ('install', 'uninstall', 'define_acl');
        
    protected $_filters = array('api_resources');

    
    public function hookInstall()
    {
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}layers` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `slug` VARCHAR(30) NOT NULL,
            `enabled` TINYINT(1) NOT NULL DEFAULT 0,
            `description` TEXT,
            `owner` int(11) NOT NULL DEFAULT '1',
            `permissions` int(11) NOT NULL DEFAULT '0',
            `color` varchar(512) DEFAULT NULL,
            `added` datetime DEFAULT current_timestamp(),
            `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);

        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}layer_contents` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `layer_id` INT UNSIGNED NOT NULL,
            `item_id` INT UNSIGNED NOT NULL,
            `vm` text DEFAULT 'local',
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}maps` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `north_lat` DECIMAL(10,6) NOT NULL,
            `south_lat` DECIMAL(10,6) NOT NULL,
            `east_lng` DECIMAL(10,6) NOT NULL,
            `west_lng` DECIMAL(10,6) NOT NULL,
            `message_id` INT UNSIGNED DEFAULT NULL,
            `key_id` INT UNSIGNED DEFAULT NULL,
            `message_url` varchar(512) DEFAULT NULL,
            `owner` int(11) NOT NULL DEFAULT '1',
            `permissions` int(11) NOT NULL DEFAULT '0',
            `description` text DEFAULT NULL,
            `cluster` tinyint(1) NOT NULL DEFAULT 0,
            `added` datetime DEFAULT current_timestamp(),
            `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}map_contents` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `map_id` INT UNSIGNED NOT NULL,
            `layer_id` INT UNSIGNED NOT NULL,
            `enabled` TINYINT(1) NOT NULL DEFAULT 0,
            `title` varchar(255) DEFAULT NULL,
            `inkey` tinyint(1) DEFAULT 1,
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}timelines` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `description` TEXT,
            `owner` int(11) NOT NULL DEFAULT '1',
            `permissions` int(11) NOT NULL DEFAULT '0',
            `added` datetime DEFAULT current_timestamp(),
            `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}timeline_contents` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `timeline_id` INT UNSIGNED NOT NULL,
            `layer_id` INT UNSIGNED,
            `collection_id` INT UNSIGNED,
            `enabled` TINYINT(1) NOT NULL DEFAULT 0,
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}gallerys` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) DEFAULT NULL,
            `description` TEXT,
            `owner` int(11) NOT NULL DEFAULT '1',
            `permissions` int(11) NOT NULL DEFAULT '0',
            `image` INT(11) DEFAULT NULL,
            `video` INT(11) DEFAULT NULL,
            `author` varchar(255) DEFAULT NULL,
            `added` datetime DEFAULT current_timestamp(),
            `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
        
        $db = get_db();
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$db->prefix}gallery_contents` (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `timeline_id` INT UNSIGNED NOT NULL,
            `layer_id` INT UNSIGNED,
            `collection_id` INT UNSIGNED,
            `enabled` TINYINT(1) NOT NULL DEFAULT 0,
            `gallery_id` int(10) unsigned NOT NULL,
            `vm` text DEFAULT 'local',
            PRIMARY KEY  (`id`)
        ) ENGINE = InnoDB";
        $db->query($sql);
    }

    public function hookUninstall()
    {
        // Drop the Imagemap table
        $db = get_db();
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}layers`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}layer_contents`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}maps`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}map_contents`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}timelines`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}timeline_contents`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}gallerys`");
        $db->query("DROP TABLE IF EXISTS `{$db->prefix}gallery_contents`");
    }

    
    public function hookDefineAcl($args)
    {
        $acl = $args['acl'];
        $acl->addResource('Layers_Layers');
        $acl->addResource('Layers_LayerContent');
        $acl->addResource('Layers_Maps');
        $acl->addResource('Layers_MapContent');
        $acl->addResource('Layers_Timelines');
        $acl->addResource('Layers_TimelineContent');
        $acl->addResource('Layers_Gallerys');
        $acl->addResource('Layers_GalleryContent');
    }
    
    public function filterApiResources($apiResources)
    {
        $apiResources['layers'] = array(
            'record_type' => 'Layers',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('slug')
        );
        $apiResources['layer_content'] = array(
            'record_type' => 'LayerContent',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('layer_id', 'item_id', 'vm')
        );
        
        $apiResources['maps'] = array(
            'record_type' => 'Maps',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('id')
        );
        $apiResources['map_content'] = array(
            'record_type' => 'MapContent',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('map_id', 'layer_id')
        );
        
        $apiResources['timelines'] = array(
            'record_type' => 'Timelines',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('id')
        );
        $apiResources['timeline_content'] = array(
            'record_type' => 'TimelineContent',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('timeline_id', 'layer_id', 'collection_id')
        );
        
        $apiResources['gallerys'] = array(
            'record_type' => 'Gallerys',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('id')
        );
        $apiResources['gallery_content'] = array(
            'record_type' => 'GalleryContent',
            'actions' => array('get', 'index', 'post', 'put', 'delete'),
            'index_params' => array('gallery_id', 'layer_id', 'collection_id')
        );
        return $apiResources;
    }
    
}
