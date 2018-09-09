$(document).ready(function () {

var ga = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga.type = 'text/javascript';
ga.src = 'js/follow-script.js';
ga.id = 'invisible';
document.body.appendChild(ga);
$('#invisible').remove();

var ga2 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga2.type = 'text/javascript';
ga2.src = 'js/pageview-script.js';
ga2.id = 'invisible2';
document.body.appendChild(ga2);
$('#invisible2').remove();

var ga3 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga3.type = 'text/javascript';
ga3.src = 'js/pagecreate-jscript.js';
ga3.id = 'invisible3';
document.body.appendChild(ga3);
$('#invisible3').remove();

var ga4 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga4.type = 'text/javascript';
ga4.src = 'js/upload-script.js';
ga4.id = 'invisible4';
document.body.appendChild(ga4);
$('#invisible4').remove();

var ga5 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga5.type = 'text/javascript';
ga5.src = 'js/extras/backspace_no_go_back.js';
ga5.id = 'invisible5';
document.body.appendChild(ga5);
$('#invisible5').remove();

var ga6 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga6.type = 'text/javascript';
ga6.src = 'js/page-image-script.js';
ga6.id = 'invisible6';
document.body.appendChild(ga6);
$('#invisible6').remove();

var ga7 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga7.type = 'text/javascript';
ga7.src = 'js/add_comment.js';
ga7.id = 'invisible7';
document.body.appendChild(ga7);
$('#invisible7').remove();

var ga8 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga8.type = 'text/javascript';
ga8.src = 'js/extras/js_functions.js';
ga8.id = 'invisible8';
document.body.appendChild(ga8);
$('#invisible8').remove();

var ga9 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga9.type = 'text/javascript';
ga9.src = 'js/like-script.js';
ga9.id = 'invisible9';
document.body.appendChild(ga9);
$('#invisible9').remove();

var ga10 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga10.type = 'text/javascript';
ga10.src = 'js/load_more_cmt_replys.js';
ga10.id = 'invisible10';
document.body.appendChild(ga10);
$('#invisible10').remove();

var ga11 = document.createElement("script"); //ga is to remember Google Analytics ;-)
ga11.type = 'text/javascript';
ga11.src = 'js/load_more_comments.js';
ga11.id = 'invisible11';
document.body.appendChild(ga11);
$('#invisible11').remove();
}); // end of document.ready