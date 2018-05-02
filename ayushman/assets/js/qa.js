var ids=new Array();

function QAinit(){
	if(document.getElementById){
		var tids=document.getElementsByTagName('div');
		for(i=0;i<tids.length;i++)if(tids[i].className=="question")ids[ids.length]=tids[i];
		for(i=0;i<ids.length;i++)ids[i].onmouseup=setstate;
	}}

function setstate(){
	for(i=0;i<ids.length;i++){
		if(ids[i]==this){
			var d=this.parentNode.getElementsByTagName('div')[1];
			if(d.style.display=="block"){
				iEle = $(this).find("i");
				$(iEle).toggleClass('fa fa-minus-square-o');
				$(iEle).toggleClass('fa fa-plus-square-o');
				d.style.display="none";
			}
			else {
				iEle = $(this).find("i");
				$(iEle).toggleClass('fa fa-minus-square-o');
				$(iEle).toggleClass('fa fa-plus-square-o');
				d.style.display="block";
			}
		}else{
			ids[i].parentNode.getElementsByTagName('div')[1].style.display="none";
			iEle = $(ids[i]).find("i");
			$(iEle).removeClass('fa fa-minus-square-o');
			$(iEle).addClass('fa fa-plus-square-o');
		}
	}
}

function expandall(){
	if(document.getElementById){
		for(i=0;i<ids.length;i++)ids[i].parentNode.getElementsByTagName('div')[1].style.display="block";
	}}

function collapseall(){
	if(document.getElementById){
		for(i=0;i<ids.length;i++){
			ids[i].parentNode.getElementsByTagName('div')[1].style.display="none";
			iEle = $(ids[i]).find("i");
			$(iEle).removeClass('fa fa-minus-square-o');
			$(iEle).addClass('fa fa-plus-square-o');
		}
	}}

window.onload=QAinit;
