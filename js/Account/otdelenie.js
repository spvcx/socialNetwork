var groupObj = {
      groupId: ''
}




function setGroupObj(groupId,groupName) {
      groupObj.groupId = groupId;
      var groupInput = document.getElementById('studgroup');
      groupInput.value = groupName;
      $("#groupstud").hide();
}
function openLists(otdelenie,otdelenieName) {
      var otdelenieInput = document.getElementById('otdelenie');
      otdelenieInput.value = otdelenieName;
      var lists = document.getElementById('groupstud');
      while(lists.firstChild) {
            lists.removeChild(lists.firstChild);
      }
      ajaxGroupLists(otdelenie);
      $('#otdeleniestud').hide();

}

function ajaxGroupLists(otdNumber) {
      var lists = document.getElementById('groupstud');
      $.ajax({
            method: "POST",
            url: 'editdata.php',
            data: { otdelenie: 'z', otdnum: otdNumber}
        }).done(function(data) {
            ndata = data.replace(/\s*/g,'');
            var g = JSON.parse(ndata);
            for(let i = 0; i < g.length; i++) {
                  let limenu = document.createElement('li');
                  let lia = document.createElement('a');
                  let currentId = g[i]['id'];
                  let currentName = g[i]['name'];
                  lia.innerHTML = currentName;
                  lia.onclick = function() {
                        setGroupObj(currentId,currentName);
                  }
                  limenu.appendChild(lia);
                  lists.appendChild(limenu);
            }
        });
}

function saveGroup() {
      if(groupObj.groupId) {
            var id = document.getElementById('memValue').value;
            var groupId = groupObj.groupId;
            $.ajax({
                  method: "POST",
                  url: 'editdata.php',
                  data: { setGroup:'s',groupid:groupId, id:id }
              }).done(function(data) {
                  ndata = data.replace(/\s*/g,'');
                  console.log(ndata);

              });
      }
}