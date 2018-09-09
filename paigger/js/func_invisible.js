
// make js invisible
function js_invisible(js_file) {
    var ga = document.createElement("script"); //ga is to remember Google Analytics ;-)
	ga.type = 'text/javascript';
	ga.src = js_file;
	document.body.appendChild(ga);
}