/**
 * In a custom Jumpstart layout, you may add the class "viewport-repeat" to any section or element to cause repeating scroll-in effects.
 */

function designinkReplaceJupmstartViewportChecker($) {
    $('#custom-main').find('.element-section.viewport-repeat, .element-section > .element.viewport-repeat').viewportChecker({
		repeat: true,
		classToAdd: 'visible',
		offset: 0
	});
}

document.addEventListener('DOMContentLoaded', function() {
	designinkReplaceJupmstartViewportChecker(jQuery);
});