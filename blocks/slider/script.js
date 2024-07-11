( $ => {

	const Script = {
		init: () => {

			Script.prepareSlider();
			Script.listeners();

		},

		prepareSlider: () => {

			$(".js-s-slider").on(
				"init reInit afterChange",
				function (event, slick, currentSlide, nextSlide) {
				  //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
				  if (!slick.$dots || !slick.options.slidesToScroll) {
					return;
				  }
				  var i =
					(currentSlide
					  ? Math.ceil(currentSlide / slick.options.slidesToScroll)
					  : 0) + 1;
				  var before_current_page_number = Script.isNumberLessThanTen(i) ? 0 : "";
				  var before_total_pages_number = Script.isNumberLessThanTen(
					slick.$dots[0].children.length
				  )
					? 0
					: "";
		  
				  var current_page =
					'<span class="current-page">' +
					before_current_page_number +
					+i +
					"</span>";
		  
				  var total_pages =
					'<span class="total-pages">' +
					before_total_pages_number +
					slick.$dots[0].children.length +
					"</span>";
					$(".paging-info").html(
					current_page + '<span class="separator">/</span>' + total_pages
				  );
				}
			);

			$(".js-s-slider")
			.slick({
			  lazyLoad: 'ondemand',
			  infinite: false,
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  dots: true,
			  prevArrow: $('.js-s-prev'),
        	  nextArrow: $('.js-s-next'),
			})
		},

		isNumberLessThanTen: function(number) {
			return number < 10;
		},

		listeners: () => {

			$(".js-s-next").on("click", function (e) {
				e.preventDefault();
				$(".js-s-slider").slick('slickPrev');
			});
			$(".js-s-prev").on("click", function (e) {
				e.preventDefault();
				$(".js-s-slider").slick('slickNext');
			});
		}
	};

	$( document ).ready( Script.init );

} ) ( jQuery );