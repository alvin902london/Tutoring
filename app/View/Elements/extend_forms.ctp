<script>
	var counter = 1;
	function moreFields(val1, val2, val3) {
		counter++;
		var newField = document.getElementById(val1).cloneNode(true);
		newField.id = 'root' + counter;
		//console.log(newField.id);
		newField.style.display = 'block';
		var newFields = newField.querySelectorAll('[name], [id], [for], [data-display]');
			for (var i=0;i<newFields.length;i++) {
				var theNames = newFields[i].name
				if (theNames)
					newFields[i].name = "data[" + val3 + "][" + counter + "][" + theNames + "]";
					console.log(newFields[i].name);
				var theNames2 = newFields[i].id;
		        if (theNames2)
		            newFields[i].id = theNames2 + counter;
		        	console.log(newFields[i].id); 
		        var theNames3 = newFields[i].htmlFor;
		        if (theNames3)
		            newFields[i].htmlFor = theNames3 + counter;
		        	console.log(newFields[i].htmlFor);  
        		var theNames4 = newFields[i].dataset.display;
		        if (theNames4)
		            newFields[i].dataset.display = theNames4 + counter;
		        	console.log(newFields[i].dataset.display);  	
			}			
		var insertHere = document.getElementById(val2);
		insertHere.parentNode.insertBefore(newField, insertHere);

	    $(function () {
	        $("#" + newFields[3].id).datetimepicker({
			    format: 'LT' //display hour and minute only
			});
	        $("#" + newFields[6].id).datetimepicker({
	        	format: 'LT' //display hour and minute only
	        });

			$("#" + newFields[3].id).on("dp.change", function (e) {
				var CurrStartDate = new Date($("#" + newFields[3].id).data("DateTimePicker").date());
			    var CurrEndDate = new Date($("#" + newFields[6].id).data("DateTimePicker").date());

			    //Make sure year, month and dates of both dates stay the same all the time
			    CurrEndDate.setDate(CurrStartDate.getDate());
			    CurrEndDate.setMonth(CurrStartDate.getMonth());
			    CurrEndDate.setFullYear(CurrStartDate.getFullYear());

				if (CurrStartDate > CurrEndDate) {
			    	CurrEndDate.setHours(CurrStartDate.getHours() + duration_hour);
			    	CurrEndDate.setMinutes(CurrStartDate.getMinutes() + duration_min);
			    	$("#" + newFields[6].id).data("DateTimePicker").date(CurrEndDate);
			    }
			});
			$("#" + newFields[6].id).on("dp.change", function (e) {
			    var CurrStartDate = new Date($("#" + newFields[3].id).data("DateTimePicker").date());
			    var CurrEndDate = new Date($("#" + newFields[6].id).data("DateTimePicker").date());

			    //Make sure  year, month and dates of both dates stay the same all the time
			    CurrStartDate.setDate(CurrEndDate.getDate());
			    CurrStartDate.setMonth(CurrEndDate.getMonth());
			    CurrStartDate.setFullYear(CurrEndDate.getFullYear());

			    if (CurrStartDate > CurrEndDate) {
			    	CurrStartDate.setHours(CurrEndDate.getHours() + duration2_hour);
			    	CurrStartDate.setMinutes(CurrEndDate.getMinutes() + duration2_min);
			    	$("#" + newFields[3].id).data("DateTimePicker").date(CurrStartDate);
			    }
	        });
	    });	    
	}
	//window.onload = moreFields2;
</script>