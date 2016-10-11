window.onload = loaded; 
var timer=null;
function loaded(){
	document.getElementById('decorButton').onclick=decorFunction;
	document.getElementById('blingCheckBox').onchange = change;
	document.getElementById('pigLatin').onclick = pigLatin;
    document.getElementById('malkovitch').onclick = malkovitch;
}

function decorFunction(){
	if (timer == null) {
        timer = setInterval(changeText, 500);
        changeText();
    } else {
        clearInterval(timer);
        timer = null;
    }
}

function changeText(){
	var myTextArea = $("#mytxtarea");
    var txtSize = myTextArea.css("font-size");
    myTextArea.css("font-size", parseInt(txtSize) + 2);
}

function change(){
	if(document.getElementById('blingCheckBox').checked){
		document.getElementById('mytxtarea').className = "checked";
		$('body').css("background-image", "url('http://www.cs.washington.edu/education/courses/190m/CurrentQtr/labs/6/hundred-dollar-bill.jpg')");

	} else {
		document.getElementById('mytxtarea').className = "notchecked";
	}
}

function malkovitch() {
    var myTextArea = document.getElementById('mytxtarea');
    var text = myTextArea.value;
    var textArr = text.split(" ");
    for(var i=0;i<textArr.length;i++){
        if(textArr[i].length >= 5)
            textArr[i] = "Malkovich";
    }
    myTextArea.value = textArr.join(" ")
}

function pigLatin(){

}