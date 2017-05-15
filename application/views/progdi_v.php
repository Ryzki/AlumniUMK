<div class="form-group has-success" id="progdi">
	<label for="progdi">Program Studi <em>(*)</em> :</label>
    <?php
        $style_progdi = 'class="form-control m-bot15" id="progdi_id" required="true"';
        echo form_dropdown('progdi_id', $option_progdi, '', $style_progdi);
    ?>    
</div>