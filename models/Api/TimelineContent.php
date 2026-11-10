<?php

/**
 * @package Omeka\Record\Api
 */
class Api_TimelineContent extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['timeline_id'] = $record->timeline_id;
        $representation['layer_id'] = $record->layer_id;
        $representation['collection_id'] = $record->collection_id;
        $representation['enabled'] = $record->enabled;
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_TimelineContent";
    }
    
    /**
     * Set POST data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPostData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->timeline_id)) {
            $record->timeline_id = $data->timeline_id;
        }
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->collection_id)) {
            $record->collection_id = $data->collection_id;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
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
        if (isset($data->timeline_id)) {
            $record->timeline_id = $data->timeline_id;
        }
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->collection_id)) {
            $record->collection_id = $data->collection_id;
        }
        if (isset($data->enabled)) {
            $record->enabled = $data->enabled;
        }
    }
}
