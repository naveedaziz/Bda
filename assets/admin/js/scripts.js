function microtime(e) {
	var t = (new Date).getTime() / 1e3;
	var n = parseInt(t, 10);
	return e ? t : Math.round((t - n) * 1e3) / 1e3 + " " + n
}
function deleteItem(e, t) {
	var n = url + t + e;
	$(".modal-delete").show();
	$("#delitem").val(e);
	$("#delform").attr("action", n)
}
function validateVarients() {
	var e = $("#varient_title_1").val();
	var t = $("#example-tags1").val();
	var n = $("#varient_title_2").val();
	var r = $("#example-tags2").val();
	var i = $("#varient_title_3").val();
	var s = $("#example-tags3").val();
	if (e && !t) {
		$("#error_variets_1").show();
		$("html, body").animate({
			scrollTop: +600
		}, 1e3);
		return false
	} else if (n && !r) {
		$("#error_variets_1").show();
		$("html, body").animate({
			scrollTop: +600
		}, 1e3);
		return false
	} else if (i && !s) {
		$("#error_variets_1").show();
		$("html, body").animate({
			scrollTop: +600
		}, 1e3);
		return false
	} else {
		$("#error_variets_1").hide();
		return true
	}
}
function removeItem(e) {
	console.log(e);
	e.parent("div").remove()
}
function removeItemBanner(e) {
	console.log(e);
	e.parent("div").remove()
}
function specialCharators(e) {
	var t = "-";
	e = e.toLowerCase().replace(/\s+/g, t);
	var n = "àáäâèéëêìíïîòóöôùúüûñç";
	var r = "aaaaeeeeiiiioooouuuunc";
	for (var i = 0, s = n.length; i < s; i++) {
		e = e.replace(new RegExp(n.charAt(i), "g"), r.charAt(i))
	}
	e = e.replace(new RegExp("[^a-z0-9-" + t + "]", "g"), "").replace(/-+/g, t);
	return e
}
var url = "./";
$(function () {
	if ($("#varients").val() == 1) {
		$("#multi_option").show();
		$(".subcontainer").show()
	} else {
		$("#multi_option").hide();
		$(".subcontainer").hide()
	}
	$("#varients").change(function () {
		if ($(this).prop("checked")) {
			$("#varients").attr("value", "1");
			$("#multi_option").show();
			$(".subcontainer").show()
		} else {
			$("#varients").attr("value", "0");
			$("#multi_option").hide();
			$(".subcontainer").hide()
		}
	});
	$("#status").change(function () {
		if ($(this).prop("checked")) {
			$("#status").attr("value", "1")
		} else {
			$("#status").attr("value", "0")
		}
	});
	if ($("#access_limited").val() == 1) {
		$("#limited_access_block").show()
	} else {
		$("#limited_access_block").hide()
	}
	$("#access_limited").change(function () {
		if ($(this).prop("checked")) {
			$("#access_limited").attr("value", "1");
			$("#limited_access_block").show()
		} else {
			$("#access_limited").attr("value", "0");
			$("#limited_access_block").hide()
		}
	})
});
$(document).ready(function () {
	$("#title").keyup(function () {
		$("#seo_title").val(this.value);
		var e = this.value.toLowerCase();
		var t = new RegExp(" ", "g");
		var n = specialCharators(e.replace(t, "-"));
		$("#seo_url").val(n)
	})
});
window.onload = function () {
	if (window.File && window.FileList && window.FileReader) {
		var e = document.getElementById("files");
		e.addEventListener("change", function (e) {
			var t = e.target.files;
			var n = document.getElementById("result");
			for (var r = 0; r < t.length; r++) {
				var i = t[r];
				if (!i.type.match("image")) continue;
				var s = new FileReader;
				s.addEventListener("load", function (e) {
					var t = e.target;
					var r = document.createElement("div");
					r.innerHTML = "<i onclick='removeItem($(this))' class='fa fa-trash-o fa-fw remove-thumb'></i><img class='thumbnail' src='" + t.result + "'" + "title='" + t.name + "'/><input type='hidden' value='" + t.result + "' name='pic_" + microtime() + "'> ";
					n.insertBefore(r, null)
				});
				s.readAsDataURL(i)
			}
		})
		
		var eBanner = document.getElementById("filesBanner");
		eBanner.addEventListener("change", function (e) {
			var t = e.target.files;
			var n = document.getElementById("result_banner");
			for (var r = 0; r < t.length; r++) {
				var i = t[r];
				if (!i.type.match("image")) continue;
				var s = new FileReader;
				s.addEventListener("load", function (e) {
					var t = e.target;
					var r = document.createElement("div");
					r.innerHTML = "<i onclick='removeItemBanner($(this))' class='fa fa-trash-o fa-fw remove-thumb'></i><img class='thumbnail' src='" + t.result + "'" + "title='" + t.name + "'/><input type='hidden' value='" + t.result + "' name='picbanner_" + microtime() + "'> ";
					n.insertBefore(r, null)
				});
				s.readAsDataURL(i)
			}
		})
	} else {
		console.log("Your browser does not support File API")
	}
}