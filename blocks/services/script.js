( $ => {

	const Script = {
		el: false,
  		id: false,
		init: () => {

			Script.listeners();

		},

		listeners: () => {
			$(document).on("click", ".js-open-service", function () {
				Script.id = this.dataset.id;
				Script.el = $(this);
			  
				Script.openPopup();
			  });
		},

		getPopup: () => {
			var data = {
				action: "pdgc_ajax_get_service",
				id: Script.id,
			};

			Script.el.addClass("loading");

			$.post(pdg.ajaxUrl, data, function (res) {
				Script.el.removeClass("loading");
			
				if (res.success) {
				  Script.el.append(
					'<div class="service__popup d-none">' + res.data.html + "</div>"
				  );
			
				  $(".post-slider", Script.el).flexslider({
					animation: "slide",
					controlNav: false,
					prevText: svg.prev,
					nextText: svg.next,
					animationLoop: false,
					slideshow: false,
					touch: false,
					sync: "#post-carousel",
				  });
			
				  var $col_data = $("ul.data", Script.el),
					count = $col_data.data("count"),
					column;
				  $col_data.children().each(function (index) {
					if (index + 1 > count) {
					  if (!column) {
						column = $("<ul />")
						  .addClass("data")
						  .appendTo($(".data__wrapper", Script.el));
					  }
					  $(this).appendTo(column);
					}
				  });
				  Script.openPopup();
				} else {
				  console.error(res.data.message);
				}
			});

		},
		openPopup: () => {
			Script.reloadFancyboxSettings();
			if (!$(".service__popup", Script.el).length) {
				Script.getPopup();
			} else {
			  $.fancybox.open({
				src: "#service-popup-" + Script.id,
				closeExisting: true,
				touch: false,
				toolbar  : false,
			  });
			}
		},
		reloadFancyboxSettings: () => {
			$("[data-fancybox]").fancybox({
				touch: false,
				closeExisting: true,
			});
		}
	};

	$( document ).ready( Script.init );

} ) ( jQuery );