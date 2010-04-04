if ((navigator.appName.indexOf('Microsoft')+1)) {
document.write('<style type="text/css"> .opacity1 {filter:alpha(opacity=50)} .opacity2 {filter:alpha(opacity=100)} </style>'); }
if ((navigator.appName.indexOf('Netscape')+1)) {
document.write('<style type="text/css"> .opacity1 {-moz-opacity:0.5} .opacity2 {-moz-opacity:1} </style>'); }
else {
document.write(''); }