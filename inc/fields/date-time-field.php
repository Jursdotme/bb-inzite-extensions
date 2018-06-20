<#

var getOptions = function( start, end, saved ) {
	var i, value, selected, options = '';

	for ( i = start; i < end; i++ ) {
		value = String( i );
		value = 1 === value.length ? '0' + value : value;
		selected = value == saved ? ' selected="selected"' : '';
		options += '<option value="' + value + '"' + selected + '>' + value + '</option>';
	}

	return options;
}

#>

<div class="inz-date-time-field-date">
	<div class="inz-date-time-field-container">
		<select name="{{data.name}}[][day]" class="fl-time-field-day">
			<# var day = getOptions( 1, 31, data.value.day ); #>
			{{{day}}}
		</select>
		<label><?php _e( 'Day', 'bb-inz-e' );?></label>
	</div>

	<div class="inz-date-time-field-container">
		<select name="{{data.name}}[][month]" class="fl-time-field-month">
			<# var month = getOptions( 1, 12, data.value.month ); #>
			{{{month}}}
		</select>
		<label><?php _e( 'Month', 'bb-inz-e' );?></label>
	</div>
	<div class="inz-date-time-field-container">
		<input name="{{data.name}}[][year]" value="{{data.value.year}}"type="text" class="fl-time-field-year text  text-full" placeholder="<?php echo date( "Y" ); ?>">
		<label><?php _e( 'Year', 'bb-inz-e' );?></label>
	</div>
</div>

<div class="inz-date-time-field-time">


	<div class="inz-date-time-field-container">
		<select name="{{data.name}}[][hours]" class="fl-time-field-hours">
			<# var hours = getOptions( 0, 24, data.value.hours ); #>
			{{{hours}}}
		</select>
		<label><?php _e( 'Hour', 'bb-inz-e' );?></label>
	</div>

	<div class="inz-date-time-field-container">
		<select name="{{data.name}}[][minutes]" class="fl-time-field-minutes">
			<# var minutes = getOptions( 0, 60, data.value.minutes ); #>
			{{{minutes}}}
		</select>
		<label><?php _e( 'Minute', 'bb-inz-e' );?></label>
	</div>
</div>
