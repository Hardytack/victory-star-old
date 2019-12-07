//Sets variable references for containers

function hoverEffect(e) {

var container = e.parentElement;
var inner = e;

//Mouse Object
var mouse = {
    _x: 0,
    _y: 0,
    x: 0,
    y: 0,
    //Updated the current position of the mouse, relative to (0,0)
    updatePosition: function(event) {
        var e = event || window.event;
        this.x = e.clientX - this._x;
        this.y = (e.clientY - this._y) * -1;
    },
    //Sets the coordinates at the center of the element
    setOrigin: function(e) {
        this._x = e.offsetLeft + Math.floor(e.offsetWidth/2);
        this._y = e.offsetTop + Math.floor(e.offsetHeight/2);
    },
    //Shows the curtrent position of the mouse
    show: function() {return '(' + this.x + ', ' + this.y + ')';}
};

//Track the mouse position relative to the center of contaienr
mouse.setOrigin(container);

//When counter reaches update rate, an update will be made
var counter = 0;
var updateRate = 10;
var isTimeToUpdate = function() {
    return counter++ % updateRate === 0;
};

//Handlers for Mouse Events!
var onMouseEnterHandler = function(event) {
    update(event);
};

var onMouseLeaveHandler = function() {
    inner.style = "";
}


var onMouseMoveHandler = function(event) {
    if (isTimeToUpdate()) {
      update(event);
    }
  };


//Updates the mouse position and updates the styles
var update = function(event) {
    mouse.updatePosition(event);
    updateTransformStyle(
        (mouse.y / inner.offsetHeight/2).toFixed(12),
        (mouse.x / inner.offsetWidth/2).toFixed(12)
    );
};

//updates the style for each prefix
var updateTransformStyle = function(x, y) {
    var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
    inner.style.transform = style;
}

//Adds the event listeners to activate the handlers
container.onmouseenter = onMouseEnterHandler;
container.onmouseleave = onMouseLeaveHandler;
container.onmousemove = onMouseMoveHandler;

}
