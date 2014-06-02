/**
 * @author Adrien SAUNIER
 * @description Creating a PERT diagramm
 */

// SVG document
//var svg = d3.select('#diagramWrapper').append('svg');

// Pert helper
var pert = new d3.pert();

var unity = d3.task.unity;
//unity.addCustom('week', 5 * 24 * 60 * 60);
unity.addCustom('week', 1);

var tacheA = d3.task( { id : "A", duration : unity.toSecond('week', 2), description : "First task to do" } );
var tacheB = d3.task( { id : "B", duration : unity.toSecond('week', 1) } );
var tacheC = d3.task( { id : "C", duration : unity.toSecond('week', 2) } );
var tacheD = d3.task( { id : "D", duration : unity.toSecond('week', 1) } );
var tacheE = d3.task( { id : "E", duration : unity.toSecond('week', 1) } );
var tacheF = d3.task( { id : "F", duration : unity.toSecond('week', 4) } );
var tacheG = d3.task( { id : "G", duration : unity.toSecond('week', 3) } );
var tacheH = d3.task( { id : "H", duration : unity.toSecond('week', 2) } );
var tacheI = d3.task( { id : "I", duration : unity.toSecond('week', 2) } );
var tacheJ = d3.task( { id : "J", duration : unity.toSecond('week', 2) } );
var tacheK = d3.task( { id : "K", duration : unity.toSecond('week', 1) } );

pert.addTask( tacheA )
	.addTask( tacheB )
	.addTask( tacheC )
	.addTask( tacheD )
	.addTask( tacheE )
	.addTask( tacheF )
	.addTask( tacheG )
	.addTask( tacheH )
	.addTask( tacheI )
	.addTask( tacheJ );

pert.addPredecessor( tacheB, tacheC )
	.addPredecessor( tacheC, tacheA )
	.addPredecessor( tacheD, tacheF )
	.addPredecessor( tacheE, tacheB )
	.addPredecessor( tacheH, tacheB )
	.addPredecessor( tacheF, tacheE )
	.addPredecessor( tacheG, tacheI )
	.addPredecessor( tacheI, tacheH )
	.addPredecessor( tacheJ, tacheD )
	.addPredecessor( tacheJ, tacheG );

var nodes = pert.getTasks(),
	links = pert.getPredecessors();

//pert.proceed();


// Pert helper
var pert2 = new d3.pert();

var unity = d3.task.unity;
//unity.addCustom('week', 5 * 24 * 60 * 60);
unity.addCustom('week', 1);

var tacheA = d3.task( { id : "A", duration : unity.toSecond('week', 3), description : "First task to do" } );
var tacheB = d3.task( { id : "B", duration : unity.toSecond('week', 2) } );
var tacheC = d3.task( { id : "C", duration : unity.toSecond('week', 5) } );
var tacheD = d3.task( { id : "D", duration : unity.toSecond('week', 2) } );
var tacheE = d3.task( { id : "E", duration : unity.toSecond('week', 6) } );
var tacheF = d3.task( { id : "F", duration : unity.toSecond('week', 5) } );
var tacheG = d3.task( { id : "G", duration : unity.toSecond('week', 7) } );
var tacheH = d3.task( { id : "H", duration : unity.toSecond('week', 5) } );
var tacheI = d3.task( { id : "I", duration : unity.toSecond('week', 9) } );
var tacheJ = d3.task( { id : "J", duration : unity.toSecond('week', 7) } );

pert2.addTask( tacheA )
  .addTask( tacheB )
  .addTask( tacheC )
  .addTask( tacheD )
  .addTask( tacheE )
  .addTask( tacheF )
  .addTask( tacheG )
  .addTask( tacheH )
  .addTask( tacheI )
  .addTask( tacheJ );

pert2.addPredecessor( tacheI, tacheA )
  .addPredecessor( tacheI, tacheB )
  .addPredecessor( tacheC, tacheD )
  .addPredecessor( tacheC, tacheE )
  .addPredecessor( tacheC, tacheG )
  .addPredecessor( tacheD, tacheI )
  .addPredecessor( tacheD, tacheH )
  .addPredecessor( tacheE, tacheF )
  .addPredecessor( tacheF, tacheI )
  .addPredecessor( tacheG, tacheH )
  .addPredecessor( tacheH, tacheB )
  .addPredecessor( tacheJ, tacheC );

pert2.proceed();

var pertLayout = d3.layout.pert({
      element : '#diagramWrapper'
    })
    .data(pert2)
    .start();

/*********************************************************************************************************************
*********************************************************************************************************************/

