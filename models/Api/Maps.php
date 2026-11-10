<?php

/**
 * @package Omeka\Record\Api
 */
class Api_Maps extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['title'] = $record->title;
        $representation['north_lat'] = $record->north_lat;
        $representation['south_lat'] = $record->south_lat;
        $representation['east_lng'] = $record->east_lng;
        $representation['west_lng'] = $record->west_lng;
        $representation['message_id'] = $record->message_id;
        $representation['message_url'] = $record->message_url;
        $representation['key_id'] = $record->key_id;
        $representation['owner'] = $record->owner;
        $representation['permissions'] = $record->permissions;
        $representation['description'] = $record->description;
        $representation['cluster'] = $record->cluster;
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_Maps";
    }
    
    /**
     * Set POST data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPostData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->item->id)) {
            $record->item_id = $data->item->id;
        }
        if (isset($data->title)) {
            $record->title = $data->title;
        }
        if (isset($data->north_lat)) {
            $record->north_lat = $data->north_lat;
        }
        if (isset($data->south_lat)) {
            $record->south_lat = $data->south_lat;
        }
        if (isset($data->east_lng)) {
            $record->east_lng = $data->east_lng;
        }
        if (isset($data->west_lng)) {
            $record->west_lng = $data->west_lng;
        }
        if (isset($data->message_id)) {
            $record->message_id = $data->message_id;
        }
        if (isset($data->message_url)) {
            $record->message_url = $data->message_url;
        }
        if (isset($data->key_id)) {
            $record->key_id = $data->key_id;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->cluster)) {
            $record->cluster = $data->cluster;
        }
    }
    
    /**
     * Set PUT data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPutData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->title)) {
            $record->title = $data->title;
        }
        if (isset($data->north_lat)) {
            $record->north_lat = $data->north_lat;
        }
        if (isset($data->south_lat)) {
            $record->south_lat = $data->south_lat;
        }
        if (isset($data->east_lng)) {
            $record->east_lng = $data->east_lng;
        }
        if (isset($data->west_lng)) {
            $record->west_lng = $data->west_lng;
        }
        if (isset($data->message_id)) {
            $record->message_id = $data->message_id;
        }
        if (isset($data->message_url)) {
            $record->message_url = $data->message_url;
        }
        if (isset($data->key_id)) {
            $record->key_id = $data->key_id;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->cluster)) {
            $record->cluster = $data->cluster;
        }
    }
}
