//Function XMLHttpRequest for add commentaries
function doLoad(author,text,id){
    err=document.getElementById('cerror');
	id=id.value;
	author=author.value;
	text=text.value;
	err.innerHTML = "<img src='images/upload.gif' width='32' height='8'><br><p>Ваш комментарий обрабатывается...</p>";
var req;

// создание экземпляра объекта XMLHttpRequest
if (window.XMLHttpRequest) req = new XMLHttpRequest(); 
else if (window.ActiveXObject) {
    try {
        req = new ActiveXObject('Msxml2.XMLHTTP'); //тоже самое, но для IE
    } catch (e){}
    try {
    req = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (e){}
}

if (req) {
    req.onreadystatechange = function() {
	// условие req.readyState == 4, говорит о том, что данные загружены
    	if (req.readyState == 4 && req.status == 200)  
		{ 				
				if (req.responseText=='no')
				{	//Если всё без ошибок,то формируем блок комментария для дальнейшего отображения под статьёй
					err.innerHTML="<font color='green'>Comment was added</font>";
					var div = document.createElement('div');
					div.style.border = '1px solid red';
					var d = new Date();
					div.innerHTML = "<p class='author'>Author: "+author+"</p><p class='date'>"+d.toLocaleString()+"</p><p class='text'>"+text+"</p>";
					div.setAttribute('class', 'comment_box');		
					document.getElementById("comment_block").appendChild(div);
					/* Увеличиваем счётчик комментариев */
					document.getElementById("count_com").innerHTML= parseInt(document.getElementById("count_com").innerHTML)+1;
				}
				else err.innerHTML=req.responseText;
		}        
    };  
	//Подключение файла добавления в БД
    req.open("POST", '../application/models/comment.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('id='+id+'&author='+author+'&text='+text);
} 
else alert("Браузер не поддерживает AJAX");
}
