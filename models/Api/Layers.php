<?php

/**
 * @package Omeka\Record\Api
 */
class Api_Layers extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['title'] = $record->title;
        $representation['slug'] = $record->slug;
        $representation['description'] = $record->description;
        $representation['enabled'] = $record->enabled;
        $representation['owner'] = $record->owner;
        $representation['permissions'] = $record->permissions;
        $representation['color'] = $record->color;
        $representation['url'] = "";
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_Layers";
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
        if (isset($data->slug)) {
            $record->slug = $data->slug;
        }
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->color)) {
            $record->color = $data->color;
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
        if (isset($data->slug)) {
            $record->slug = $data->slug;
        }
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->color)) {
            $record->color = $data->color;
        }
    }
}
