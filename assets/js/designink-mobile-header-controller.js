document.addEventListener('DOMContentLoaded', function() {
	var mobileHeader = document.getElementById('mobile-header');

	if(mobileHeader instanceof HTMLElement) {
		new designinkMobileHeaderController(mobileHeader);
	}
});

function designinkMobileHeaderController(mobileHeader) {
	this.mobileHeader = mobileHeader;
	this.mobilePanel = document.getElementById('mobile-panel');
	this.adminBar = document.getElementById('wpadminbar');
	this.small = false;
	this.init();
}

designinkMobileHeaderController.prototype.init = function() {
	this.setMobileHeaderStyles();
	this.updateDocumentMargin();
	this.bindScrollListener();
};

designinkMobileHeaderController.prototype.setMobileHeaderStyles = function() {
	this.mobileHeader.style.position = 'fixed';
	this.mobileHeader.style.top = '0';
	this.mobileHeader.style.width = '100vw';
	this.mobileHeader.style.zIndex = '100000';

	document.documentElement.style.transitionDelay = '0.25s';
	document.documentElement.style.transitionProperty = 'margin';
};

designinkMobileHeaderController.prototype.updateDocumentMargin = function() {
	var admin_bar_exists = this.adminBar instanceof HTMLElement;
	var viewport_is_mobile = window.innerWidth < 992;

	if(viewport_is_mobile) {
		if(admin_bar_exists) {
			if(window.pageYOffset === 0) {
				var height = this.adminBar.offsetHeight + this.mobileHeader.offsetHeight;
				var margin = height + 'px';
				document.documentElement.style.setProperty('margin-top', margin, 'important');
				this.mobileHeader.style.top = this.adminBar.offsetHeight + 'px';
				this.mobilePanel.style.paddingTop = this.adminBar.offsetHeight + 'px';
			} else {
				var height = this.mobileHeader.offsetHeight;
				var margin = height + 'px';
				document.documentElement.style.setProperty('margin-top', margin, 'important');
				this.mobileHeader.style.top = '0px';
				this.mobilePanel.style.paddingTop = '0px';
			}
		} else {
			var height = this.mobileHeader.offsetHeight;
			var margin = height + 'px';
			document.documentElement.style.setProperty('margin-top', margin, 'important');
		}
	} else {
		if(admin_bar_exists) {
			var height = this.adminBar.offsetHeight;
			var margin = height + 'px';
			document.documentElement.style.setProperty('margin-top', margin, 'important');
		} else {
			var margin = '0px';
			document.documentElement.style.setProperty('margin-top', margin, 'important');
		}
	}
};

designinkMobileHeaderController.prototype.bindScrollListener = function() {
	window.onscroll = this.processScrollEvent.bind(this);
};

designinkMobileHeaderController.prototype.processScrollEvent = function(event) {
	var distanceFromTop = window.pageYOffset;
	var maxDistance = 8;

	if(distanceFromTop > maxDistance && this.small === false) {
		this.shrink();
	} else if(distanceFromTop <= maxDistance && this.small === true) {
		this.grow();
	}

	this.updateDocumentMargin();
};

designinkMobileHeaderController.prototype.shrink = function() {
	this.mobileHeader.style.padding = '0 0.5rem';
	this.small = true;
};

designinkMobileHeaderController.prototype.grow = function() {
	this.mobileHeader.style.padding = '';
	this.small = false;
};