<div id="quickAddContainer">
</div>
<script>
window.addEventListener('load', function () { 
  if ({RoleId}!=109 && {RoleId}!=105){ document.getElementById('quickAddContainer').parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none'; //Remove this widget 
  } else {
    //add update the src parameter with quicklink to LTI tool.
    document.getElementById('quickAddContainer').innerHTML = '<iframe src="" style="overflow-y: hidden; height: 260px; width: 100%;" scrolling="no" frameborder="0"> </iframe>';
  }
})
</script>
</p>
