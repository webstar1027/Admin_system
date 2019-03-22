<?php 
$session = $this->request->session()->read("User");

$this->Html->addCrumb('App Location List');
echo $this->Html->css('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css');
echo $this->Html->script('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js');

?>
<style>
    .mt-element-ribbon .ribbon{
        margin: 0px;
    }
    .bootstrap-tagsinput{
        width:100%;
        border: none;
        border-bottom:1px solid #ccc;
        box-shadow:none;
    }
  .bg-grey-steel {
    float: left;
    padding-right: 10px;
    margin-bottom:10px;
}
</style>

<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> <?php echo $title;?>
                </span>
                 
            </div>
            
        </div>
        <div class="portlet-body">
          <?php
            echo $this->Form->create($category, ["type" => "file", "class" => "validateForm form-horizontal", "novalidate" => "novalidate"]);
            ?>
       <input type="hidden" id="itsId" name="itsId" value="<?php echo ($edit) ? @$dis_data['id'] : '';?>">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">Ios <small> (Version) </small>
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control validate[required]" value="<?php echo ($edit) ? $dis_data['ios'] : ""; ?>" placeholder="Enter Ios Version"  name="ios">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Enter ios Version...</span>
                    </div>
                   
                   
                    <label class="col-md-2 control-label" for="form_control_1">Android <small>(Version)</small>
                            <span class="required" aria-required="true">*</span>
                        </label>
                        <div class="col-md-4">
                             <input type="text" class="form-control validate[required]" value="<?php echo (($edit) ? $dis_data['android'] : ''); ?>" placeholder="Enter Android Version"  name="android">
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter android version....</span>
                       </div>
                </div>
                <div class="form-group form-md-line-input">
                     <label class="col-md-2 control-label" for="form_control_1">City
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                         <input type="text" class="form-control input-large" value="<?php echo @$dis_data['city']; ?>" name="city" data-role="tagsinput">
                    </div>
                     <label class="col-md-2 control-label" for="form_control_1">Status
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="md-radio-inline">
                         <div class="md-radio">
                             <input type="radio" id="checkbox2_101"<?php echo (($edit && $dis_data['status'] == "1") ? "checked" : "checked") . ' ' . ((!$edit) ? "checked" : "") ?> value="1" name="status" class="md-radiobtn">
                             <label for="checkbox2_101">
                                 <span></span>
                                 <span class="check"></span>
                                 <span class="box"></span> Active 
                             </label>
                         </div>
                         <!--<div class="md-radio">
                             <input type="radio" id="checkbox2_111" <?php echo (($edit && $dis_data['status'] == "0") ? "checked" : ""); ?> value="0" name="status" class="md-radiobtn">
                             <label for="checkbox2_111">
                                 <span></span>
                                 <span class="check"></span>
                                 <span class="box"></span>Inactive </label>
                         </div>-->

                     </div>
                    </div>

                </div>
            </div>
            
             <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <button type="submit" class="btn green" name="add_category"><?php echo $title;?></button>
                    <a href="<?php echo $this->Gym->createurl("PheramorAppLocation","index"); ?>" class="btn default">Reset</a> 
                </div>
            </div>
            <p>&nbsp;</p>     
        </form>
        
            
            
        </div>
    </div>

    
    
    	
    
</div>

<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> <?php echo __("App LOcation List"); ?>
                </span>
                 
            </div>
            <div class="actions">
                <div class="tools"> </div>
            </div>
        </div>
        <div class="portlet-body">

            <!--<div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="<?php echo $this->Gym->createurl("PheramorTags","addTag"); ?>" class="btn sbold green"><?php echo __("Add Tags"); ?> <i class="fa fa-plus"></i></a>
                           </div>
                    </div>
                   
                </div>
                
            </div>-->
            
            <table class="mydataTable table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    

                    <tr>
                        <th><?php echo __("S.N."); ?></th>
                        <th><?php echo __("Ios Version "); ?></th>
                        <th><?php echo __("Andriod Version"); ?></th>
                        <th><?php echo __("City Name"); ?></th>
                        <th><?php echo __("Status"); ?></th>
                        <th><?php echo __("Action"); ?></th>
                    </tr>
                   
                </thead>
                <tbody>
                   <?php
                     //echo "<pre>"; print_r($membership_data); die;
                    $k = 1;
                    foreach ($discount_data as $data) {
                       if ($data->status== 1) {
                              $status = "<span class='label label-success'>Acive</span>";
                          } else {
                             $status = "<span class='label label-warning'>Inactive</span>";
                          } 
                         
                            $status = "<span class='label label-success'>Acive</span>";  
                         
                        
                        echo "<tr class='gradeX odd'><td>{$k}</td><td>{$data->ios}</td><td>{$data->android}</td><td>";
                        
                       $vals = explode(',', $data->city);
                       $layout=1;
                        foreach ($vals as $key => $val) {
                         
                            if($layout%2==0){$layout_txt='';}else{$layout_txt='primary';}

                            echo '<div class="mt-element-ribbon bg-grey-steel">
                                                            <div class="ribbon ribbon-round ribbon-border-dash ribbon-color-'.$layout_txt.'">'.trim($val).'</div>
                                                          </div>';
                            $layout++;   
                        }
                        echo "</td><td>" . $status . "</td>";
                         echo "<td>";
                            echo "<div class='btn-group'>
                                                <button class='btn btn-xs green dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                    <i class='fa fa-angle-down'></i>
                                                </button>
                                                <ul class='dropdown-menu pull-right' role='menu'>
                                                    
                                                    <li>
                                                        <a href='{$this->Pheramor->createurl("PheramorAppLocation", "editLocations")}/{$data->id}'>
                                                            <i class='icon-pencil'></i> Edit App Location </a>
                                                    </li>
                                                   
                                                  
                                                    </ul>
                                                    </div>
                                                    </td>
						</tr>";
                        $k++;
                    }
                    ?>

                    


                </tbody>
            </table>
        </div>
    </div>

    
    
    	
    
</div>


