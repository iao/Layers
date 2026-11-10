<?php

/**
 * @package Omeka\Record\Api
 */
class Api_MapContent extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['map_id'] = $record->map_id;
        $representation['layer_id'] = $record->layer_id;
        $representation['enabled'] = $record->enabled;
        $representation['title'] = $record->title;
        $representation['inkey'] = $record->inkey;
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_MapContent";
    }
    
    /**
     * Set POST data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPostData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->map_id)) {
            $record->map_id = $data->map_id;
        }
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
        }
        if (isset($data->title)) {
            $record->title = $data->title;
        }
        if (isset($data->inkey)) {
            $record->inkey = $data->inkey;
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
        if (isset($data->map_id)) {
            $record->map_id = $data->map_id;
        }
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
        }
        if (isset($data->title)) {
            $record->title = $data->title;
        }
        if (isset($data->inkey)) {
            $record->inkey = $data->inkey;
        }
    }
}
