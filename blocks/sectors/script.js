( $ => {

	const Script = {
		init: () => {

			Script.prepareSectionHeight();
			Script.listeners();

		},

		listeners: () => {
			// Open sector
			$('.js-sector-open').on('click', function() {				
				$(this).toggleClass('opened');
				var $sector_text = $('.sector-item__text', this);
				var $icon = $('.ic', this);
				var $other_sector_opened = $('.js-sector-open.opened').not($(this));

				if($other_sector_opened.length > 0) {
					$other_sector_opened.removeClass('opened').find('.sector-item__text').css({maxHeight: 0})
					$other_sector_opened.find('.ic').css({maxHeight: 0}).addClass('ic--plus').removeClass('ic--minus');
				}

				if($(this).hasClass('opened')) {
					$sector_text.css({maxHeight: $(this).outerHeight()});
					$icon.removeClass('ic--plus').addClass('ic--minus');
				}else {
					$sector_text.css({maxHeight: 0})
					$icon.addClass('ic--plus').removeClass('ic--minus');
				}
			})
		},

		prepareSectionHeight: () => {
			setTimeout(() => {
				$(".sector-item__content").each(function (i, el) {
					$(el).attr("data-height", $(el).outerHeight());
					$(el).height($(el).data("height"));
				});
			}, 300);
		},
	};

	$( document ).ready( Script.init );

} ) ( jQuery );