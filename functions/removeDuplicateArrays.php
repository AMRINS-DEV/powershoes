<?php

function removeDuplicateArrays($arr)
{
    return array_map('unserialize', array_unique(array_map('serialize', $arr)));
}

?>