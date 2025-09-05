/* Parallax home section */
$(window).scroll(function(e){
	var scrolled = $(window).scrollTop();
	$('.parallax-home-section').css('top',(-(scrolled*.35) )+'px'); // 35 - скорость прокрутки
	$('.parallax-home-section-closets').css('top',(-(scrolled*.35) )+'px'); // 35 - скорость прокрутки
});
/* End parallax home section */



/* Функция "Выезжало */	
function vyezjalo(){
	onscroll = function(){
		var prokrutka = window.pageYOffset;
		if ( window.screen.width >= 992 ) {
			if ( prokrutka > 400) {
				document.getElementById('sliding-header').style.top = '0px';
			} else if ( prokrutka <= 400 ) {
				document.getElementById('sliding-header').style.top = '-100px';
			}
		}
	}
}



/* Функция "Прилипало" */
function prilipalo() {
	onscroll = function() {
		var prokrutka = window.pageYOffset;
		if ( window.screen.width >= 769 ) {
			if ( prokrutka > 57 ) {
				document.getElementById('header-2-bottom').classList.add('fixed-top');
				document.getElementById('header-2-bottom').style.position = 'fixed';
				document.getElementById('header-2-bottom').style.top = 0;
			} else {
				document.getElementById('header-2-bottom').classList.remove('fixed-top');
				document.getElementById('header-2-bottom').style.position = 'absolute';
				//document.getElementById('header-2-bottom').style.width = '100%';
				document.getElementById('header-2-bottom').style.top = '57px';
			}
		} else {
			document.getElementById('header-2-bottom').style.position = '';
			document.getElementById('header-2-bottom').style.top = 0;
			document.getElementById('header-2-bottom').classList.add('fixed-top');
		}
	}
}



/* Убираем сообщение об успешной отправки */
function modalClose () {
	document.getElementById('background-msg').style.display = 'none';
	document.getElementById('message').style.display = 'none';
	document.getElementById('btn-close').style.display = 'none';
}



// Dynamic favicon
function dynamicFavicon() {
	var delay		= 1500;
	var link 		= document.getElementById('favicon');
	var currentNum	= 0;
	var head		= document.getElementsByTagName('head')[0];
	var favicons	= [
		'https://site100.ru/wp-content/themes/site100furniture/img/ico/favicon-light-1.svg',
		'https://site100.ru/wp-content/themes/site100furniture/img/ico/favicon-dark-1.svg'
	];

	setInterval(function() {
		document.getElementById("favicon").remove();
		link.href = favicons[currentNum];
		head.append(link);
		currentNum++;
		if ( currentNum >= favicons.length ) {
			currentNum = 0;
		}
	}, delay );
}

dynamicFavicon();