<?php
if ( ! function_exists( 'evision_customizer_get_repeated_all_value' ) ) :
    /**
     * Function to get repeated value in array
     *
     * @access public
     * @since 1.1
     *
     * @param string $customizer_name
     * @return array || other values
     *
     */
    function evision_customizer_get_repeated_all_value ( $repeated_value_name, $customizer_name = null ) {

        $repeated_settings_controls = unserialize( evision_customizer_get_single_value('repeated_settings_controls'));
        if(!isset($repeated_settings_controls[$repeated_value_name]) || null == $repeated_settings_controls){
            return null;
        }
        $selected_repeater = $repeated_settings_controls[$repeated_value_name];

        $repeated = $selected_repeater['repeated'];

        if(!is_array($selected_repeater)){
            return null;
        }
        $repeated_saved_values_name = array_keys($selected_repeater);
        unset($repeated_saved_values_name[0]);
        $evision_customizer_get_all_values = evision_customizer_get_all_values( $customizer_name );

        $evision_customizer_get_repeated_all_value = array();
        for ( $i = 1; $i <= $repeated; $i++ ){
            foreach( $repeated_saved_values_name as $repeated_saved_value_name ){
                if( isset($evision_customizer_get_all_values[$repeated_saved_value_name.'_'.$i]) ){
                    $evision_customizer_get_repeated_all_value[$i][$repeated_saved_value_name] = $evision_customizer_get_all_values[$repeated_saved_value_name.'_'.$i];
                }
            }
        }
        return $evision_customizer_get_repeated_all_value;
    }
endif;
