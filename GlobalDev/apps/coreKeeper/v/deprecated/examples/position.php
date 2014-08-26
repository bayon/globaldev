 <style>
  #parent {
    width: 60%;
    height: 40px;
    margin: 10px auto;
    padding: 5px;
    border: 1px solid #777;
    background-color: #fbca93;
    text-align: center;
  }
  .positionable {
    position: absolute;
    display: block;
    right: 0;
    bottom: 0;
    background-color: #bcd5e6;
    text-align: center;
  }
  #positionable1 {
    width: 75px;
    height: 75px;
  }
  #positionable2 {
    width: 120px;
    height: 40px;
  }
  select, input {
    margin-left: 15px;
  }
  </style>
  <script>
  $(function() {
    function position() {
      $( ".positionable" ).position({
        of: $( "#parent" ),
        my: $( "#my_horizontal" ).val() + " " + $( "#my_vertical" ).val(),
        at: $( "#at_horizontal" ).val() + " " + $( "#at_vertical" ).val(),
        collision: $( "#collision_horizontal" ).val() + " " + $( "#collision_vertical" ).val()
      });
    }
 
    $( ".positionable" ).css( "opacity", 0.5 );
 
    $( "select, input" ).bind( "click keyup change", position );
 
    $( "#parent" ).draggable({
      drag: position
    });
 
    position();
  });
  </script>
  
<div id="parent">
  <p>
  This is the position parent element.
  </p>
</div>
 
<div class="positionable" id="positionable1">
  <p>
  to position
  </p>
</div>
 
<div class="positionable" id="positionable2">
  <p>
  to position 2
  </p>
</div>
 
<div style="padding: 20px; margin-top: 75px;">
  position...
  <div style="padding-bottom: 20px;">
    <b>my:</b>
    <select id="my_horizontal">
      <option value="left">left</option>
      <option value="center">center</option>
      <option value="right">right</option>
    </select>
    <select id="my_vertical">
      <option value="top">top</option>
      <option value="center">center</option>
      <option value="bottom">bottom</option>
    </select>
  </div>
  <div style="padding-bottom: 20px;">
    <b>at:</b>
    <select id="at_horizontal">
      <option value="left">left</option>
      <option value="center">center</option>
      <option value="right">right</option>
    </select>
    <select id="at_vertical">
      <option value="top">top</option>
      <option value="center">center</option>
      <option value="bottom">bottom</option>
    </select>
  </div>
  <div style="padding-bottom: 20px;">
    <b>collision:</b>
    <select id="collision_horizontal">
      <option value="flip">flip</option>
      <option value="fit">fit</option>
      <option value="flipfit">flipfit</option>
      <option value="none">none</option>
    </select>
    <select id="collision_vertical">
      <option value="flip">flip</option>
      <option value="fit">fit</option>
      <option value="flipfit">flipfit</option>
      <option value="none">none</option>
    </select>
  </div>
</div>
