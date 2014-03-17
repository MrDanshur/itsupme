// JavaScript Document
function doLoad(author,text,id){
    err=document.getElementById('cerror');
	id=id.value;
	author=author.value;
	text=text.value;
	err.innerHTML = "<img src='images/upload.gif' width='32' height='8'><br><p>Ваш комментарий обрабатывается...</p>";
var req;

if (window.XMLHttpRequest) req = new XMLHttpRequest(); 
else if (window.ActiveXObject) {
    try {
        req = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e){}
    try {
    req = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (e){}
}

if (req) {
    req.onreadystatechange = function() {
    	if (req.readyState == 4 && req.status == 200)  { alert(req.responseText); err.innerHTML="ok"; }        
    };  
    req.open("POST", '../application/models/comment.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	//alert(author);
    req.send('id='+id+'id&author='+author+'&text='+text);
} 
else alert("Браузер не поддерживает AJAX");
}
