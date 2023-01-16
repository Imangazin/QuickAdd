<div id="quickAddContainer"></div>

<script>
window.addEventListener('load', function () { 
  if ({RoleId}==109 || {RoleId}==105){document.getElementById('quickAddContainer').innerHTML = '<iframe src="/d2l/common/dialogs/quickLink/quickLink.d2l?ou={orgUnitId}&amp;type=lti&amp;rcode=E3441D29-BE5A-4BE7-AA7C-8C696DC9DDED-80125&amp;srcou=6606" style="overflow-y: hidden; height: 260px; width: 100%;" scrolling="no" frameborder="0"> </iframe>';    
  } else { 
document.getElementById('quickAddContainer').parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display='none'; //Remove this widget 
  }
})
</script>

