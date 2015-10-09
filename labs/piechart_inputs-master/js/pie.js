// Generated by CoffeeScript 1.3.3
(function() {
  var Pie;

  Array.prototype.first = function() {
    return this[0];
  };

  String.prototype.to_i = function() {
    return parseInt(this, 10);
  };

  Number.prototype.round = function(digits) {
    var factor;
    if (digits == null) {
      digits = 0;
    }
    factor = Math.pow(10, digits);
    return Math.round(this * factor) / factor;
  };

  Number.prototype.to_degrees = function() {
    return this * 180 / Math.PI;
  };

  Number.prototype.to_radians = function() {
    return this / 180 * Math.PI;
  };

  $(function() {
    return $('#pie').pie();
  });

  Pie = (function() {

    function Pie(edges, value, baseAngle) {
      this.edges = edges != null ? edges : [];
      this.value = value != null ? value : 0;
      this.baseAngle = baseAngle != null ? baseAngle : 0;
    }

    Pie.prototype.addEdge = function(value) {
      this.edges.push(new Pie.prototype.Edge(this, value, this.edges.length));
      return this.value += value;
    };

    Pie.prototype.lastEdge = function() {
      var edge, _i, _len, _ref;
      _ref = this.edges.slice(0).reverse();
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        edge = _ref[_i];
        if (edge.value) {
          return edge;
        }
      }
    };

    Pie.prototype.getEdge = function(i) {
      if (i < 0) {
        i += this.edges.length;
      }
      return this.edges[i % this.edges.length];
    };

    Pie.prototype.dAngle = function(a, b) {
      var d;
      d = a - b;
      if (d > 180) {
        d -= 360;
      }
      if (d < -180) {
        d += 360;
      }
      return d;
    };

    Pie.prototype.getClosestEdge = function(goal_angle) {
      var best, edge, _i, _len, _ref;
      best = this.edges[0];
      _ref = this.edges;
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        edge = _ref[_i];
        if (Math.abs(this.dAngle(goal_angle, edge.getAngle())) < Math.abs(this.dAngle(goal_angle, best.getAngle()))) {
          best = edge;
        }
      }
      return best;
    };

    Pie.prototype.setAngle = function(new_angle, edge) {
      var dangle, direction;
      edge || (edge = this.getClosestEdge(new_angle));
      dangle = this.dAngle(new_angle, edge.getAngle());
      direction = dangle > 0 ? 'CW' : 'CCW';
      edge.changeAngle(dangle, direction, true);
      edge.nextEdge('CW').changeAngle(-dangle, 'CW');
      return edge;
    };

    Pie.prototype.getValues = function() {
      return this.edges.map(function(edge) {
        return edge.value;
      });
    };

    return Pie;

  })();

  Pie.prototype.Edge = (function() {

    function Edge(pie, value, myIndex) {
      this.pie = pie;
      this.value = value;
      this.myIndex = myIndex;
    }

    Edge.prototype.nextEdge = function(direction) {
      if (direction === 'CCW') {
        return this.pie.getEdge(this.myIndex - 1);
      } else {
        return this.pie.getEdge(this.myIndex + 1);
      }
    };

    Edge.prototype.previousEdge = function(direction) {
      if (direction === 'CW') {
        return this.pie.getEdge(this.myIndex - 1);
      } else {
        return this.pie.getEdge(this.myIndex + 1);
      }
    };

    Edge.prototype.getAngle = function() {
      var baseAngle;
      if (this === this.pie.edges.first()) {
        baseAngle = this.pie.baseAngle;
      } else {
        baseAngle = this.nextEdge('CCW').getAngle();
      }
      return baseAngle + this.sliceWidth() % 360;
    };

    Edge.prototype.sliceWidth = function() {
      return this.value / this.pie.value * 360;
    };

    Edge.prototype.changeAngle = function(dAngle, direction, updateBase) {
      var difference, slice_width;
      if (updateBase == null) {
        updateBase = false;
      }
      slice_width = this.sliceWidth();
      if ((-dAngle) > slice_width) {
        console.log("dAngle greater than slice width by " + difference + ": " + dAngle + " " + slice_width);
        difference = slice_width + dAngle;
        this.value = 0;
        this.nextEdge(direction).changeAngle(difference, direction, updateBase);
        dAngle = -slice_width;
      } else {
        console.log("value, next value " + this.value + " " + (this.nextEdge(direction).value));
        this.value += (dAngle / 360) * this.pie.value;
      }
      if (updateBase && this === this.pie.lastEdge()) {
        console.log("update base " + dAngle);
        this.pie.baseAngle += dAngle;
      }
      if (this.value > this.pie.value) {
        console.log("Warning: edge " + this.myIndex + " new value too large: " + this.value + " > " + this.pie.value);
        return this.value = this.pie.value;
      }
    };

    return Edge;

  })();

  $.fn.pie = function(options) {
    var arc, arcTween, arcs, click_angle, data, defaults, donut, element, gs, inputs, label_arc, labels, middle, mouse_angle, pie, position_to_angle, radius, selected_edge, setAngle, svg, touch_angle,
      _this = this;
    if (options == null) {
      options = {};
    }
    element = this.get(0);
    pie = new Pie();
    this.data({
      pie: pie
    });
    defaults = {
      label_radius: 40,
      label_prefix: '%',
      label_suffix: '',
      color: d3.scale.category20(),
      display_accuracy: 2,
      output_accuracy: 2
    };
    $.extend(options, defaults);
    this.find('input').each(function(i, el) {
      return pie.addEdge($(el).val().to_i());
    });
    middle = {
      x: this.width() / 2,
      y: this.height() / 2
    };
    radius = Math.min(middle.x, middle.y);
    donut = d3.layout.pie().sort(null);
    donut.heading = function(degrees) {
      this.startAngle(degrees.to_radians());
      return this.endAngle((degrees + 360).to_radians());
    };
    arc = d3.svg.arc().innerRadius(0).outerRadius(radius);
    label_arc = d3.svg.arc().innerRadius(radius - options.label_radius).outerRadius(radius - options.label_radius);
    svg = d3.select(element).append("svg:svg").attr("width", middle.x * 2).attr("height", middle.y * 2).append("svg:g").attr("transform", "translate(" + middle.x + "," + middle.y + ")");
    data = pie.getValues();
    gs = svg.selectAll("g").data(donut(data)).enter().append("svg:g");
    arcs = gs.append("svg:path").attr("fill", function(d, i) {
      return options.color(i);
    }).attr("d", arc).each(function(d) {
      return this._current = d;
    });
    labels = gs.append('svg:text').attr("text-anchor", "middle");
    click_angle = function(e) {
      return position_to_angle(e.offsetX - middle.x, middle.y - e.offsetY);
    };
    touch_angle = function(e) {
      return position_to_angle(e.originalEvent.touches[0].clientX - middle.x, middle.y - e.originalEvent.touches[0].clientY);
    };
    position_to_angle = function(dx, dy) {
      var mouse_angle;
      mouse_angle = Math.atan(dx / dy).to_degrees();
      if (dy < 0) {
        mouse_angle = 180 + mouse_angle;
      }
      if (dy >= 0 && dx < 0) {
        mouse_angle = 360 + mouse_angle;
      }
      return mouse_angle;
    };
    mouse_angle = void 0;
    selected_edge = null;
    inputs = d3.select(element).selectAll('input');
    setAngle = function(degrees, animate) {
      var arc_data;
      if (animate == null) {
        animate = false;
      }
      if (mouse_angle === degrees) {
        return;
      }
      mouse_angle = degrees;
      if (selected_edge) {
        pie.setAngle(mouse_angle, selected_edge);
      } else {
        selected_edge = pie.setAngle(mouse_angle);
      }
      arc_data = donut.heading(pie.baseAngle)(pie.getValues());
      arcs.data(arc_data).transition().duration(0).attrTween("d", arcTween);
      labels.data(arc_data).attr("transform", function(d) {
        return "translate(" + (label_arc.centroid(d)) + ")";
      }).text(function(d) {
        return options.label_prefix + d.value.round(options.display_accuracy) + options.label_suffix;
      });
      return inputs.data(arc_data).attr('value', function(d) {
        return d.value.round(options.output_accuracy);
      });
    };
    arcTween = function(datum, i, a) {
      var interpolator;
      interpolator = d3.interpolate(this._current, datum);
      this._current = interpolator(0);
      return function(t) {
        return arc(interpolator(t));
      };
    };
    setAngle(pie.baseAngle);
    mouse_angle = void 0;
    selected_edge = null;
    this.on('mousedown', function(e) {
      return setAngle(click_angle(e));
    });
    this.on('mousemove', function(e) {
      if (!selected_edge) {
        return;
      }
      return setAngle(click_angle(e));
    });
    $(document).on('mouseup', function(e) {
      setAngle(click_angle(e));
      return selected_edge = null;
    });
    this.on('touchstart', function(e) {
      return setAngle(touch_angle(e));
    });
    this.on('touchmove', function(e) {
      e.preventDefault();
      if (!selected_edge) {
        return;
      }
      return setAngle(touch_angle(e));
    });
    return this.on('touchend', function(e) {
      setAngle(touch_angle(e));
      return selected_edge = null;
    });
  };

}).call(this);
