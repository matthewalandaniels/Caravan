<?php

// Check whether a category exists in a comma delimited list
function hasCategory($needle, $categoryList) {	
    if (empty($categoryList)) {
        return false;
    }
    
    $arr = explode(',', $categoryList);    
    // Trim all category names of spaces
    foreach ($arr as &$category) {
        $category = trim($category);
    }
    
    return ( in_array($needle, $arr) );
}