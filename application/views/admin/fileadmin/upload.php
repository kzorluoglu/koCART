 
 
 <html>
	<head>
		<title>Ajax File Uploader Plugin For Jquery</title>
     <script src="<?php echo base_url()?>js/ajaxfileupload.js"></script>
 	<script type="text/javascript">
	function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'../../fileadmin/upload_file',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							alert(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
	</script>	
	</head>

	<body>
<div id="wrapper">
    <div id="content">
    	<h1>Ajax File Upload Demo</h1>
 
		<img id="loading" src="loading.gif" style="display:none;">
		<form name="form" action="" method="POST" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" class="tableForm">

		<thead>
			<tr>
				<th>Please select a file and click Upload button</th>
			</tr>
		</thead>
		<tbody>	
			<tr>
				<td><input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"></td>			</tr>

		</tbody>
			<tfoot>
				<tr>
					<td><button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">Upload</button></td>
				</tr>
			</tfoot>
	
	</table>
		</form>    	
    </div>
    

	</body>
</html>