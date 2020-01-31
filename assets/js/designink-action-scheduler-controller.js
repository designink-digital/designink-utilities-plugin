document.addEventListener('DOMContentLoaded', function() {
	var schedulers = document.querySelectorAll('.ds-action-scheduler')

	for(var i = 0; i < schedulers.length; i++) {
		var name = schedulers[i].getAttribute('data-scheduler-name');

		if(name) {
			new DesigninkActionSchedulerController(schedulers[i], name);
		}
	}
});

function DesigninkActionSchedulerController(scheduler, name) {
	if(!(scheduler instanceof HTMLDivElement)) {
		console.error("Non-instance of HTMLDivElement passed to DesigninkActionSchedulerController constructor argument <strong>scheduler</strong>.");
		return;
	}

	if(typeof name !== 'string') {
		console.error("Non-instance of string passed to DesigninkActionSchedulerController constructor argument <strong>name</strong>.");
		return;
	}

	this.scheduler = scheduler;
	this.name = name;
	this.tabElements = scheduler.querySelectorAll('.action-type-tabs .nav-tab');
	this.scheduleTypeInput = scheduler.querySelector('input.action-type');
	this.init()
}

DesigninkActionSchedulerController.prototype.init = function() {
	this.bindTabActions();
};

DesigninkActionSchedulerController.prototype.bindTabActions = function() {
	if(this.tabElements.length > 0) {
		for(var i = 0; i < this.tabElements.length; i++) {
			this.tabElements[i].addEventListener('click', this.processTabAction.bind(this));
		}
	}
};

DesigninkActionSchedulerController.prototype.processTabAction = function(event) {
	var tabElement = event.target;
	var view = tabElement.getAttribute('data-view');

	this.scheduleTypeInput.value = view;
	this.setActiveTab(view);
};

DesigninkActionSchedulerController.prototype.setActiveTab = function(view) {
	for(var i = 0; i < this.tabElements.length; i++) {
		var tabElement = this.tabElements[i];

		if(tabElement.getAttribute('data-view') === view) {
			if(!tabElement.classList.contains('nav-tab-active')) {
				tabElement.classList.add('nav-tab-active');
			}
		} else {
			tabElement.classList.remove('nav-tab-active');
		}
	}
};