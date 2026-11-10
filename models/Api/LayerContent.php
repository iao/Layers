<?php

/**
 * @package Omeka\Record\Api
 */
class Api_LayerContent extends Omeka_Record_Api_AbstractRecordAdapter
{
    
    public function getRepresentation(Omeka_Record_AbstractRecord $record)
    {
        $representation = array();
        $representation['id'] = $record->id;
        $representation['layer_id'] = $record->layer_id;
        $representation['item_id'] = $record->item_id;
        $representation['vm'] = $record->vm;
        $representation['url'] = self::getResourceUrl("/layer_contents/{$record->id}");
        return $representation;
    }
    
    public function getResourceId()
    {
        return "Layers_LayerContent";
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
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->item_id)) {
            $record->item_id = $data->item_id;
        }
        if (isset($data->vm)) {
            $record->vm = $data->vm;
        }
        //error_log(print_r($record, true));
        //var_dump($record);
        //var_dump($data);
    }
    
    /**
     * Set PUT data to a location.
     * 
     * @param Location $record
     * @param mixed $data
     */
    public function setPutData(Omeka_Record_AbstractRecord $record, $data)
    {
        if (isset($data->layer_id)) {
            $record->layer_id = $data->layer_id;
        }
        if (isset($data->item_id)) {
            $record->item_id = $data->item_id;
        }
        if (isset($data->vm)) {
            $record->vm = $data->vm;
        }
    }
}
