<!DOCTYPE html>
<html>
<head>
	<title>test upload</title>
</head>
<body>

	
		
		<div class="btn-group">
		
		</div>
	
	<?php echo form_open_multipart('index.php/auth/upload'); ?>
		<div v-ripple="" style="overflow: hidden;cursor: pointer;padding-bottom: 0;margin-bottom: 0;font-size: 0;width: 100%;" class="relative-position flex flex-center items-center">
	        <label for="input_image">
	            <img id="image_show" class="responsive" src="<?= base_url() ?>plus.png"/>
	        </label>
	    </div>
	    <input type='file' name='input_image' size='20' id="input_image"/> <br>
	    <input class="btn btn-block btn-success btn-lg" type='submit' value='Importer' />
    <?php echo form_close(); ?>


<script type="text/javascript">
	document.getElementById('input_image').onchange = function() {
        var reader = new FileReader();
        //alert("tonga");
        reader.onload = function (e) {
            document.getElementById('image_show').src = e.target.result
        }
        reader.readAsDataURL(document.getElementById('input_image').files[0])
    };
</script>
</body>
</html>