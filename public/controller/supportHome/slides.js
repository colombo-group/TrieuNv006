/**
 * 
 */

//var listImg = [ 'slide1', 'slide2', 'slide3', 'slide4', 'slide5', 'slide6' ];
var listImg = $("#view-slides img");
var length = listImg.length;
var current = 0;
var widthImg = 800;
var arrow = "";
var slide = 0;
var time = null; // thoi gian nhay slide

showDefaul(listImg);
var imgsLeft = $("#imgleft img");
var imgsRight = $("#imgright img");
var dots = $("ul#chose li");

runSlide();
function showDefaul(arrayImg) {
	for (var i = 0; i < length; i++) {
		//eleCenter = '<img src="img/' + arrayImg[i] + '.jpg">';
		eleLeft = $(arrayImg).eq(getPrev(i));
		eleRight = $(arrayImg).eq(getNext(i));
		//$('#view-slides').append(eleCenter);
		//$('#imgleft').append(eleLeft);
		//$('#imgright').append(eleRight);
		$('ul#chose').append('<li></li>');
	}
}

function getPrev(index) {
	var x = index - 1;
	if (x < 0) {
		return length - 1;
	}
	return x;
}

function getNext(index) {
	var y = index + 1;
	if (y >= length) {
		return 0;
	}
	return y;
}
function goLeft() {
	current = getPrev(current);
	goImg(current)
}
function goRight() {
	current = getNext(current);
	goImg(current);
}
function goImg(index) {
	if (slide == 0) {
		$('#view-slides img').show();
		$('#view-slides').css('margin-left', (-1) * index * widthImg + "px");
	} else if (slide == 1) {
		$('#view-slides').css('margin-left', 0 + "px");
		$('#view-slides img').unbind().hide();
		$('#view-slides img').eq(current).fadeIn(500);
	}

	$('.selected').removeClass('selected');
	$('ul#chose li').eq(current).addClass('selected');
	imgsLeft.hide();
	imgsRight.hide();

	imgsLeft.eq(current).fadeIn();
	imgsRight.eq(current).fadeIn();
}
function runSlide() {

	if (arrow == "left") {
		time = setInterval(function() {
			goLeft();
		}, 1500);
	} else {
		time = setInterval(function() {
			goRight();
		}, 1500);
	}
}
$('#prev').click(function() {
	clearInterval(time);
	goLeft();
	arrow = "left";
	runSlide();
});
$('#next').click(function() {
	clearInterval(time);
	goRight();
	arrow = "right";
	runSlide();
});
//mouseArrow();
function mouseArrow() {
	$('#prev').mouseenter(function() {
		$("#imgleft").show();
	});
	$('#next').mouseenter(function() {
		$("#imgright").show();
	});
	$('#prev').mouseleave(function() {
		$("#imgleft").hide();
	});
	$('#next').mouseleave(function() {
		$("#imgright").hide();
	});
}
dots.click(function() {
	current = $("li").index($(this));
	clearInterval(time);
	goImg(current);
	runSlide();
});
$("#c1").mouseenter(function() {
	clearInterval(time);
});
$("#c1").mouseleave(function() {

	if (arrow == "left") {
		goLeft();
	} else {
		goRight();
	}
	runSlide();
});
$("#option").click(function() {
	if ($("#check-thumbnail:checked").length) {
		mouseArrow();
	} else {
		$('#prev').unbind("mouseenter");
		$('#next').unbind("mouseenter");
	}
	if ($("#check-dot:checked").length) {

		$('ul#chose').show();
	} else {
		$('ul#chose').hide();
	}
});
$("#select").change(function() {
	slide = $(this).val();
});
