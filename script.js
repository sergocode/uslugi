$('.shake').click(function() {
  if ($('input[type="password"]').val().length < 4 || $('input[type="email"]').val().indexOf('@') == -1) {
	  $('body, .shake, input, .notification').addClass('active');
	  setTimeout(function() {
	    $('body, .shake').removeClass('active');
	  }, 1200);
  } else {
  	$('#form').submit()
  }
});

$('.cabinet-button').click(function() {
  $(this).addClass('active');
  $(this).addClass('zapros');
  setTimeout(function() {
    $('.cabinet-button').removeClass('active');
    $('.cabinet-button').removeClass('zapros');
  }, 1200);
});

$('.notification').click(function() {
  $('.notification, input').removeClass('active');
});

//Получение списка родителей у который 6 детей
$(".get-childs").click(function(e) {

var url = "/vendor/app.php";
let zapros = {"zapros": "count_kids"}
$.ajax({
       type: "POST",
       url: url,
       data: zapros,
       success: function(data)
       {	
       	   let parents = jQuery.parseJSON(data)
           appendParents(parents);
       }
     });

e.preventDefault();
});

function appendParents(parents) {
	let space = $('.fixed')
	space.empty()
	space.append( "<h3> Родители у которых 6 (шесть) детей:</h3>" )
	for (i=0; i < parents.length; i++) {
		space.append( "<span>" + parents[i]['SURNAME'] + " " + parents[i]['NAME'] + " " + parents[i]['PATRONYMIC'] + "</span>" )
	}
	space.css('display', 'flex')
	setTimeout(function() {
		space.css('display', 'none');
		space.empty()
	}, 3200);
}

//Получение списка просроченных заявок
$(".get-zayavki").click(function(e) {

var url = "/vendor/app.php";
let zapros = {"zapros": "zayavki"}
$.ajax({
       type: "POST",
       url: url,
       data: zapros,
       success: function(data)
       {	
       	   let zayavki = jQuery.parseJSON(data)
       	   console.log(zayavki)
           appendZayavki(zayavki);
       }
     });

e.preventDefault();
});

function appendZayavki(zayavki) {
	let space = $('.fixed')
	if (zayavki != "ERROR") {
		space.empty()
		space.append( "<h3> Просроченные заявки на текущий день:</h3>" )
		for (i=0; i < zayavki.length; i++) {
			space.append( "<span>" + zayavki[i]['NAME'] + "</span>" )
		}
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	} else {
		space.empty()
		space.append( "<h3> Просроченные заявки не найдены!</h3>" )
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	}
}

//Удаление просроченных заявок
$('.del-zayavki').click(function() {
  $('.fixed-request').css('display', 'flex');
});
$('.del-zayavki-false').click(function() {
  $('.fixed-request').css('display', 'none');
});

$(".del-zayavki-true").click(function(e) {

$('.fixed-request').css('display', 'none');
var url = "/vendor/app.php";
let zapros = {"zapros": "del-zayavki"}
$.ajax({
       type: "POST",
       url: url,
       data: zapros,
       success: function(data)
       {	
       	   let zayavki = jQuery.parseJSON(data)
           DelAppendZayavki(zayavki);
       }
     });

e.preventDefault();
});

function DelAppendZayavki(zayavki) {
	let space = $('.fixed')
	if (zayavki != "TRUE") {
		space.empty()
		space.append( "<h3> Ошибка!</h3>" )
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	} else {
		space.empty()
		space.append( "<h3> Просроченные заявки удалены!</h3>" )
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	}
}

//Создание заявки
$(".create-zayavka").click(function(e) {

var url = "/vendor/app.php";
let text = $('textarea').val()
if (text == "" || text.length > 2000) {
	$('.fixed').empty()
	$('.fixed').append( "<h3>Некорректная длина текста заявки</h3>" )
	$('.fixed').css('display', 'flex')
	setTimeout(function() {
		$('.fixed').css('display', 'none');
		$('.fixed').empty()
	}, 3200);
	return
}

if ($('select').val() == "От текущей даты") {
	type = "NEW"
}
if ($('select').val() != "От текущей даты") {
	type = "OLD"
}
let zapros = {"zapros": "zayavka","text": text, "type": type}
$.ajax({
       type: "POST",
       url: url,
       data: zapros,
       success: function(data)
       {	
       	   let zayavki = jQuery.parseJSON(data)
       	   console.log(zayavki)
           CreateAppendZayavki(zayavki);
       }
     });

e.preventDefault();
});

function CreateAppendZayavki(zayavki) {
	let space = $('.fixed')
	if (zayavki == "TRUE") {
		space.empty()
		space.append( "<h3>Заявка успешно создана!</h3>" )
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	} 
	if (zayavki == "NULL") {
		space.empty()
		space.append( "<h3>Некорректная длина текста заявки (проверка сервера)</h3>" )
		space.css('display', 'flex')
		setTimeout(function() {
			space.css('display', 'none');
			space.empty()
		}, 3200);
	}
}