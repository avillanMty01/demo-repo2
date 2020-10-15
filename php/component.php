<?php
  // outputs needed html to input vallues by user, keepeing structure and css styles from bootstrap
    function inputElement($icon, $placeholder, $name, $value){
      $element='
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-warning">'.$icon.'</div>
        </div>
        <input type="text" class="form-control" name="'.$name.'" value="'.$value.'" id="inlineFormInputGroup" placeholder="'.$placeholder.'">
      </div>
      ';
      echo $element;
    }

    function buttonElement($btnid, $styleclass, $text, $name, $attr){
      $btn = '
        <button name="'.$name.'" '.$attr.'" class="'.$styleclass.'" id="'.$btnid.'" >'.$text.'</button>
      ';
      echo $btn;
    }
// uncomment to test independently
//echo inputElement('<i class="fas fa-book"></i>',"holder","nombre","");
 ?>
