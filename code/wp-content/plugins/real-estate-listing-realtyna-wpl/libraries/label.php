<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

/**
 * WPL Label
 * @author Howard <howard@realtyna.com>
 * @since WPL4.6.0
 * @date 08/16/2019
 * @package WPL
 */
class wpl_label
{
    public static function property_type($id)
    {
        return wpl_db::get('`name`', 'wpl_property_types', 'id', $id);
    }

    public static function listing_type($id)
    {
        return wpl_db::get('`name`', 'wpl_listing_types', 'id', $id);
    }

    public static function unit($id)
    {
        return wpl_db::get('`name`', 'wpl_units', 'id', $id);
    }

    public static function field($value, $args)
    {
        if(is_numeric($args)) $field_id = $args;
        else
        {
            $table_column = (is_array($args) and isset($args['fields']) and isset($args['fields'][0])) ? $args['fields'][0] : (is_string($args) ? $args : NULL);
            if(!$table_column) return 'N/A';

            $kind = (is_array($args) and isset($args['kind'])) ? $args['kind'] : 0;

            // Get Field ID
            $field_id = wpl_flex::get_dbst_id($table_column, $kind);
        }

        // Get Field
        $field = wpl_flex::get_field($field_id);
        $label = '';

        if($field->type == 'select')
        {
            $options = json_decode($field->options, true);
            foreach($options['params'] as $field_option)
            {
                if($value == $field_option['key'])
                {
                    $label = stripslashes(__($field_option['value'], 'real-estate-listing-realtyna-wpl'));
                    break;
                }
            }
        }
        elseif($field->type == 'feature')
        {
            $pid = (is_array($args) and isset($args['pid'])) ? $args['pid'] : 0;

            $options = json_decode($field->options, true);
            $column_values = explode(',', trim(wpl_property::get_property_field($field->table_column.'_options', $pid), ', '));

            if(isset($options['values']))
            {
                foreach($options['values'] as $field_option)
                {
                    if(in_array($field_option['key'], $column_values))
                    {
                        $label .= stripslashes(__($field_option['value'], 'real-estate-listing-realtyna-wpl')).",";
                    }
                }
            }
            else
            {
                $label = __('Yes', 'real-estate-listing-realtyna-wpl');
            }

            $label = trim($label, ", ");
        }
        elseif($field->type == 'boolean')
        {
            $options = json_decode($field->options, true);

            if($value) $label = __($options['true_label'], 'real-estate-listing-realtyna-wpl');
            else $label = __($options['false_label'], 'real-estate-listing-realtyna-wpl');
        }
        else $label = $value;

        return $label;
    }
}