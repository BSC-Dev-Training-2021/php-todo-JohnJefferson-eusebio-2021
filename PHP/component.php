<?php

function component($todoname, $id){
    $element="
    
    <li class=\"list-group-item\">
    <form action=\"\" method=\"post\">
    $todoname 
    <input type='hidden' name='todoname' value='$todoname '>
    <button type=\"submit\" name=\"remove\" class=\"btn btn-light fa fa-trash-o float-right ml-1\"></button>
    <button type=\"submit\" name=\"complete_todo\" class=\"btn btn-light fa fa-check float-right\"></button>
    <input type='hidden' name='todo_id' value='$id'>
    </form>
    </li>
    <hr>
     ";
    echo $element;
}

