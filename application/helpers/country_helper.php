<?php

function  country_dropdown ( $name="country", $id="country", $top_countries=array(), $attr="",$selection='GB', $show_all=TRUE )  {
    // You may want to pull this from an array within the helper
    $countries = config_item('country_list');
    $top_countries = array('GB', 'US', 'CA');
    $CI =& get_instance();
    $CI->load->model('users_model');
    $db_country = $CI->users_model->getCountry();
    
    
    $html = "<select name='{$name}' id='{$id}' $attr>";
    $html .= "<option value=''>All Countries</option>";
    $selected = NULL;
    /*if(in_array($selection,$top_countries))  {
        $top_selection = $selection;
        $all_selection = NULL;
        } 
    else  {
        $top_selection = NULL;
        $all_selection = $selection;
        } */
        $top_selection = NULL;
        $all_selection = $selection;
        /*
    if(!empty($top_countries))  {
        foreach($top_countries as $value)  {
            if(array_key_exists($value, $countries))  {
                if($value === $top_selection)  {
                    $selected = "SELECTED";
                    }
                $html .= "<option value='{$value}' {$selected}>{$countries[$value]}</option>";
                $selected = NULL;
                }
            }
        $html .= "<option>----------</option>";
        }
        */
    if($show_all)  {
        foreach($db_country as $key => $country)  {
            if($country['vCountryCode'] === $all_selection)  {
                $selected = "SELECTED";
                }
            $html .= "<option value='{$country['vCountryCode']}' {$selected}>{$country['vCountry']}</option>";
            $selected = NULL;
            }
        }

    $html .= "</select>";
    
    return $html;
    }  
    
?>