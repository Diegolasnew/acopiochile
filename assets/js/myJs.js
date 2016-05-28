
////////////////////////////FUNCIONES//////////////////
function showErrorAlert (reason, detail) {
	var msg='';
	if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
	else {
		//console.log("error uploading file", reason, detail);
	}
	$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
	 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
}


function addMillionChar(monto){
	monto = parseInt(monto);
	if(monto>9999999){
		monto = parseInt(monto/1000000);
		monto = formatNumber(monto)+"M";
	}
	else{
		monto = formatNumber(monto);
	}
	return monto;
}

function add_loading(div){
	div.append('<div class="cargando"><i class="ace-icon fa fa-spinner fa-spin bigger-125"></i></div>')
}
function remove_loading(div){
	div.find('.cargando').remove();
}

function strip(html)
{
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}

function diferenciaDias(inico, fin){
	var date1 = new Date(inico);
	var date2 = new Date(fin);
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	return diffDays;
}

function dateToMySQL(date){
	var arr = date.split("/");
	return arr[2]+"-"+arr[1]+"-"+arr[0];
}
function escapeRegExp(str) {
    return str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}
function replaceAll(str, find, replace) {
  return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}

function getHoy(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	} 

	today = dd+'/'+mm+'/'+yyyy;
	return today;
}

function dateSQLToHTML(date){
	var t = date.split(/[- :]/)
	return t[2]+'/'+t[1]+'/'+t[0];
}
function formatDateTime(d) {
	var date = new Date(d);
	var hours = date.getHours();
	var minutes = date.getMinutes();
	var ampm = hours >= 12 ? 'pm' : 'am';
	hours = hours % 12;
	hours = hours ? hours : 12; // the hour '0' should be '12'
	minutes = minutes < 10 ? '0'+minutes : minutes;
	var strTime = hours + ':' + minutes + ' ' + ampm;
	return date.getDate() + "/" + (date.getMonth()+1) + "/" + date.getFullYear() + "  " + strTime;
}

function activarMenuLateral(){
	var url = window.location.href;
	url = url.replace("http://","" );
	var arr = url.split("/");
	url = url.replace(arr[0], "");
	var link = $('a[href="'+url+'"]');
	link.parent().addClass("active").parent().parent().addClass("active open");
}


function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

var logger = function()
{
    var oldConsoleLog = null;
    var pub = {};

    pub.enableLogger =  function enableLogger() 
                        {
                            if(oldConsoleLog == null)
                                return;

                            window['console']['log'] = oldConsoleLog;
                        };

    pub.disableLogger = function disableLogger()
                        {
                            oldConsoleLog = console.log;
                            window['console']['log'] = function() {};
                        };

    return pub;
}();

/*if (root != "/ebisu"){
	logger.disableLogger();
}*/

activarMenuLateral();

////////////////////EVENTOS CAPTURADOS/////////////////
$("#cambiar_centro_acopio").change(function(){
	var id_zona = $(this).val();
	var json = {json: "", foo: "cambiar_centro_acopio", args:  id_zona};
	$.post(root+"/control/centro_acopio/post_centro_acopio_db.php", json, function(data){
		console.log(data);
		location.reload();
	}, "json").fail(function(e){
		console.log(e.responseText);
		$(this).attr("disabled", false);
	});
});