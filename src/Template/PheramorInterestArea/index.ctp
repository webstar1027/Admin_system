<?php 
$session = $this->request->session()->read("User");

$this->Html->addCrumb('Interests List');

?>

<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> <?php echo __("Add Interest"); ?>
                </span>
                 
            </div>
            
        </div>
        <div class="portlet-body">
          <?php
            echo $this->Form->create($category, ["type" => "file", "class" => "validateForm form-horizontal", "novalidate" => "novalidate"]);
            ?>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1">Interest Name
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control validate[required]" value="<?php echo ($edit) ? $interests_data['interest'] : ""; ?>" placeholder="Enter Interest Name"  name="interest">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Enter Interest Name...</span>
                    </div>
                    <label class="col-md-2 control-label" for="form_control_1">Interest Status
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="md-radio-inline">
                            <div class="md-radio">
                                <input type="radio" id="checkbox2_101"<?php echo (($edit && $interests_data['status'] == "1") ? "checked" : "") . ' ' . ((!$edit) ? "checked" : "") ?> value="1" name="status" class="md-radiobtn">
                                <label for="checkbox2_101">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Active 
                                </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="checkbox2_111" <?php echo (($edit && $interests_data['status'] == "0") ? "checked" : ""); ?> value="0" name="status" class="md-radiobtn">
                                <label for="checkbox2_111">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span>Inactive </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            
             <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <button type="submit" class="btn green" name="add_category"><?php echo $title;?></button>
                    <a href="<?php echo $this->Gym->createurl("PheramorInterestArea","index"); ?>" class="btn default">Reset</a> 
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
                <span class="caption-subject bold uppercase"> <?php echo __("Interests List"); ?>
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
                            <a href="<?php echo $this->Gym->createurl("PheramorInterestArea","addInterest"); ?>" class="btn sbold green"><?php echo __("Add Interest"); ?> <i class="fa fa-plus"></i></a>
                           </div>
                    </div>
                   
                </div>
                
            </div>-->
            
            <table class="mydataTable table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    

                    <tr>
                        <th><?php echo __("S.N."); ?></th>
                        <th><?php echo __("Name"); ?></th>
                        <th><?php echo __("Status"); ?></th>
                        <th><?php echo __("Action"); ?></th>
                    </tr>
                   
                </thead>
                <tbody>
                   <?php
                     //echo "<pre>"; print_r($membership_data); die;
                    $k = 1;
                    foreach ($interest_data as $data) {
                       if ($data->status== 1) {
                              $status = "<span class='label label-success'>Acive</span>";
                          } else {
                             $status = "<span class='label label-warning'>Inactive</span>";
                          } 
                        
                        echo "<tr class='gradeX odd'><td>{$k}</td><td>{$data->interest}</td>";
                         echo "<td>" . $status . "</td>";
                         echo "<td>";
                            echo "<div class='btn-group'>
                                                <button class='btn btn-xs green dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                    <i class='fa fa-angle-down'></i>
                                                </button>
                                                <ul class='dropdown-menu pull-right' role='menu'>
                                                    
                                                    <li>
                                                        <a href='{$this->Pheramor->createurl("PheramorInterestArea", "editInterests")}/{$data->id}'>
                                                            <i class='icon-pencil'></i> Edit Interest </a>
                                                    </li>
                                                    <li>
                                                        <a href='{$this->Pheramor->createurl("PheramorInterestArea", "deleteInterest")}/{$data->id}' onclick=\"return confirm('Are you sure,you want to delete this record?');\">
                                                            <i class='icon-trash'></i> Delete Interest </a>
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
<script>
    $('#search_loc').change(function(){
        $('#search_licensee_frm').submit();
    });
        
    $("[name='membership_enable_disable']").bootstrapSwitch({
        size : 'small',
        onColor : 'success',
        offColor : 'warning',
        handleWidth : 100,
        onText : "Enabled",
        offText : "Disabled",
        data:{'name':'jameel'},

        onSwitchChange : function(event, state){
            console.log('event: ',event.target.value);
            console.log('state: ',state);
            $.ajax({
                type: "POST",
                url: "<?php echo $this->request->base . '/GymAjax/membershipDisableEnableForLocation'; ?>",
                data: {mId: event.target.value, state: state},
                dataType: "JSON",
                beforeSend: function () {
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $("#member_for").empty().append(response.data);
                    } else if (response.status == 'error') {
                        $("#member_for").empty().append("<option value=''>Select Member</option>");
                        alert(response.msg);
                    }
                    return false;
                },
                error: function (jqXHR, exception) {
                    return false;
                }
            });
        }
    });
    
    function disableMembershipPlan(id){
        if(confirm('Are you sure?')){
            window.location.href='<?php echo $this->Gym->createurl("Membership","disableMembershipPlan");?>/'+id;
        }
    }
</script>

