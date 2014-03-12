<h1>Сведения</h1>
<div class="ui-widget">
  <label for="tags">ФИО: </label>
  <input id="fio_list">
</div>
	<select id="stud_list" >
	<?php while($row=mysql_fetch_assoc($data))	{ 
			echo '<option id="'.$row['IdStudent'].'" val="'.$row['SurnameRus'].'">'.$row['SurnameRus'].' '.$row['NameRus'].' '.$row['PatronymicRus'].'</option>';
		} ?>
	</select>
	<div id="student_info">
	
	</div>
<table>
<?php
mysql_data_seek($data,0);
	while($row=mysql_fetch_assoc($data))
	{
	//	echo '<tr><td>'.$row['IdStudent'].'</td><td>'.$row['SurnameRus'].'</td><td>'.$row['NameRus'].'</td><td>'.$row['PatronymicRus'].'</td><td>'.$row['Birthday'].'</td><td>'.$row['Docseries'].$row['Docnum'].'</td></tr>';
	}

?>
</table>

<script type="text/javascript">
function info(d){
//alert(d.student.length);
$('#common').remove();
var step=0;
while (step<d.student.length)
{
var info="<div id='common'>";
info+="<div class='lang'>";
info+="<ul id='stud_sel'>";

	info+="<li><strong><?php echo FIO_RUS; ?></strong>: "+d.student[step].SurnameRus+" "+d.student[step].NameRus+" "+d.student[step].PatronymicRus+"</li>";
	info+="<li><strong><?php echo FIO_BLR; ?></strong>: "+d.student[step].SurnameBel+" "+d.student[step].NameBel+" "+d.student[step].PatronymicBel+"</li>";
	info+="<li><strong><?php echo FIO_LAT; ?></strong>: "+d.student[step].FIOlatin+"</li>";

info+="</ul>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span><br/>";
info+="<span><strong><?php echo IdDocType; ?></strong>: "+d.student[step].Name+"</span><br/>";
info+="<span><strong><?php echo Docseries; ?></strong>: "+d.student[step].Docseries+d.student[step].Docnum+"</span><br/>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span>";
info+="<span><strong><?php echo Birthday; ?></strong>: "+d.student[step].Birthday+"</span>";
info+="</div>";
info+="<div class='clr'></div>";
info+="</div>";
step++;
}
$('#stud_list').after(info);
}

//Поиск студента из списка
var field = $('#stud_list option');
 //alert($(field[5].text()));
 

var option = [];
for (var i = 0, l = field.length; i < l; i += 1) {
     option[i] = field[i].text;
}
    $( "#fio_list" ).autocomplete({
      source: option
    });



/*

//Поиск студента из списка
var field = $('#stud_list option');
 //alert($(field[5].text()));
 
// собственно поиск
$('#stud_search').bind('keyup', function() {



var option;
for (var i = 0, l = field.length; i < l; i += 1) {
     option = field[i].text;
		

	 
    var q = new RegExp($(this).val(), 'ig');
 
    for (var i = 0, l = field.length; i < l; i += 1) {
        var option = $(field[i]),
            parent = option.parent();

        if ($(field[i]).text().match(q)) {
            if (parent.is('span')) {
                option.show();
                parent.replaceWith(option);
            }
        } else {
            if (option.is('option') && (!parent.is('span'))) {
                option.wrap('<span>').hide();
            }
        }
    } 
	
	}
alert(option[5]);


}); */
</script>