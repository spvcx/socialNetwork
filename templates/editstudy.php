<?php if(!$userId) header('location: http://spvcx.com'); ?>
<?php include "templates/include/header.php" ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li><a href="http://spvcx.com/?action=editmain">Основное</a></li>
            <li class='active'><a href="http://spvcx.com/?action=editstudy">Учеба</a></li>
            <li><a href="http://spvcx.com/?action=editinterests">Интересы </a></li>
        </ul>
    </div>

    <div class="panel-body">
        <div class="text-center">
        <form method="post" id="form" onsubmit="return false;" role="form" class="form-horizontal">
                <div class="form-group has-feedback" id="firstname">
                <?php echo "<input type='hidden' id='memValue' value='".$userInfo['user_id']."'>"; ?>
                  <label for="otdelenie"  class="control-label col-xs-3">Отделение</label>
                  <div class="col-xs-6">
                    <div class="input-group">
                    <div class="selectblock">
                       <nav class="dateborn">
                          <ul class="bornmenu">
                             <li>
                                <input type="text" id='otdelenie' onclick='openOtdelenie()' name='otdelenie' class="form-control lowselects"
                                <?php
                                  $haveGroup = ($userInfo['groupid'] == 0) ? False : True;
                                  if($haveGroup) {
                                    $otdId = DB::query('SELECT otdelenie_id FROM student_groups LEFT JOIN user_info ON student_groups.id = user_info.groupid WHERE groupid=:groupid',array(':groupid'=>$userInfo['groupid']))[0][0];
                                    //$otdelenieName = DB::query('SELECT name FROM otdelenie LEFT JOIN student_groups ON otdelenie.id = student_groups.otdelenie_id WHERE otdelenie_id=:otdelenie_id',array(':otdelenie_id'=>$otdId))[0][0];
                                    $otdelenieName = DB::query('SELECT name FROM otdelenie WHERE id=:id',array(':id'=>$otdId))[0][0];
                                    echo "value='".$otdelenieName."'";
                                  }
                                  ?>
                                 >
                                <ul class="downmenu" id="otdeleniestud">
                                   <?php

                                    $otd = array();
                                    $otd[] = 'ОИТУП';
                                    $otd[] = 'ОАР';
                                    $otd[] = 'СТО';
                                    for($i = 0; $i < count($otd); $i++) {
                                      $num = $i;
                                      ++$num;
                                      echo "<li><a onclick='openLists($num,this.innerHTML)'>$otd[$i]</a></li>";
                                    }

                                   ?>
                                </ul>
                             </li>
                                </ul>
                       </nav>
                    </div>
                    </div>
                  </div>
                </div>


                <div class="form-group has-feedback" id="firstname">
                  <label for="studgroup"  class="control-label col-xs-3">Группа</label>
                  <div class="col-xs-6">
                    <div class="input-group">
                    <div class="selectblock">
                       <nav class="dateborn">
                          <ul class="bornmenu">
                             <li>
                                <input type="text" id='studgroup' onclick='openGroup()' name='studgroup' class="form-control lowselects"
                                <?php
                                  if($haveGroup) {
                                    $groupName = DB::query('SELECT name FROM student_groups LEFT JOIN user_info ON student_groups.id = user_info.groupid WHERE groupid=:groupid',array(':groupid'=>$userInfo['groupid']))[0][0];
                                    echo "value='".$groupName."'";
                                  }
                                ?>>
                                <ul class="downmenu" id="groupstud">
                                  <?php

                                    if($haveGroup) {
                                      $groups = DB::query('SELECT id,name FROM student_groups WHERE otdelenie_id=:id',array(':id'=>$otdId));
                                      for($i = 0; $i < count($groups); $i++){
                                        $groupId = $groups[$i]['id'];
                                         $name = $groups[$i]['name'];
                                        echo "<li><a onclick='setGroupObj($groupId,this.innerHTML)'>$name</a></li>";
                                      }
                                    }

                                  ?>
                                </ul>
                             </li>
                          </ul>

                       </nav>
                    </div>
                    </div>
                  </div>
                </div>
              <button type="submit" class="btn btn-primary" onclick='saveGroup()'>Сохранить</button>

        </form>
    </div>

</div>
<?php include "templates/include/footer.php" ?>