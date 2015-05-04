<li class="form-element {#required}required{/required}" id="element-{position}" data-label="slider" data-position="{position}" data-type="element-checkboxes" name="slider" data-ctrl="element-slider">

	<label>
		<span class="label-title">{label}</span>
		{#required}<span class="required-star"> *</span>{/required}
	</label>

	<div class="choices" data-type="settings-choice-slider">

		<div class="choice checkbox disabled">
		  <label>
                  Lowest Range:
		  <input type="hidden" class="option-1" name="element-{position}-choice" value="" disabled> 
		    <span class="choice-label">min</span>
		  </label>
		</div>

		<div class="choice checkbox disabled">
		  <label>
                    Highest Range:
		    <input type="hidden" class="option-2" name="element-{position}-choice" value="" disabled>
		    <span class="choice-label">max</span>
		  </label>
		</div>

		
		
	</div>

</li>