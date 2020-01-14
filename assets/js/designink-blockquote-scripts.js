document.addEventListener('DOMContentLoaded', function(event) {
	DesigninkBlockquoteController.init();
});

function DesigninkBlockquoteController() { }

DesigninkBlockquoteController.init = function() {
	var blockquotes = document.querySelectorAll('.tb-blockquote');

	for(var i = 0; i < blockquotes.length; i++) {
		if(blockquotes[i].querySelector('.ds-expandable-blockquote')) {
			DesigninkBlockquoteController.setupBlockquote(blockquotes[i]);
		}
	}
};

DesigninkBlockquoteController.setupBlockquote = function(blockquote) {
	if(!(blockquote instanceof HTMLQuoteElement)) {
		console.error('Instance of non-HTMLQuoteElement passed to DesigninkBlockquoteController.setupBlockquote()');
		return;
	}

	var toggle = blockquote.querySelector('.ds-expandable-blockquote .read-more');
	DesigninkBlockquoteController.addToggleListener(blockquote, toggle);
};

DesigninkBlockquoteController.addToggleListener = function(blockquote, toggle) {
	if(!(blockquote instanceof HTMLQuoteElement)) {
		console.error('Instance of non-HTMLQuoteElement passed to DesigninkBlockquoteController.addToggleListener()');
		return;
	} else if(!(toggle instanceof HTMLSpanElement)) {
		console.error('Instance of non-HTMLSpanElement passed to DesigninkBlockquoteController.addToggleListener()');
		return;
	}

	toggle.addEventListener('click', function() {
		blockquote.classList.toggle('expand');
	});
};
