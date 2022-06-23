<?php

function inputElement( $type,$placeholder, $name, $value,$atribute){
    $ele = "
        
        <div class=\"input-group mb-2\">
                        <input type='$type' name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' $atribute  class=\"form-control\" id=\"inlineFormInputGroup\">
                    </div>
    
    ";
    echo $ele;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr){
    $btn = "
        <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}