/*var colors = d3.scale.category20c();

var lastNodeId = 2;

var force = d3.layout.force()
    .nodes(nodes)
    .links(links)
    .size([1300, 800])
    .linkDistance(100)
    .charge(-2000)
    .on('tick', tick);

var drag = force.drag().on("dragstart", dragstart);

// define arrow markers for graph links
svg.append('svg:defs').append('svg:marker') 
    .attr('id', 'end-arrow')
    .attr('viewBox', '0 -5 10 10')
    .attr('refX', 6)
    .attr('markerWidth', 3)
    .attr('markerHeight', 3)
    .attr('orient', 'auto')
  .append('svg:path')
    .attr('d', 'M0,-5L10,0L0,5')
    .attr('fill', '#FFF');

svg.append('svg:defs').append('svg:marker')
    .attr('id', 'start-arrow')
    .attr('viewBox', '0 -5 10 10')
    .attr('refX', 4)
    .attr('markerWidth', 3)
    .attr('markerHeight', 3)
    .attr('orient', 'auto')
  .append('svg:path')
    .attr('d', 'M10,-5L0,0L10,5')
    .attr('fill', '#FFF');

// line displayed when dragging new nodes
var drag_line = svg.append('svg:path')
  .attr('class', 'link dragline hcidden')
  .attr('d', 'M0,0L0,0');

// handles to link and node element groups
var path = svg.append('svg:g').selectAll('path'),
    circle = svg.append('svg:g').selectAll('g');


   // mouse event vars
var selected_node = null,
    selected_link = null,
    mousedown_link = null,
    mousedown_node = null,
    mouseup_node = null;

// update force layout (called automatically each iteration)
function tick() {
  // draw directed edges with proper padding from node centers
  path.attr('d', function(d) {
    var deltaX = d.target.x - d.source.x,
        deltaY = d.target.y - d.source.y,
        dist = Math.sqrt(deltaX * deltaX + deltaY * deltaY),
        normX = deltaX / dist,
        normY = deltaY / dist,
        sourcePadding = d.left ? 17 : 12,
        targetPadding = d.right ? 17 : 12,
        sourceX = d.source.x + (sourcePadding * normX),
        sourceY = d.source.y + (sourcePadding * normY),
        targetX = d.target.x - (targetPadding * normX),
        targetY = d.target.y - (targetPadding * normY);
    return 'M' + sourceX + ',' + sourceY + 'L' + targetX + ',' + targetY;
  });

  circle.attr('transform', function(d) {
    return 'translate(' + d.x + ',' + d.y + ')';
  });
}

function restart() {
  // path (link) group
  path = path.data(links);

  // update existing links
  path.classed('selected', function(d) { return d === selected_link; })
    .style('marker-start', function(d) { return d.left ? 'url(#start-arrow)' : ''; })
    .style('marker-end', function(d) { return d.right ? 'url(#end-arrow)' : ''; });


  // add new links
  path.enter().append('svg:path')
    .attr('class', 'link')
    .classed('selected', function(d) { return d === selected_link; })
    .style('marker-start', function(d) { return d.left ? 'url(#start-arrow)' : ''; })
    .style('marker-end', function(d) { return d.right ? 'url(#end-arrow)' : ''; })
    .on('mousedown', function(d) {
      if(d3.event.ctrlKey) return;

      // select link
      mousedown_link = d;
      if(mousedown_link === selected_link) selected_link = null;
      else selected_link = mousedown_link;
      selected_node = null;
      restart();
    });

  // remove old links
  path.exit().remove();


  // circle (node) group
  // NB: the function arg is crucial here! nodes are known by id, not by index!
  circle = circle.data(nodes, function(d) { return d.id; });

  // update existing nodes (reflexive & selected visual states)
  circle.selectAll('circle')
    .style('fill', function(d) { return (d === selected_node) ? d3.rgb(colors(d.id)).brighter().toString() : colors(d.id); })
    .classed('reflexive', function(d) { return d.reflexive; });
  // add new nodes
  var g = circle.enter().append('svg:g');

  g.append('svg:circle')
    .attr('class', 'node')
    .attr('r', 12)
    .style('fill', function(d) { return (d === selected_node) ? d3.rgb(colors(d.id)).brighter().toString() : colors(d.id); })
    .style('stroke', function(d) { return d3.rgb(colors(d.id)).darker().toString(); })
    .classed('reflexive', function(d) { return d.reflexive; })
    .call(drag);

  // show node IDs
  g.append('svg:text')
      .attr('x', 0)
      .attr('y', 4)
      .attr('class', 'id')
      .text(function(d) { return d.id; });

  // remove old nodes
  circle.exit().remove();

  // set the graph in motion
  force.start();
}

function dragstart(d) {
	console.log('boboiobo');
	d3.select(this).classed("fixed", d.fixed = true);
}

restart();*/
