/*
//The following code should be placed into widget with iframe src populated with lti quicklink

<div id="quickAddContainer"></div>
//populate src parameter with path to this js file, you can place it in BS public files folder
<script type="text/javascript" src=""></script>
<script>
window.addEventListener('load', function () {
  if (roleId==109 || roleId==105 || roleId==){
    document.getElementById('quickAddContainer').innerHTML = '<iframe src="" style="overflow-y: hidden; height: 260px; width: 100%;" scrolling="no" frameborder="0"> </iframe>';    
  } else { 
    document.getElementById('quickAddContainer').parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none'; //Remove this widget 
  }
})
</script>
*/