<tr>
      <th>Parameter</th>
      <th>Jan</th>
      <th>Feb</th>
      <th>Mar</th>
      <th>Apr</th>
      <th>Mei</th>
      <th>Jun</th>
      <th>Jul</th>
      <th>Ags</th>
      <th>Spt</th>
      <th>Oct</th>
      <th>Nov</th>
      <th>Des</th>
</tr>
<?php 
      if(isset($param)){
            $no = 0;
            foreach ($param as $param) {  ?>
                  
<tr>
      <th id="<?php echo $param['parameter'];?>"><?php echo $param['label'];?></th>
      <th><input type="text" class="form-control month1" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month2" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month3" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month4" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month5" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month6" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month7" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month8" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month9" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month10" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month11" name="<?php echo $param['parameter'];?>[]"></th>
      <th><input type="text" class="form-control month12" name="<?php echo $param['parameter'];?>[]"></th>
</tr>
<?php
      $no++;
            }
      echo "<input type='hidden' name='count' value='".$no."'>";
      }
?>