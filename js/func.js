function first(dsc)
	{
		var qwer=$(ed).attr('id');			
		var request_edit_verbose= $("#request_edit_verbose"+qwer).val();
		$.getJSON("application/models/sql.php", {request_edit_id:request_edit_id}, function(edit_request)
			{
				if(edit_request.status=='False')
					{	alert("Не Получилось!");}
			});	
		$("#request_edit_verbose"+qwer).after("<div class='alert_top'>Данные изменены</div>");
	}