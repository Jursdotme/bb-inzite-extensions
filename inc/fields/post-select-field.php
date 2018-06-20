<?php
$posts = explode( ',', '{{posts}}' );
$args  = array(
    'post_type' => '{{data.value}}',
    'post__in'  => $posts,
);
?>
<label>Posts</label>
<select name="{{name}}[]" id="postselect" class="test-select" multiple style="width: 100%;">

    <#
        var myStringArray = data.value;
        var arrayLength = myStringArray.length;

        for (var i = 0; i < arrayLength; i++) { #>
            <option value="{{myStringArray[i]}}" selected>{{myStringArray[i]}}</option>
    <# } #>

</select>
