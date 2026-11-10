<?php

/**
 * @package Omeka\Record\Api
 */
class Api_Gallerys extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['title'] = $record->title;
        $representation['description'] = $record->description;
        $representation['owner'] = $record->owner;
        $representation['permissions'] = $record->permissions;
        $representation['author'] = $record->author;
        $representation['image'] = $record->image;
        $representation['video'] = $record->video;
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_Gallerys";
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
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->author)) {
            $record->author = $data->author;
        }
        if (isset($data->image)) {
            $record->image = $data->image;
        }
        if (isset($data->video)) {
            $record->video = $data->video;
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
        if (isset($data->description)) {
            $record->description = $data->description;
        }
        if (isset($data->owner)) {
            $record->owner = $data->owner;
        }
        if (isset($data->permissions)) {
            $record->permissions = $data->permissions;
        }
        if (isset($data->author)) {
            $record->author = $data->author;
        }
        if (isset($data->image)) {
            $record->image = $data->image;
        }
        if (isset($data->video)) {
            $record->video = $data->video;
        }
    }
}
