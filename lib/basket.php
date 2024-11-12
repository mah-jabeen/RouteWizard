<?php

// a class which holds the data to the view
// define('DS', DIRECTORY_SEPARATOR);

class basket {
    
    // Set function is used to set the key and the value
    function set($key, $value) {
        $this->$key = $value;
    }

    // Get function to retrieve the stored value
    function get($key) {
        if (isset($this->$key)) {
            return $this->$key;
        }else{
        return null;
        
        }
        
            }
    
}
