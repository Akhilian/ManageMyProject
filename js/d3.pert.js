/**
 * @author Adrien SAUNIER
 * @description D3.js script creating a PERT diagramm.
 * @module Pert
 */
(function(d3){

	/**
	 * Pert diagramm plugin for d3.js
	 */
	d3.pert = function(pert) {

		// Diagram's data
		var pert = pert ? pert : {},
			taskList = [],
			predecessors = [],
			maxDepth = 0,

			sourceTask,
			endTask;

		/**
		 * Return a description of the current state of the diagramm
		 * @return {string} Informations about the current state.
		 */
		pert.description = function() {
			return "==================\n"+
					"|\td3.pert\n"+
					"==================\n"+
					"Nodes : " + taskList.length +
					"\nCritical path : " + taskList.getCriticalPath();
		}

		/**
		 * Set the 'depth' attribute for each task
		 * @return {pert} Current pert object
		 */
		pert.editDepth = function() {
			/**
			 * isPredecessor() is a filter applied on the list
			 * @param  {task}  element element tested
			 * @param  {int}  index   index of the element
			 * @param  {array}  array   Array object being traversed
			 * @return {Boolean}         is the tested element a predecessor of key
			 */
			function isPredecessorOfKey(element, index, array) {
				if( element.target.id === key ) {
					return true;
				}
				else
					return false;
			}

			var adjacencyMatrix = {},
				key;

			

			/* Creating a adjacency matrix */
			for( var key in taskList ) {

				adjacencyMatrix[key] = [];

				var predecessorList = predecessors.filter(isPredecessorOfKey);

				for (var j = predecessorList.length - 1; j >= 0; j--) {

					if( ! adjacencyMatrix[key] )
						adjacencyMatrix[key] = [];

					adjacencyMatrix[key].push(predecessorList[j].source.id);
				};
			}

			while(Object.keys(adjacencyMatrix).length > 0) {

				maxDepth++;

				var taskToIgnore = [];

				/* We add tasks to ignore.
					We ignore every tasks without a predecessor.
				*/
				for (var key in adjacencyMatrix) {

					if(adjacencyMatrix[key].length == 0) {
						taskToIgnore.push(key);
					}
				}

				 for(var indexTask in taskToIgnore) {

					var taskToDelete = taskToIgnore[indexTask];

					// We remove from adjacencyMatrix tasks that are completely edited.
					delete adjacencyMatrix[taskToDelete];

					// We save the depth
					taskList[taskToDelete].depth = maxDepth;

					for (var ref in adjacencyMatrix) {

						var index = adjacencyMatrix[ref].indexOf(taskToDelete);
						
						if( index >= 0 ) {
							adjacencyMatrix[ref].splice(index, 1);
						}
					}
				}
			}

			return this;
		};

		/**
		 * Return the object
		 * @return {pert} Current pert object
		 */
		pert.proceed = function() {

			this.editDepth();
			this.addStartingPoint();
			this.addEndingPoint();

			this.editEarlyDeadline();
			this.editLateDeadline();

			return this;
		};

		/**
		 * Edit the 'earliest' attribute for each task by choosing the earliest date to begin the work
		 * @return {pert} Current pert object
		 */
		pert.editEarlyDeadline = function() {

			var orderedTasks = this.getNodePerDepthLvl(),
				task, tmpPredecessors, max,
				choosenTask;

			for(var depthLvl in orderedTasks) {
				for(var indexTask in orderedTasks[depthLvl]) {

					task = orderedTasks[depthLvl][indexTask];
					tmpPredecessors = this.getPredecessors(task.id);

					if( typeof choosenTask === 'undefined')
						choosenTask = task;

					if( tmpPredecessors.length > 0) {

						max = 0;

						for(var indexPredecessor in tmpPredecessors) {

							var tmp = tmpPredecessors[indexPredecessor].earliest + tmpPredecessors[indexPredecessor].duration;

							if(max < tmp) {
								max = tmp;
								choosenTask = tmpPredecessors[indexPredecessor];
							}
						}

						if( task.id == endTask.id) {
							endTask.earliest = max;
							endTask.latest = max;
						}
						else
							taskList[task.id].earliest = max;
					}
				}
			}

			return this;
		}

		/**
		 * Edit the 'latest' attribute for each task by choosing the earliest date to begin the work
		 * @return {pert} Current pert object
		 */
		pert.editLateDeadline = function() {

			var orderedTasks = this.getNodePerDepthLvl(),
				task, tmpPredecessors, min, tmp,
				choosenTask;

			for(var depthLvl = orderedTasks.length-1; depthLvl > 0; depthLvl--) {
				for(var indexTask in orderedTasks[depthLvl]) {

					task = orderedTasks[depthLvl][indexTask];

					tmpSuccessors = this.getSuccessors(task.id);

					min = -1;

					for(var indexSuccessor in tmpSuccessors) {

						tmp = tmpSuccessors[indexSuccessor].latest - task.duration;

						if( tmp < min || min == -1 )
							min = tmp;
					}

					if( min != -1) {
						taskList[task.id].latest = min;
					}
				}
			}

			return this;
		}

		/**
		 * Return the list of the tasks
		 * @return {[type]} [description]
		 */
		pert.getNodePerDepthLvl = function() {

			var orderedTasks = new Array(this.getMaxDepth() + 2);

			for(var index in taskList) {

				if( typeof orderedTasks[taskList[index].depth] == 'undefined')
					orderedTasks[taskList[index].depth] = new Array();

				orderedTasks[taskList[index].depth].push(taskList[index]);
			}

			orderedTasks[0] = [sourceTask];
			orderedTasks[(this.getMaxDepth()+1)] = [endTask];

			return orderedTasks;
		};

		/**
		 * Return the organised list of ID's on the critical path
		 * @return {[task.id]} Array of Task.id
		 */
		pert.getCriticalPath = function() {
			var nodes = this.getNodePerDepthLvl(),
				path = [];

			for(var depthLvl in nodes) {
				for(var index in nodes[depthLvl]) {
					if( nodes[depthLvl][index].earliest == nodes[depthLvl][index].latest && !nodes[depthLvl][index].special )
						path.push(nodes[depthLvl][index].id);
				}
			}

			return path;
		};

		/**
		 * Add a new task to the diagramm
		 * @param {[type]} task) { taskList.push(task [description]
		 */
		pert.addTask = function(task) { taskList[task.id] = task; return this; };

		pert.addStartingPoint = function() {

			var nodes = this.getNodePerDepthLvl();

			sourceTask = new d3.task();
			sourceTask.setSpecialState();

			for(var i=0; i<nodes[1].length; i++)
				this.addPredecessor(nodes[1][i], sourceTask);
		};

		pert.addEndingPoint = function() { 
			var nodes = this.getNodePerDepthLvl();

			endTask = new d3.task();
			endTask.setSpecialState();

			for(var i=0; i<nodes[this.getMaxDepth()].length; i++) {
				this.addPredecessor(endTask,nodes[this.getMaxDepth()][i]);
			}
		};

		pert.removeTask = function() { console.error('TODO: Not implemented.'); };

		pert.exportTasks = function() { console.error('TODO: Not implemented.'); };

		pert.getPredecessors = function (idTask) {
			if(idTask) {
				var tasks = predecessors.filter(function(element) {
					if( element.target.id == idTask )
						return true;
				});

				var result = [];
				for (var key in tasks ) {
					result.push(tasks[key].source);
				}

				return result;
			}
			else
				return predecessors;
		}

		/**
		 * Return the next steps of the task's id
		 * @param  {number||string} idTasks
		 * @return {mixed}
		 */
		pert.getSuccessors = function(idTasks) {
			if(idTasks) {
				var tasks = predecessors.filter(function(element) {
					if( element.source.id == idTasks )
						return true;
				});

				var result = [];

				for (var key in tasks ) {
					result.push(tasks[key].target);
				}

				return result;
			}
			else
				throw 'Unspecified ID for the task';
		};

		pert.getMaxDepth = function() {
			return maxDepth;
		};

		/**
		 * Add a scheduling constraint
		 * @param {d3.task} task
		 * @param {d3.task} ancestor
		 * @return {d3.pert} [description]
		 */
		pert.addPredecessor = function( task, ancestor ) { 
			var alreadyExisting = false;
			predecessors.forEach(function(element, index) {
				alreadyExisting = (element.target.id == task.id && element.source.id == ancestor.id) ? true : false;

				if(alreadyExisting)
					return 1;
			});

			if ( ! alreadyExisting ) {
				predecessors.push({ "target" : task, "source" : ancestor, right: true });
			}
			else {
				console.error('This predecessor is already registered.');
			}

			return this;
		};

		pert.getTasks = function() {
			return taskList;
		}

		pert.getById = function(idTask) {
			return taskList.filter(function(element) {
				return (element.id === idTask);
			});
		}

		return pert;
	};

	/**
	 * Tasks object
	 * @param  {[type]} task [description]
	 * @return {[type]}      [description]
	 */
	d3.task = function(task) {

		var defaults = { id : '', name : '', description : '', progression : 0, duration : 0, depth : -1, earliest : -1, latest : -1 };
		var task = task || defaults;

		for (var key in defaults ) {
			if(  ! task.hasOwnProperty(key) )
				task[key] = defaults[key];
		}

		task.setSpecialState = function() {
			task.special = true;
			task.depth = 0;
			task.id = Math.floor(Math.random() * 100000);
			task.earliest = task.latest = 0;

			delete task.name;
			delete task.description;
			delete task.progression;
		}

		return task;
	};

	/**
	 * Util. Provide tools to handle timers.
	 * @type {Object}
	 */
	d3.task.unity = {

		"day" : 24 * 60 * 60,
		"hour" : 60 * 60,

		toSecond : function(unity, duration) {
			return duration * this[unity];
		},

		addCustom : function(unity, seconds) {
			this[unity] = seconds;
		}
	};

	/**
	 * Pert Layout. Display the 
	 * @param  {[type]} pert [description]
	 * @return {[type]}      [description]
	 */
	d3.layout.pert = function(pertOptions) {

		var defaultOptions = {
			elementID : 'body',
			backgroundColor : 'white',
			dimension : [500, 500]
		};

		var options =  pertOptions || defaultOptions,
			layout = {},
			events = d3.dispatch('create', 'delete', 'expend', 'collapse'),
			pert;

		/** 
		 * Set default options when not specified in pertOptions
		 * @return {[type]} [description]
		 */
		(function mergeOptions() {
			for (var key in defaultOptions) {
				if( ! options[key]) {
					options[key] = defaultOptions[key];
				}
			}
		})();

		/**
		 * Getter and Setter for the nodes
		 * @param  {pert} pert data
		 * @return {pert}
		 */
		layout.data = function(pert) {
			if( !arguments.length ) 
				return this.pert;
			else {
				this.pert = pert;
				return layout;
			}
		}

		setEventsListener = function() {
			events.on('create', d3_layout_force_create);
			events.on('delete', d3_layout_force_delete);
			events.on('expend', d3_layout_force_expend);
			events.on('collapse', d3_layout_force_collapse);
		}

		layout.start = function() {

			setEventsListener();

			var tasks = this.data().getPredecessors();

			console.log('Running ...');

			var svg = d3.select(options.elementID).append('svg');
			var defs = svg.append('defs');
			var stickyNoteGroup = defs.append('g').attr('id', 'stickyNode');

				stickyNoteGroup.append('svg:rect')
					.attr('id', 'wrapper')
					.attr('width', 200)
					.attr('height', 120)
					.attr('fill', 'white')
					.attr('x', 300)
					.attr('y', 200)
					.attr('rx', 2);

				stickyNoteGroup.append('svg:rect')
					.attr('id', 'nameWrapper')
					.attr('width', 200)
					.attr('height', 60)
					.attr('fill', '#31A6A8')
					.attr('x', 300)
					.attr('y', 200)
					.attr('rx', 2);

	/*			stickyNoteGroup.append('text')
					.attr('x', 330)
					.attr('y', 237)
					.attr('style', 'fill:white; font-size:25px;')
					.text( function(d) { return 'Task #'+d; } );*/

			var notes = svg.selectAll('use')
				.data(tasks)
				.enter()
				.append('use')
				.attr('xlink:href', "#stickyNode")
				.append('text')
				.attr('x', 330)
				.attr('y', 237)
				.attr('style', 'fill:white; font-size:25px;')
				.text( function(d) { return 'Task #'+d.id; } );

			notes.attr('xlink:href', "#stickyNode");

			/*svg.append('use').attr('xlink:href', "#stickyNode").attr('x', 80);
			svg.append('use').attr('xlink:href', "#stickyNode").attr('x', 300);*/
		}

		/************************************************************
			EVENTS
		************************************************************/

		d3_layout_force_create = function() { console.error('Event d3_layout_force_create is not created yet.'); };
		d3_layout_force_delete = function() { console.error('Event d3_layout_force_delete is not created yet.'); };
		d3_layout_force_expend = function() { console.error('Event d3_layout_force_expend is not created yet.'); };
		d3_layout_force_collapse = function() { console.error('Event d3_layout_force_collapse is not created yet.'); };

		return layout;
	}

})(d3);