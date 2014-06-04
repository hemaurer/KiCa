<div class="container">
    <div id='calendar'></div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		 $('#calendar').fullCalendar({
		 editable: true,
		 eventSources:[

		 	{events:<?php echo $trainingseinheitenDaten;?>, backgroundColor: '#3C763D', borderColor : '#3C763D', textColor:'#fff'},
		 	{events:<?php echo $ligaDaten;?>,backgroundColor: '#428BCA', borderColor: '#428BCA'},
		 	{events:<?php echo $turnierDaten;?>,backgroundColor: '#A94442', borderColor:'#A94442', textColor:'#fff'},
		 	{events:<?php echo $freundschaftsDaten;?>,backgroundColor: '#B80591', borderColor:'#B80591', textColor:'#fff'},

			]
		 });

	 });
</script>

