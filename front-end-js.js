function quickAddVisibility(roleId, orgUnitId){
	// populate src parameter of the iframe with quicklink to the LTI tool, and replace within the link {OrgUnitId} with '+orgUnitId+'
	if (roleId==109 || roleId==105){document.getElementById('quickAddContainer').innerHTML = '<iframe src="" style="overflow-y: hidden; height: 260px; width: 100%;" scrolling="no" frameborder="0"> </iframe>';    
    } else { 
document.getElementById('quickAddContainer').parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none'; //Remove this widget 
      }
}
/*
//The following code should be placed into widget

<div id="quickAddContainer"></div>
//populate src parameter with path to this js file, you can place it in BS public files folder
<script type="text/javascript" src=""></script>
<script>
window.addEventListener('load', function () {
  quickAddVisibility({RoleId}, {OrgUnitId});
})
</script>
*/

