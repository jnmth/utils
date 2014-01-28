<?php




function average($arr)
{
   if (!is_array($arr)) return false;

   return array_sum($arr)/count($arr);
}
