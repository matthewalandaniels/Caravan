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

// Return the next visible project which matches $category
function getNextMatchCategory($pages, $category) {
    // Initialize vars
    $i=0;

    // Get all projects (children of /work)
    $pageSet = $pages->find('work')->children()->visible();

    // Find the current page, then try to locate a matching page AFTER it
    foreach($pageSet as $page) {
        $i++;
        if ($page->isActive()) {
            // search from NEXT project to end
            $subSet = $pageSet->slice($i, $pageSet->count())->filterBy('categories', $category);
            if ($subSet->count() > 0) {
                return $subSet->first();
            }
        }
    }

    return false;
}

// Return the previous visible project which matches $category
function getPrevMatchCategory($pages, $category) {
    // Initialize vars
    $i=0;

    // Get all projects (children of /work)
    $pageSet = $pages->find('work')->children()->visible();

    // Find the current page, then try to locate a matching page AFTER it
    foreach($pageSet as $page) {
        $i++;
        if ($page->isActive()) {
            // search from NEXT project to end
            $subSet = $pageSet->slice(0, $i-1)->filterBy('categories', $category);
            if ($subSet->count() > 0) {
                return $subSet->first();
            }
        }
    }

    return false;
}