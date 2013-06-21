// © Copyright 2013 by Monique Hahnefeld <http://www.monique-hahnefeld.de>
//
// This file is part of Foundation-To-Contao.
//
// Foundation-To-Contao is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Foundation-To-Contao is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with Foundation-To-Contao.  If not, see <http://www.gnu.org/licenses/>.
//
// Diese Datei ist Teil von Foundation-To-Contao.
//
// Foundation-To-Contao ist Freie Software: Sie können es unter den Bedingungen
// der GNU Lesser General Public License, wie von der Free Software Foundation,
// Version 3 der Lizenz oder (nach Ihrer Option) jeder späteren
// veröffentlichten Version, weiterverbreiten und/oder modifizieren.
//
// Foundation-To-Contao wird in der Hoffnung, dass es nützlich sein wird, aber
// OHNE JEDE GEWÄHELEISTUNG, bereitgestellt; sogar ohne die implizite
// Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
// Siehe die GNU Lesser General Public License für weitere Details.
//
// Sie sollten eine Kopie der GNU Lesser General Public License zusammen mit diesem
// Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.


$(document).ready(function() {
// #1 Optimierung des HTML-Grundgerüstes von Contao für Foundation
// Die Spaltenfunkion vom Layoutbuilder kann hier nicht eingesetzt werden
// Die Artikel im #Container werden aus diesen Herausgenommen
// und in den Wrapper unterhalb des Headers gesetzt.
// Dadurh wird das Grid-Verhalten von Foundation optimiert.
// Es muss mit den Grid-Klassen von Foundation gearbeitet werden
$('#wrapper').addClass('row');
$('.inside .mod_article:first-child').unwrap().unwrap().unwrap();

// #2 Diese Gridformatierung kann an dieser stelle auch individualisiert werden, 
//wenn diese Elemente nicht die volle Breite haben sollen.
$('#header, #footer').addClass('small-12  large-12');
// Die Klasse row ist sehr wichtig
$('#header .inside, #footer .inside').addClass('row');

// #3 Damit der Redakteur nicht bei jedem Artikel large-* eingeben muss, 
// wenn Dieser sowieso die volle Breite haben soll setzt diese 
// Funktion die Klasse large-12 für Artikel, welche nicht durch ein large-* formatiert sind.
$('#wrapper > .mod_article').each(function() {
	var _mod_articles = $(this);
	var _exist;

	for ( i = 1; i <= 12; i++) {

		var _listCurInd = _mod_articles.is('.large-' + i);
		if (_listCurInd === false) {
			_exist = false;
		} else {
			_exist = true;
			return
		}
	}
	if (_exist === false) {
	_mod_articles.addClass('small-12  large-12');
	}
});

// #4 Diese Funktion ist spezifisch für das Theme The Macarons. Der Footer-Inhalt ist 3-Spaltig
$('#footer .inside > div').addClass('large-4');
$('#footer .inside > div').children().addClass('small-10 small-centered  large-10 large-centered');
$('#footer .inside > div').children().wrap('<div class="row">');

// #5 Bild im Bildinhaltselement mittig setzen
$('.ce_image .image_container, .ce_image h2').wrap('<div class=row>');

$('.ce_image h2').each(function() {
	var _img_h2 = $(this).html();
	$(this).addClass('hide');
	$(this).parent().prepend('<h2><span><span>' + _img_h2 + '</span></span></h2>');

});

$('.ce_image .image_container, .ce_image h2').addClass('large-11 large-centered');
// #6 .back Link
$('.mod_article .back').addClass('large-12');

// #7 Navigationen
$('#metanavi ul').addClass('inline-list right');
$('#metanavi').append('<div id="underline"></div>');
$('#mainnavi').addClass('top-bar');
$('#mainnavi ul.level_1').wrap('<section>');
$('#mainnavi ul.level_1').addClass('left');
$('#mainnavi ul.level_1 li span').wrap('<a href="" class="active">');
$('#mainnavi > section').addClass('top-bar-section');
$('#mainnavi').prepend('<ul class="title-area"> <li class="name"><h1><a href="#"></a></h1></li><li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li></ul>');

// #8 mod_navigation

$('.mod_navigation ul li.submenu').addClass('has-dropdown');
$('.mod_navigation li.submenu ul').addClass('dropdown');

// #9 Formulare CSS-Klassen für das Customformular von Foundation
$('body').addClass('antialiased');
$('#wrapper form').addClass('custom');
$('#wrapper form .submit, .details a').addClass('button');
// Buttonklasse
$('#wrapper form .submit, #wrapper form .button').addClass('round');
// Buttonklasse spezifiziert
$('#tl_login .formbody, #pwvergessen').addClass('row');
//Loginformular
//dropdown
// Buttons mit PopUpfunktion werden generiert und an entsprechender Stelle angehangen.
//popup1  der Button erscheint nur wenn etwas in den Warenkorb gelegt wurde
var _empty_cart = $('#warenkorb_mini .empty.message').length;
if (_empty_cart == '1') {
	$('#warenkorb_mini').addClass('empty');
	$(' #warenkorb_mini .empty.message').addClass('hide');
}//"Warenkorb ist leer" wird generell unsichtbar geschaltet
else {
	$('#warenkorb_mini').removeClass('empty');
}
$('#warenkorb_mini').prepend('<span class="button round" title="Warenkorb Info">i</span>');
$('#warenkorb_mini span.button').attr('data-dropdown', 'warenkorb_link');
$('#warenkorb_mini .cart_mini').attr('id', 'warenkorb_link');
//Buttons für PopUp 1 & 2
$('#tl_login').parent().attr('id', 'tl_login_parent');
$('#tl_login_parent').wrap('<div id="loginlink" >');
$('#tl_login_parent').parent().prepend('<span class="button round " title="Login">Login</span>');

$('#tl_login_parent, #warenkorb_link').addClass('f-dropdown content').attr('data-dropdown-content', '');
$('#loginlink span').attr('data-dropdown', 'tl_login_parent');
//Generierung Passwort-Vergessen-Link

$('#tl_login_parent').append("<div id='pwvergessen'><a title='Passwort vergessen' target='_blank' href='passwort-vergessen.html'>Passwort vergessen</a></div>");


// Style des Sucheingabefeldes mit dessen Button mittels Foundation-Klassen
$('#header .mod_search  ').addClass('large-2 right');
$('#header .mod_search .formbody').addClass('row collapse');

$('#header .mod_search input.text, #header .mod_search input.submit').wrap('<div>');
$('#header .mod_search input.text').parent().addClass('small-8 columns');
$('#header .mod_search input.submit').parent().addClass('small-4 columns');
$('#header .mod_search .submit').addClass('button postfix');

// Customformular Elemente: Html-Struktur wird angepasst und Foundation-Klassen hinzugefügt
$('.radio_container span input, .checkbox_container span input').css('display', 'none');
$('.radio_container > span, .checkbox_container > span').each(function() {
	var _Input = $(this).find('input');
	var _Label = $(this).find('label');
	_Input.prependTo(_Label);

});
//build parent fieldset to give a with at selectbox in ce_form

$('.ce_form form  select').each(function() {
	var _selectAttr = $(this).attr('class');

	for ( i = 1; i < 12; i++) {

		var _listCur = 'large-' + i;
		var _vergleich = _selectAttr.indexOf(_listCur);

		if (_vergleich > -1) {

			var _selectlist = $(this);
			_selectlist.removeClass('large-' + i).removeClass('columns');
			_selectlist.wrap('<fieldset class="large-' + i + '">');

		}
	}
});
//build parent fieldset to give a with at selectbox in ce_form END

$('.radio_container span input').each(function() {
	var _input = $(this);
	var _abgleich = _input.attr('name');
	_input.attr('id', _abgleich);
	_input.parent().find('label').attr('for', _abgleich);

});
//deaktiviert den HTML-Tag <br>
$('.mod_article form br').addClass('hide');
//end forms
//end Core

//isotope Elements

$('.mod_article .mod_iso_checkout .steps ol li').each(function(index) {

	var _stepActive = $(this).find('.active');
	var _exist = _stepActive.index();
	if (_exist > -1) {
		var _step = $(this);
		_step.parent().addClass('step_' + index);
	}
	index++;
});
$('.mod_iso_productlist .pagination').addClass('small-11 small-centered large-11 large-centered');
$('.mod_iso_productlist .pagination p').addClass('hide ');
$('.mod_iso_productlist .pagination ul').addClass('large-12');

$('.mod_iso_checkout').addClass('row');
$('.mod_iso_checkout form').addClass('large-12 columns ');
$('.mod_iso_checkout .formbody').addClass('row');
$('.mod_registration, .mod_iso_checkout .formbody > div, .mod_lostPassword').addClass('large-6 columns ');
$('#container .mod_iso_cart').addClass('large-7');

$('#container .mod_iso_cart table').addClass('large-12');

//productleser

$('.mod_iso_productreader .product form .formbody').addClass('row');
$('.mod_iso_productreader #vorschau').addClass('large-4');
$('.mod_iso_productreader #gallery').addClass('large-2');
$('.mod_iso_productreader #kurzinfobg').addClass('large-6');

//productlist
$('.mod_iso_productlist').each(function() {
	var _productlistAttr = $(this).attr('class');

	for ( i = 1; i <= 12; i++) {

		var _listCur = 'large-' + i;
		var _vergleich = _productlistAttr.indexOf(_listCur);

		if (_vergleich > -1) {

			var _productlist = $(this);

			_productlist.addClass('row').removeClass('large-' + i).removeClass('columns');
			_productlist.find('.product_list').addClass('small-11 small-centered large-11 large-centered');
			_productlist.find('.product').addClass('small-6 large-' + i + ' columns');
			_productlist.find('form').addClass('row');
			_productlist.find('.formbody').addClass('small-11 small-centered large-11 large-centered');

		}
	}
});
$('#wrapper .product_list .large-4  .button,#wrapper .product_list .large-4  .details a, #wrapper .product_list .large-2  .button,#wrapper .product_list .large-2  .details a').addClass('small');
$('#wrapper .product_list .large-6  .button, #wrapper .product_list .large-6 .details a').addClass('medium');

//reader
$('.mod_iso_productreader').find('.product').addClass('row');
$('.mod_iso_productreader').find('form').addClass('small-12 small-uncentered large-10 large-centered');
// end  Isotope

// Produktreaderseite Footerkorrektur
var _right_wrapped = $(' #footer').parent().attr('class');
var _vergleich_wrap = _right_wrapped.indexOf('row');
if (_vergleich_wrap > -1) {
} else {
	$('#footer').wrap('<div class="row">');
}

// end Isotope

// #10 Die Klasse columns ist wichtig für die Spaltendarstellung. 
$('#wrapper, #footer').find('[class*=large-]').addClass('columns');

});
