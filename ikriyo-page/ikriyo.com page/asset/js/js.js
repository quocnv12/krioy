// Hiện thị nội dung GRADUATED CHILDREN và ARCHIVED CHILDREN
window.onload = function(){
	var tca = document.getElementsByClassName("title-card-archives");
	var i;
	for (i = 0; i < tca.length; i++) {
		tca[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if(panel.style.display=='none'){
				panel.style.display="flex";
				panel.style.padding="10px 10px 0px 10px";
			}else{
				panel.style.display="none";			
			}
		});
	}
// Xử lí từng cái checked 1
var check_ape=document.getElementsByClassName('check-ape');
for (var i = 0; i < check_ape.length; i++) {
	check_ape[i].children[1].addEventListener("click", function(){
		var a=this.parentElement.children[0];
		if (a.checked) {
			a.checked=false;
		} else {
			a.checked=true;
		}
	})
}
// Cập nhật icon khac o day vảo đây và thay doi background
var c=document.getElementsByClassName('item-content-fs');
var h1="asset/img/UNFavourite.png";
var h2="asset/img/Favourite.png";
for (var i = 0; i < c.length; i++) {
	c[i].addEventListener("click",function(){
		var icon_heart=this.children[1].children[0];
		var bg='rgb(255, 230, 242)';
		if (this.style.background=='none') {
			this.style.background=bg;
			icon_heart.src="asset/img/Favourite.png";
		} else {
			this.style.background='none';
			icon_heart.src="asset/img/UnFavourite.png";
		}
	})
}
}
// xoay icon mui ten 90 độ bằng jquery
$(document).ready(function(){
	$('#content-1 .title-card-archives').click(function(event) {
		if ($('#content-1 .arrow i').attr('class')=="fas fa-chevron-right active-turn-arrow") {
			$('#content-1 .arrow i').removeClass('active-turn-arrow');
		} else{
			$('#content-1 .arrow i').addClass('active-turn-arrow');
		}
	});
	$('#content-2 .title-card-archives').click(function(event) {
		if ($('#content-2 .arrow i').attr('class')=="fas fa-chevron-right active-turn-arrow") {
			$('#content-2 .arrow i').removeClass('active-turn-arrow');
		} else{
			$('#content-2 .arrow i').addClass('active-turn-arrow');
		}
	});
});

// ------------------
// triem tra check Configurations
function checkeds1(){
	var ape=document.getElementById('AllowProfileEdit');
	if (ape.checked) {
		all_checked_false('check-AllowProfileEdit');
	}else{all_checked_true('check-AllowProfileEdit');}
}
function checkeds2(){
	var ape=document.getElementById('AllowParentNotes');
	if (ape.checked) {
		all_checked_false('check-ParentNotes');
	}else{all_checked_true('check-ParentNotes');}
}

function all_checked_false(class_name){
	var checkeds=document.getElementsByClassName(class_name);
	for (var i = 0; i < checkeds.length; i++) {
		checkeds[i].checked=false;
	}
}
function all_checked_true(class_name){
	var checkeds=document.getElementsByClassName(class_name);
	for (var i = 0; i < checkeds.length; i++) {
		checkeds[i].checked=true;
	}
}
// end
function show_info(ids){
	var ids_=document.getElementById(ids);

	if (ids_.style.display=='none') {
		ids_.style.display='block';
	}else{
		ids_.style.display='none'
	}
	document.getElementById('content-card-mats').style.display='none';
}