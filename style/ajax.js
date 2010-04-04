var xmlHttp;
function createRequest(){
	if(window.ActiveXObject){
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
}
function vote(question_id,answer_id){
	//alert("Attempting to vote: ("+question_id+","+answer_id+")");
	createRequest();
	var url = "ajax_poll_answer.php?question_id=" + question_id + "&answer_id=" + answer_id;
	xmlHttp.open("GET", url, true);
	xmlHttp.onreadystatechange = StateChange;
	xmlHttp.send(null);
}
function setAnswer(i,j){
	document.poll.question.value = i;
	document.poll.answer.value = j;
}
function placeVote(){
	vote(document.poll.question.value,document.poll.answer.value);
}
function StateChange(){
	var getheadTag = document.getElementsByTagName('head')[0];
	setjs = document.createElement('script');
	setjs.setAttribute('type', 'text/javascript');
	getheadTag.appendChild(setjs);
	//alert(xmlHttp.responseText);
	setjs.text = xmlHttp.responseText;
}