<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX File upload using Codeigniter, jQuery</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function (e) {
                $('#formid').on('submit', function () {
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles').files.length;
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                    }
                    $.ajax({
                        url: '<?php echo base_url(); ?>ajaxupload/upload_files', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data:  new FormData(this),
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });
					return false;
                });
            });
        </script>
    </head>
    <body>
        <p id="msg"></p>
		<form id="formid" action="/" method="post" enctype="multipart/form-data">
			<input type="text" name="name" id="name" />
			<input type="file" id="multiFiles" name="files[]" multiple="multiple"/>
			<button type="submit" id="upload">Upload</button>
		</form>
    </body>
</html>