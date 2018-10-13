<?php
function checkPermission($permissions) {
    $userAccess = getMyPermission(auth()->user()->role);
    foreach ($permissions as $key => $value) {
    	if($value == $userAccess){
    		return true;
    	}
    }
    return false;
}

function getMyPermission($id) {
   return $id;
}
?>