<!--

var scrolling=false;

function og_scroll(el)
{
    if (scrolling && el!=scrolling) {
		return;
	}
	scrolling = el;
	var textareas = document.getElementsByTagName('textarea');
	for (var i=0; i<textareas.length; i++) {
		if (textareas[i].id.indexOf('markdown')==0) {
			textareas[i].scrollTop=el.scrollTop;
		}
	}
	scrolling = false;
}

function up(num)
{
	var area = document.getElementById('markdown'+num);
	if (area.scrollTop > 0) {
		area.scrollTop -= 15;
	}
	//console.log(area);
}

function down(num)
{
	var area = document.getElementById('markdown'+num);
	if (area.scrollTop < area.scrollHeight) {
		area.scrollTop += 15;
	}
}


function fix_mouse_scroll() {
	var textareas = document.getElementsByTagName('textarea');
	for (var i=0; i<textareas.length; i++) {
		if (textareas[i].id.indexOf('markdown')==0) {
			if ("onmousewheel" in document) {
				textareas[i].onmousewheel = fixscroll;
			} else {
				textareas[i].addEventListener('DOMMouseScroll', fixscroll, false);
			}
		}
	}
}

function fixscroll(event){
	var delta=event.detail? event.detail : event.wheelDelta; // positive or negative number
	delta = delta>0 ? 15 : -15;
	event.target.scrollTop += delta;
	//console.log(delta, ' with ',event.target.scrollTop);
}

//-->