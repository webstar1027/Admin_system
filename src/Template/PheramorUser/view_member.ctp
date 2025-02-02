<?php
$this->Html->addCrumb('List Members', array('controller' => 'PheramorUser', 'action' => 'memberList'));
$this->Html->addCrumb('View Member');
//echo json_encode($cal_array); die;
$base_url = $this->request->base;

$profile_data=@$data['pheramor_user_profile'][0];
$user_id=$profile_data['user_id'];

echo $this->Html->css('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
echo $this->Html->script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');
//echo $this->Html->css('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); 
//echo $this->Html->script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
//echo $this->Html->script('assets/pages/scripts/components-bootstrap-switch.min.js');

?>

<script>
    $(".content-wrapper").css("height", "2500px");
    $(document).ready(function () {
        $(".sub-history").dataTable({
            "responsive": true,
            "order": [[1, "asc"]],
            "aoColumns": [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}],
            "language": {<?php echo $this->Gym->data_table_lang(); ?>}
        });

        var box_height = $(".box").height();
        var box_height = box_height + 100;
        $(".content").css("height", box_height + "px");
    });
</script>
<div class="portlet light portlet-fit portlet-datatable bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-eye font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase"> <?php echo __("View Member"); ?>

            </span>
        </div>
        <div class="top">
<?php
//$data_to_encode = '1012012,BLAHBLAH01234,1234567891011';
//$this->Barcode->setType('C128');
//$this->Barcode->setCode($data_to_encode);
//$this->Barcode->setSize(80,200);
//    
//// Generate filename            
//echo $random = rand(0,1000000);
//
//$file = '/var/www/html/pheramor/code_'.$random.'.png';
//    
//// Generates image file on server            
//echo $this->Barcode->writeBarcodeFile($file);
$myurl='?page=1';

?>
            <div class="btn-set pull-right">
                <a href="<?php echo $this->Gym->createurl("PheramorUser", "memberList".$myurl); ?>" class="btn blue"><i class="fa fa-bars"></i> <?php echo __("Members List"); ?></a>

            </div>
        </div>
    </div>
    <div class="portlet-body">
        <div class="">

            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet green-meadow box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Personal Information </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                   
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Name"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo $profile_data['first_name']." ".$profile_data['last_name']; ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Email"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo $data['email']; ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Phone No"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo ($profile_data['phone']) ? $profile_data['phone'] : '--'; ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Date Of Birth"); ?>: </div>
                                        <div class="col-md-7 value"> <?php if(!empty($profile_data['dob'])){ echo date($this->Pheramor->getSettings("date_format"), strtotime($profile_data['dob']->format("Y-m-d")));}else{ echo "N/A";} ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Gender"); ?>: </div>
                                        <div class="col-md-7 value"> <?php if($profile_data['gender']==1){ echo "Male";}else{ echo "Female";}; ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Enable Notification"); ?>: </div>
                                        <div class="col-md-7 value"><?php echo $data['enable_notification'] == 1 ? "Yes" : "No"; ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Bone Marrow Donor"); ?>: </div>
                                        <div class="col-md-7 value"><?php echo $profile_data['bone_marrow_donor'] == 1 ? "Yes" : "No"; ?> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet blue-hoki box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Other Information </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                  <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Race"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo $this->Pheramor->getRaceName($profile_data['race']); ?> </div>
                                    </div>
                                  <div class="row static-info">
                                        <div class="col-md-5 name"> <?php echo __("Religion"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo $this->Pheramor->getReligionName($profile_data['religion']); ?> </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Zipcode"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo $this->Pheramor->getZipCodeByID($profile_data['zipcode']); ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Show Me"); ?>: </div>
                                        <div class="col-md-7 value"> <?php  echo $this->Pheramor->getShowMe($profile_data['show_me']); ?></div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Age Range"); ?>: </div>
                                        <div class="col-md-7 value"> <?php echo preg_replace('/[ ,]+/', ' - ', trim($profile_data['age_range']));  ?> Years</div>
                                    </div>
                                    <?php if($profile_data['gender']==0){ ?>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Birth Pill"); ?>: </div>
                                        <div class="col-md-7 value"><?php echo $data['birth_pill'] == 1 ? "Yes" : "No"; ?> </div>
                                    </div>    
                                    <?Php }
                                    ?>
                                     <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __(" Member Status"); ?>: </div>
                                        <div class="col-md-7 value"><?php echo $data['activated'] == 1 ? "Active" : "Inactive"; ?> </div>
                                    </div>
                                     <div class="row static-info">
                                        <div class="col-md-5 name"><?php echo __("Referral Code"); ?>: </div>
                                        <div class="col-md-7 value"><?php  echo $this->Pheramor->getUserReferralCode($user_id); ?> </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Second section here -->
                     
                     <div class="row">
                         
                         
                         <!-- Shipping Address Code start Here-->
                         <div class="col-md-12 col-sm-12">
                             <div class="portlet green-meadow box">
                                 <div class="portlet-title">
                                     <div class="caption">
                                         <i class="fa fa-cogs"></i>Shipping Address </div>
                                     <div class="tools">
                                         <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                         <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                     </div>
                                 </div>
                                 <div class="portlet-body" style="display: none;">

                                     <form action="#" class="validateForm form-horizontal" method="post" id="shipping_address_frm" enctype="multipart/form-data">
                                         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                         <div class="form-body">
                                             <h3 class="form-section" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 10px;">Update Shipping Address</h3>
                                             <div class="col-md-12">
                                                 <div class="col-md-6">
                                                     <div class="col-md-11">
                                                         <div class="form-group">
                                                             <label>Full Name <span class="required" aria-required="true">*</span></label>
                                                             <div class="input-group col-md-12" >
                                                                 <input type="text" name="ship_name" id="ship_name" class="form-control validate[required]" value="<?php echo ($ship_address_data->ship_name)?$ship_address_data->ship_name:"";?>" placeholder="Enter Full Name" >
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>City <span class="required" aria-required="true">*</span></label>
                                                             <div class="input-group col-md-12" >
                                                                 <input type="text" name="ship_city" id="ship_city" class="form-control validate[required]" value="<?php echo ($ship_address_data->ship_city)?$ship_address_data->ship_city:"";?>" placeholder="Enter City"  >
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label>State <span class="required" aria-required="true">*</span></label>
                                                             <div class="input-group col-md-12" >
                                                                 <input type="text" name="ship_state" id="ship_state" class="form-control validate[required]" value="<?php echo ($ship_address_data->ship_state)?$ship_address_data->ship_state:"";?>" placeholder="Enter State"  >
                                                             </div>

                                                         </div>
                                                         <div class="form-group">
                                                             <label>ZipCode <span class="required" aria-required="true">*</span></label>
                                                             <div class="input-group col-md-12" >
                                                                 <input type="text" name="ship_zipcode" id="ship_zipcode" class="form-control validate[required]" value="<?php echo ($ship_address_data->ship_zipcode)?$ship_address_data->ship_zipcode:"";?>" placeholder="Enter ZipCode"  >
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>

                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Shipping Address <span class="required" aria-required="true">*</span></label>
                                                         <div class="input-group col-md-12" >
                                                             <textarea name="ship_address" id="ship_address" rows="8" class="form-control validate[required]" placeholder="Enter Shipping Address"><?php echo ($ship_address_data->ship_address)?$ship_address_data->ship_address:"";?></textarea>

                                                         </div>
                                                     </div>

                                                     <div class="form-group">
                                                         <button type="submit" class="btn green-meadow">Submit</button>
                                                         <button type="button" class="btn default">Cancel</button>
                                                     </div>
                                                     <div class="form-group">
                                                         <div id="shipping_save_status"></div> 
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-actions">
                                             <div class="row">
                                                 <div class="col-md-offset-6 col-md-6"></div>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         
                         <!--- End Here -->
                         
                           <div class="col-md-12 col-sm-12">
                         <div class="portlet box yellow">
                             <div class="portlet-title">
                                 <div class="caption">
                                     <i class="fa fa-cubes"></i>User Genetic Data </div>
                                 <div class="tools">
                                     <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                     <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                 </div>
                             </div>
                           
                             <div class="portlet-body" style="display: none;">
                                 <!-- BEGIN FORM-->
                                 <div id="divid">
                                       
                                 <form action="#" class="validateForm form-horizontal" method="post" id="generic_data" enctype="multipart/form-data">
                                     <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                     <div class="form-body">
                                         <div class="col-md-10">
                                         <h3 class="form-section" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 10px;">User Genetic Data </h3>
                                         </div>
                                         <div  class="col-md-2" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 22px;">
                                             <input data-id="<?php echo $user_id;?>" type="checkbox" name="display_generic" value="1" class="make-switch" data-on-text="&nbsp;Display&nbsp;" data-off-text="&nbsp;Hide&nbsp;" id="bootstrapswitchs">
                                         </div>
                                         <div id="main_gen_data"></div>
                                         <div class="row" id="dummy_gen_data">
                                             <div class="col-md-12">
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">Pheramor Kit ID
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input user_kit_data" value="<?php echo @$mem_generic_data->pheramor_kit_ID;?>" <?php echo (@$mem_generic_data->pheramor_kit_ID) ? "readonly" : 'readonly'; ?>  placeholder="Enter Pheramor kit ID"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter pheramor kit ID....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-A-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_A_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-A-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-A-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-A-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_A_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-A-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-A-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-B-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input"value="**********" <?php echo (@$mem_generic_data->HLA_B_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-B-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-B-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-B-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input"value="**********" <?php echo (@$mem_generic_data->HLA_B_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-B-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-B-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-C-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_C_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-C-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-C-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-C-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_C_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-C-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-C-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DPB1-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DPB1_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DPB1-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DPB1-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DPB1-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DPB1_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DPB1-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DPB1-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DQB1-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DQB1_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DQB1-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DQB1-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DQB1-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DQB1_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DQB1-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DQB1-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DRB-1
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DRB_1) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DRB-1"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DRB-1....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="form-group form-md-line-input">
                                                         <label class="col-md-4 control-label" for="form_control_1">HLA-DRB-2
                                                             <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="col-md-8">
                                                             <input type="text" class="form-control validate[required] required_input" value="**********" <?php echo (@$mem_generic_data->HLA_DRB_2) ? "readonly" : 'readonly'; ?> placeholder="Enter HLA-DRB-2"  >
                                                                 <div class="form-control-focus"> </div>
                                                                <span class="help-block">Enter HLA-DRB-2....</span>
                                                          </div>
                                                     </div>
                                                 </div>
                                                 

                                             </div>
                                             
                                             <!--/span-->
                                         </div>
                                         
                                     </div>
                                     <div class="form-actions" id="gen-btn-box" style="display:none;">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="row">
                                                     <div class="col-md-offset-4 col-md-8">
                                                         <button type="submit" class="btn yellow">Submit</button>
                                                         <button type="button" class="btn default">Cancel</button>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-6"><div id="generic_data_status"></div> </div>
                                         </div>
                                     </div>
                                 </form>
                                 </div>
                                 <!-- END FORM-->
                                
                             </div>
                         </div>
                             </div>
                         
                         <!-- End Gereric data section here -->
                        
                        <div class="col-md-12 col-sm-12">
                         <div class="portlet box green">
                             <div class="portlet-title">
                                 <div class="caption">
                                     <i class="fa fa-gift"></i>Upload Profile Picture </div>
                                 <div class="tools">
                                     <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                     <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                 </div>
                             </div>
                           
                             <div class="portlet-body" style="display: none;">
                                 <!-- BEGIN FORM-->
                                 <div id="divid">
                                       
                                 <form action="#" class="form-horizontal" method="post" id="profile_img_data" enctype="multipart/form-data">
                                     <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                     <div class="form-body">
                                         <h3 class="form-section" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 10px;">Upload Profile Gallery</h3>
                                         <div class="row">
                                             <div id='gallery_div'>
                                             <div class="col-md-12">
                                               <?php 
                                               $cc=0;
                                               $totalGallery=count($gallery_data);
                                              if(!empty($gallery_data))
                                              {
                                               foreach($gallery_data as $imgdata){ 
                                                  // print_r($imgdata);
                                                   $style='style="height: 200px;"';
                                                   if(empty($imgdata['name'])){$style='';}
                                                   $image = (!empty($imgdata['name'])) ? $imgdata['name'] : $this->request->webroot."upload/no-image.png";
                                                    if(!empty($imgdata['name'])){
                                                   ?>
                                                <div class="col-md-3">
                                                 <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                     <h4><?php echo $imgdata['category_name'];?></h4>
                                                     <div class="fileinput-new thumbnail"  style="width: 200px; height: 150px;">
                                                         <img src="<?php echo $image;?>" alt="" id="gallertyImg_<?php echo $imgdata['id'];?>" > </div>
                                                     <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                                                         <img src="<?php echo $image;?>" alt=""  <?Php echo $style;?> > 
                                                     </div>
                                                     <div>
                                                        
                                                         <span class="btn default btn-file" id="gallertyID_<?php echo $imgdata['id'];?>" style="display:none;">
                                                             <span class="fileinput-new"> Select image </span>
                                                             <span class="fileinput-exists"> Change </span>
                                                             <input type="file" name="profile_img_<?php echo $imgdata['id'];?>"> </span>
                                                           <a href="javascript:;" class="btn red fileinput-exists del-gallery" data-id="<?php echo $imgdata['id'];?>" data-dismiss="fileinput"> Remove </a>
                                                           <input data-id="<?php echo $imgdata['id'];?>" type="radio" name="is_profile" value="1" <?php if($imgdata['is_profile']==1){ echo 'checked';}?> data-on-text="Profile" data-off-text="No" class="make-switch switch-radio1">
                                                           
                                                     </div>

                                                 </div>
                                             </div>
                                                    <?Php } else { ?>
                                                 <!-- Without image code -->
                                                          <div class="col-md-3">
                                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                   <h4><?php echo $imgdata['category_name'];?></h4>
                                                                 <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                     <img src="<?php echo $this->request->webroot . "upload/no-image.png"; ?>" alt=""> </div>
                                                                 <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                 <div>
                                                                     <span class="btn default btn-file">
                                                                         <span class="fileinput-new"> Select image </span>
                                                                         <span class="fileinput-exists"> Change </span>
                                                                         <input type="file" name="profile_img_<?php echo $imgdata['id'];?>" value='ashok'> </span>
                                                                         <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                 
                                                                 </div>

                                                             </div>
                                                    </div>
                                                    <?Php } ?>
                                                 <!--- End here -->
                                                 
                                               <?php
                                               if($cc==3){echo '</div><div class="col-md-12">';}
                                               $cc++;
                                               } 
                                              }
                                             
                                             ?>
                                             
                                             
                                             </div>
                                             </div>
                                             <!--/span-->
                                         </div>
                                         
                                     </div>
                                     <div class="form-actions">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="row">
                                                     <div class="col-md-offset-3 col-md-9">
                                                         <button type="submit" class="btn green">Submit</button>
                                                         <button type="button" class="btn default">Cancel</button>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-6"><div id="profile_img_status"></div> </div>
                                         </div>
                                     </div>
                                 </form>
                                 </div>
                                 <!-- END FORM-->
                                
                             </div>
                         </div>
                             </div>
                         
                         
                         <!-- Manange User Interst data ---> 
                         <div class="col-md-12 col-sm-12">
                         <div class="portlet box purple">
                             <div class="portlet-title">
                                 <div class="caption">
                                     <i class="fa fa-gift"></i>Manage User Interest </div>
                                 <div class="tools">
                                     <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                     <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                 </div>
                             </div>
                             <div class="portlet-body" style="display: none;">
                                 <!-- BEGIN FORM-->
                                 <!-- Facebook User Interest display here-->
                                 <h3 class="form-section" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 10px;">Facebook Interest</h3>
                                 <div class="col-md-12">
                                     <div class="portlet-body">
                                     <div class="table-scrollable">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th style="width:80%"> Interest Name </th>
                                                        <th> Category Name </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($user_fbi_data)) {
                                                        $fbcnt = 1;
                                                        foreach ($user_fbi_data as $fb_data) {
                                                            //print_r($fb_data);
                                                            $trstyle = ($fbcnt % 2 == 0) ? 'active' : '';
                                                            echo "<tr class='" . $trstyle . "'>
                                                                  <td>" . $fbcnt . "</td>
                                                                  <td >" . $fb_data['edata'] . " </td>
                                                                  <td >" . ucfirst($fb_data['interest_type']) . " </td>
                                                                  </tr>";
                                                            $fbcnt++;
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='3'>Facebook data not found !</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                     
                                 </div>
                                 <div class="col-md-12" style="height:100%">&nbsp;</div>
                                 <!-- Interest End Here -->
                                 
                                <?php //print_r($movies_interest_data); die; ?>
                                 <form action="#" class="form-horizontal" method="post" id="interest_data" enctype="multipart/form-data">
                                     <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                     <div class="form-body">
                                         <h3 class="form-section" style="border-bottom: 1px solid #e7ecf1;padding-bottom: 10px;">Manage Interest</h3>
                                        <div class="col-md-12">
                                         <div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select Movies</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("movies",$movies_cat_data,["default"=>(explode(',',@$movies_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"movies","placeholder"=>"Select Movies Lists"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <label>Select Music</label>
                                                 <div class="input-group">
                                                       <?php echo @$this->Form->select("musics",$musics_cat_data,["default"=>(explode(',',@$music_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"musics","placeholder"=>"Select Music Lists"]);    ?>
                                                    
                                                 </div>
                                             </div>
                                         </div>
                                        </div>
                                         <div class="col-md-12">
                                        <!--<div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select Tags</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("tags",$tags_data,["default"=>(explode(',',@$tags_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"tags","placeholder"=>"Select Tags Lists"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>-->
                                          <div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select Books</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("books",$books_data,["default"=>(explode(',',@$books_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"books","placeholder"=>"Select Book Lists"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                            
                                                 <div class="form-group">
                                                     <label>Select Games</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("games",$game_data,["default"=>(explode(',',@$game_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"games","placeholder"=>"Select Games List"]);    ?>
                                                     </div>
                                                 
                                             </div>
                                         </div> 
                                             
                                         </div>
                                         
                                         <div class="col-md-12">
                                        <div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select Drinks</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("drinks",$drink_data,["default"=>(explode(',',@$drink_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"drinks","placeholder"=>"Select Drinks List"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                             
                                         <div class="col-md-6">
                                             
                                                 <div class="form-group">
                                                     <label>Select Foods</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("foods",$food_data,["default"=>(explode(',',@$food_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"foods","placeholder"=>"Select Foods List"]);    ?>
                                                     </div>
                                                 </div>
                                             
                                         </div> 
                                             
                                         </div>
                                         
                                       <div class="col-md-12">
                                        <div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select Hobbies</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("hobbies",$hobbies_data,["default"=>(explode(',',@$hobbies_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"hobbies","placeholder"=>"Select Hobbies List"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                             
                                         <div class="col-md-6">
                                             
                                                 <div class="form-group">
                                                     <label>Select Sports</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("sports",$sport_data,["default"=>(explode(',',@$sport_interest_data['interest_id'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"sports","placeholder"=>"Select Sports List"]);    ?>
                                                     </div>
                                                 </div>
                                             
                                         </div>
                                             
                                         </div>
                                          <div class="col-md-12">
                                        <div class="col-md-6">
                                             <div class="col-md-11">
                                                 <div class="form-group">
                                                     <label>Select HashTags</label>
                                                     <div class="input-group">
                                                         <?php echo @$this->Form->select("hashtags_data",$hashtags_data,["default"=>(explode(',',@$user_hashtags_data['hash_tags'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"hashtags_data","placeholder"=>"Select Hashtags List"]);    ?>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                           </div>
                                         
                                         
                                     </div>
                                     <div class="form-actions">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="row">
                                                     <div class="col-md-offset-1 col-md-9">
                                                         <button type="submit" class="btn purple">Submit</button>
                                                         <button type="button" class="btn default">Cancel</button>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-md-6"><div id="interest_status"></div> </div>
                                         </div>
                                     </div>
                                 </form>
                                 <!-- END FORM-->
                                
                             </div>
                         </div>
                             </div>
                         
                         
                         <!-- -->
                         
                        <div class="col-md-12">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Credits Information </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body" style="display:none">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th> Credit Description </th>
                                                    <th> Credit Date </th>
                                                    <th> Total Credits </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($credit_data)){
                                                    $k=1;
                                                    $total_credits=0;
                                                foreach($credit_data as $credit){
                                                    $total_credits=$total_credits+$credit['credits'];
                                                    ?>
                                                <tr>
                                                    <td> <?php echo $k;?>. </td>
                                                    <td> <?php echo $credit['description'];?> </td>
                                                    <td> <?php echo date($this->Pheramor->getSettings("date_format"), strtotime($credit['created_date'])); ?> <?php //echo $credit['created_date'];?> </td>
                                                    <td> <?php echo $credit['credits'];?> </td>
                                                    
                                                </tr>
                                                <?php $k++; }
                                                 echo "<tr><td colspan='3'>&nbsp;</td>"
                                                . "<td class='portlet mt-element-ribbon light portlet-fit '><div class='ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-success uppercase'  style='left:0px;'>
                                                   <div class='ribbon-sub ribbon-shadow ribbon-right'></div>Total Credits : {$total_credits}</div></td></tr>";
                                                
                                                
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                          <!-- Start Payment Information code here -->
                         <div class="col-md-12 col-sm-12">
                                <div class="portlet red-sunglo box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Customer Card Information </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="display: none;">
                                        <div class="portlet-titl col-md-12 col-sm-12">

                                        <div class="top">
                                            <?php //if ($session["role_name"] != 'staff_member') { ?>
                                                <div class="btn-set pull-right" style="padding-bottom: 10px;">
                                                    <a href="<?php echo $this->Pheramor->createurl("PheramorPayment", "addCard/" . $user_id); ?>" class="btn red-sunglo"><i class="fa fa-bars"></i> Add Card Details</a>

                                                </div>
                                            <?php //} ?>
                                        </div>

                                    </div>
                                        <div class="table-responsive1">
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th style="width:100px;"> S.N. </th>
                                                    <th> Card Holder Name</th>
                                                    <th> Card Type</th>
                                                    <th> Card Number </th>
                                                    <th> Created Date </th>
                                                    <th> Set Default Card </th>
                                                    <th> Action </th>
                                                  </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($card_data)) {
                                                    $k =1;
                                                    foreach ($card_data as $row) {
                                                        if($row['is_default'] == '1'){
                                                            $checked = "checked";
                                                        }else{
                                                            $checked = "";
                                                        }
                                                        echo "<tr> <td>{$k}</td>
                                                        <td>{$row["cardholderName"]}</td>
                                                         <td>{$row["cardType"]}</td>
                                                         <td>{$row["maskedNumber"]}</td>";
                                                         echo"<td>" . date($this->Pheramor->getSettings("date_format"), strtotime($row["created_date"])) ."</td>";
                                                         echo '<td>
                                                            <div class="md-radio col-md-3">
                                                                <input type="radio" id="checkbox1_2_'.$row['id'].'" '.$checked.' value="1" data-id="'.$row['id'].'" name="set_default_card" class="check_limit md-radiobtn">
                                                                <label for="checkbox1_2_'.$row['id'].'">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                </label>
                                                            </div>
                                                        </td>';  
                                                       
                                                            echo " <td><a  href='{$this->request->base}/PheramorPayment/delete-card/{$row['id']}/{$user_id}' onclick=\"return confirm('Are you sure,you want to delete this record?');\" > Remove Card</a></td>";
                                                          
                                                          echo "</tr>";
                                                           $k++;
                                                    }
                                                }else{
                                                   echo "<tr align='center'><td colspan='7'>There is no record</td></tr> ";
                                                }
                                                ?>
                                                
                                            </tbody>
                                            </table>
                                            <div id="dcstatus"></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                          <!--- Membership subscriptions -->
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet yellow box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Subscription Management</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body" style="display: none;" >

                                    <div class="portlet-titl col-md-12 col-sm-12">

                                        <div class="top">
                                            <div class="btn-set pull-right" style="padding-bottom: 10px;">
                                                    <a href="<?php echo $this->Gym->createurl("PheramorPayment", "addSubscription/" . $user_id); ?>" class="btn yellow"><i class="fa fa-bars"></i> Add Subscription</a>
                                            </div>
                                            
                                        </div>

                                    </div>


                                    <div class="table-responsive1">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><?php echo __('Title', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Amount', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Paid Amount', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Start Date', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('End Date', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Payment Status', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Plan Status', 'gym_mgt'); ?></th>
                                                    <th><?php echo __('Action', 'gym_mgt'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                                if (count($subscription)) {
                                                   foreach ($subscription as $row) {
                                                       // echo "<pre>"; print_r($row); die;
                                                       if ($row['plan_status'] == 1 && $row['payment_status'] == 1) {
                                                           $plan_status = "<span class='label label-success'>Current</span>";
                                                       } else if ($row['plan_status'] == 2 && $row['payment_status'] == 0) {
                                                           $plan_status = "<span class='label label-warning'>Wish</span>";
                                                       } else if ($row['plan_status'] == 0 && $row['payment_status'] == 1) {
                                                           $plan_status = "<span class='label label-warning'>Disabled</span>";
                                                       } else if ($row['plan_status'] == 0 && $row['payment_status'] == 0) {
                                                           $plan_status = "<span class='label label-default'>Pending</span>";
                                                       } else if ($row['plan_status'] == 0 && $row['payment_status'] == 2) {
                                                           $plan_status = "<span class='label label-default'>Pending</span>";
                                                       } else if ($row['plan_status'] == 3 && $row['payment_status'] == 1) {
                                                           $plan_status = "<span class='label label-danger'>Expired</span>";
                                                       } else if ($row['plan_status'] == 3 && $row['payment_status'] == 2) {
                                                           $plan_status = "<span class='label label-danger'>Pending</span>";
                                                       } else if ($row['plan_status'] == 2 && $row['payment_status'] == 1) {
                                                           $plan_status = "<span class='label label-danger'>Upgraded</span>";
                                                       } else if ($row['plan_status'] == 4 && $row['payment_status'] == 1) {
                                                           $plan_status = "<span class='label label-info'>Unsubscribe</span>";
                                                       } else if ($row['plan_status'] == 4 && $row['payment_status'] == 0) {
                                                           $plan_status = "<span class='label label-info'>Unsubscribe</span>";
                                                       }

                                                       if ($row['payment_status'] == 1) {
                                                           $pay_status = "<span class='label label-success'> Paid</span>";
                                                       } else if ($row['payment_status'] == 0) {
                                                           $pay_status = "<span class='label label-default'>Not Paid</span>";
                                                       } else if ($row['payment_status'] == 2) {
                                                           $pay_status = "<span class='label label-danger'>Failed</span>";
                                                       }

                                                       $due = $row['paid_amount'];
                                                       echo "<tr>
								<td>{$row['pheramor_subscription']['subscription_title']}</td>
								<td>" . $this->Pheramor->get_currency_symbol() . " {$row['subscription_amount']}</td>
								<td>" . $this->Pheramor->get_currency_symbol() . " {$row['paid_amount']}</td>
								<td>" . date($this->Pheramor->getSettings("date_format"), strtotime($row["start_date"])) . "</td>
								<td>" . date($this->Pheramor->getSettings("date_format"), strtotime($row["end_date"])) . "</td>
								<td>" . $pay_status . "</td>
                                                                <td>" . $plan_status . "</td>
								<td>";

                                                       echo "<div class='btn-group'>
                                                                    <button class='btn btn-xs yellow dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                                        <i class='fa fa-angle-down'></i>
                                                                    </button>
                                                                    <ul class='dropdown-menu pull-right' role='menu'>
                                                                        <li>";
                                                       if (($row['payment_status'] == 2 || $row['payment_status'] == 0 ) && (strtotime($row["end_date"]) >= strtotime(date('Y-m-d')))) {
                                                           /* echo "<li class='divider'> </li>";
                                                             echo "<li>
                                                             <a href='{$this->request->base}/MembershipPayment/runTransaction/{$row['mp_id']}/{$row['member_id']}'>
                                                             <i class='icon-action-undo'></i> Run Transaction

                                                             </a>
                                                             </li>"; */
                                                       }
                                                       echo "</li><li><a href='javascript:void(0)' class='view_invoice' data-url='" . $this->request->base . "/PheramorAjax/viewInvoice/{$row['id']}'><i class='icon-book-open'></i> View Invoice</a></li>";
                                                       echo "<li><a href='" . $this->request->base . "/pheramorPayment/editSubscription/{$row['id']}' title='Edit'> <i class='icon-pencil'></i> Edit Membership</a></li>";
                                                       if (($row['plan_status'] == 0 && $row['payment_status'] == 0)) {
                                                           echo "<li>
                                                                
                                                                <a href='{$this->request->base}/pheramorPayment/deleteSubscription/{$row['id']}/{$row['user_id']}' onclick=\"return confirm('Are you sure,you want to delete this record?');\">
                                                                    <i class='icon-user-unfollow'></i> Delete Membership
                                                                </a>
                                                               </li>";
                                                       }
                                                       if ($row['payment_status'] == 1) {
                                                           echo "<li class='divider'> </li>";
                                                           if ($row['plan_status'] == 1) {
                                                               echo "<li>
                                                        <a href='{$this->request->base}/pheramorPayment/unsubscribe/{$row['id']}/{$row['user_id']}'>
                                                            <i class='icon-user-unfollow'></i> Unsubscribe Subscription

                                                        </a>
                                                       </li>";
                                                           }

                                                           echo "<li>
                                                        <a href='{$this->request->base}/pheramorPayment/refundPayment/{$row['id']}/{$row['user_id']}'>
                                                            <i class='icon-action-undo'></i> Refund Payment

                                                        </a>
                                                    </li>";
                                                       }
                                                       echo "</ul></div>";

                                                       echo "</td>
						</tr>";
                                                   }
                                               } else {
                                                   echo "<tr align='center'><td colspan='7'>No record found.</td></tr>";
                                               }
                                               ?> 
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Manage subscription History --> 
                        <!-- Discount Section Start Here -->
                          <div class="col-md-12">
                        <div class="portlet blue box">
                            <div class="portlet-title">
                                <div class="caption"> 
                                    <i class="icon-settings"></i> 
                                    <span class="caption-subject"> <?php echo __("Subscription Discount"); ?> </span> 
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>

                            <div class="portlet-body" style="display:none;">
                                <?php echo $this->Form->create("#", ["class" => "validateForm", "role" => "form","id"=>"discount_form"]); ?>
                                <?php // echo "<pre>";print_r($mem_discount_data); die; ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label><strong>Discount Amount</strong></label>
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-dollar"></i>
                                        </span>
                                       <input type="text" name="discount_amt" id="discount_amt" value="<?php echo @$mem_discount_data['discount_amt']; ?>" class="discount_amt form-control" placeholder="Enter Discount Amount" aria-controls="sample_1">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label><strong>Select Subscription</strong></label>
                                                    <?php echo @$this->Form->select("selected_membership", $membership, ["default" => @$mem_discount_data['membership_id'], "empty" => __("All Subscription"), "id" => "membership_ids", "class" => "membership_ids form-control gen_membership_ids","data-url" => $this->request->base . "/PheramorAjax/get_amount_by_memberships"]); ?>	
                                                </div>
                                            <div class="col-sm-4" style="margin-top:25px;">
                                                  <input type="button" class="btn btn-flat btn-primary" id="add_time" value="Add Subscription">
                                             </div>
                                            
                                        </div>
<span class="col-sm-8">
                                                <div id="total_amount_div" style="display:none;"> Membership Amount : $ <span id="total_amount">0.00</span></div>
                                                </span>
                                    </div>
                                    <div class=" clearfix"></div>
                                     <div class="col-sm-12" style="margin-top:15px;">
                                     <div class="row">
                                            <table class="table"> 
                                                <tr><th><?php echo __("Discount Amount");?></th><th><?php echo __("Membership Name");?></th><th><?php echo __("Action");?></th></tr>
                                                
                                                <tbody class="time_table">
                                                    <?php
                                                    if($mem_discount_data)
                                                    {
                                                            foreach($mem_discount_data as $dlist)
                                                            {
                                                                $subscription_name=$this->Pheramor->get_subscription_names($dlist["subscription_id"]);
                                                                ?>
                                                                    <tr>
                                                                            
                                                                            <td>$ <?php echo $dlist["discount_amt"];?></td>
                                                                            <td><?php echo $subscription_name[0]['subscription_title'];?>
                                                                            <input type="hidden" name="discount_list[]" value='[<?php echo "&quot;".$dlist["discount_amt"]."&quot;,&quot;".$dlist["subscription_id"] ."&quot;"; ?>]'>								
                                                                            </td>								
                                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-danger class_sch_del_row" data-id="<?php echo $dlist["id"]?>"><i class="fa fa-times-circle"></i></span></td>
                                                                    </tr>							
                                                    <?php }
                                                    }?>
                                                   <?php
                                                   
                                                   ?>
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                                     </div>
                                     <div style="float:right;margin-right:20px;"> <input type="submit" class="btn btn-flat btn-primary" name="save" value="Submit"></div>
                                    
                                    
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $data['id'];?>">
                                <input type="hidden" name="associated_licensee" id="associated_licensee" value="<?php echo $data['associated_licensee'];?>">
                                <?php echo $this->Form->end(); ?>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                       <div id="total_amount_div" style="display:none;"> Membership Amount : $ <span id="total_amount">0.00</span></div>
                                    </div>
                                 </div>
                                <div class=" clearfix"></div>
                            </div>
                             
                            <div class="clearfix" id="discount_status"></div>
                            <!-- Search Criteria----------------------> 
                            <!-- /Search Criteria----------------------> 

                        </div>
                    </div>
                       

                        <!-- Discount Section End here -->
                           <!-- Subscription History --------------->

                            <div class="col-md-12 col-sm-12">
                                <div class="portlet grey-cascade box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Subscription Payment History </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="display: none;">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> S.N.</th>
                                                        <th> Subscription Name </th>
                                                        <th> Payment Status </th>
                                                        <th> Product Price </th>
                                                        <th> Discount Code </th>
                                                        <th> Discount Amount </th>
                                                        <th> Paid Amount </th>
                                                        <th> Payment Date </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (!empty($subscription)) {
                                                   // print_r($subscription); die;
                                                    $tpad = 0;
                                                    $tdue = 0;
                                                    $tdiscount = 0;
                                                    $l=1;
                                                    foreach ($subscription as $row) {
                                                       if ($row['payment_status'] == 1) {
                                                            $pay_status = "<span class='label label-success'> Paid</span>";
                                                        } else if ($row['payment_status'] == 0) {
                                                            $pay_status = "<span class='label label-default'>Not Paid</span>";
                                                        } else if ($row['payment_status'] == 2) {
                                                            $pay_status = "<span class='label label-danger'>Failed</span>";
                                                        }

                                                        $tpad = $tpad + $row["paid_amount"];
                                                        $tdue = $tdue + ($row["subscription_amount"]);
                                                        $tdiscount = $tdiscount + $row["discount_amount"];
                                                        if(empty($row["discount_code"])){ $row["discount_code"]='--';}
                                                        echo "<tr>
                                                             <td>{$l}</td>
                                                            <td>{$row["pheramor_subscription"]["subscription_title"]}</td>
                                                            <td>" . $pay_status . "</span></td>
                                                            <td>" . $this->Pheramor->get_currency_symbol() . " {$row["subscription_amount"]}</td>
                                                            <td>{$row["discount_code"]}</td>
                                                            <td>" . $this->Pheramor->get_currency_symbol() . " {$row["discount_amount"]}</td>
                                                            <td>" . $this->Pheramor->get_currency_symbol() . " {$row["paid_amount"]}</td>";
                                                        if (!empty($row["created_date"])) {
                                                            echo "<td>" . date($this->Pheramor->getSettings("date_format"), strtotime($row["created_date"]->format('Y-m-d'))) . "</td>";
                                                         } else {
                                                            echo "<td>N/A</td>";
                                                        }

                                                        echo "<td><a style='border-radius:25px !important;border:0;background:#777985' href='javascript:void(0)' class='view_invoice btn btn-success btn-sm' data-url='" . $this->request->base . "/PheramorAjax/viewInvoice/{$row['id']}'> View Invoice</a></td>
                                                        </tr>";
                                                        $l++;
                                                    }
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> </div>
                                            <div class="col-md-6">
                                                <div class="well">

                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Amount: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$tdue, 2); ?> </div>
                                                    </div>

                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Discount: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$tdiscount, 2); ?> </div>
                                                    </div>
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Paid: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$tpad, 2); ?> </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        <!-- End Subscription History -->
                        
                        <!-- Manage Product History-->
                        
                        <div class="col-md-12 col-sm-12">
                                <div class="portlet green-meadow box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Product Management </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    
                                 
                                  
                                   
                                 
                                    
                                    
                                    <div class="portlet-body" style="display: none;">
                                        
                                         <div class="portlet-titl col-md-12 col-sm-12">

                                        <div class="top">
                                            <?php //if ($session["role_name"] != 'staff_member') { ?>
                                                <div class="btn-set pull-right" style="padding-bottom: 10px;">
                                                    <a href="<?php echo $this->Gym->createurl("PheramorProductPayment", "addProduct/" . $user_id); ?>" class="btn green-meadow"><i class="fa fa-bars"></i> Purchase Product</a>

                                                </div>
                                            <?php //} ?>
                                        </div>

                                    </div>
                                        <div class="table-responsive1">
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th> S.N. </th>
                                                    <th> Product Name </th>
                                                    <th> Payment Status </th>
                                                    <th> Product Price </th>
                                                    <th> Discount Code </th>
                                                    <th> Discount Amount </th>
                                                    <th> Paid Amount </th>
                                                    <th> Payment Method </th>
                                                    <th> Payment Date </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($product)) {
                                                  //  echo "<pre>"; print_r($product); die;
                                                    $total_product_paid_amt = 0;
                                                    $total_product_discount = 0;
                                                    $total_product_amount = 0;
                                                    $ll=1;
                                                    foreach ($product as $row) {
                                                      // $url = (isset($row['gym_product']['image']) && $row['gym_product']['image'] != "") ? $row['gym_product']['image'] : $this->request->webroot . "upload/no_image_placeholder.png"; 

                                                        if ($row['payment_status'] == 1) {
                                                            $pay_status = "<span class='label label-success'> Paid</span>";
                                                        } else if ($row['payment_status'] == 0) {
                                                            $pay_status = "<span class='label label-danger'> Failed</span>";
                                                        } 
                                                         if(empty($row["discount_code"])){ $row["discount_code"]='--';}
                                                         if($row["paid_by"]=='Cash'){
                                                            $type_color="#f8cace";
                                                            $type_text="Cash";
                                                         }else{
                                                              $type_color="#659be0";
                                                              $type_text="Online";
                                                         }

                                                        $total_product_paid_amt = $total_product_paid_amt + $row["paid_amount"];
                                                        $total_product_discount = $total_product_discount + $row["discount_amount"];
                                                        $total_product_amount = $total_product_amount + $row["product_amount"];
                                                       
                                                        echo "<tr> <td>{$ll}</td>
                                                                                <td>{$row["pheramor_subscription"]["subscription_title"]}</td>
                                                                                 <td>" . $pay_status . "</span></td>
                                                                                 <td>" . $this->Pheramor->get_currency_symbol() . " {$row["product_amount"]}</td>
                                                                                 <td> {$row["discount_code"]}</td>
                                                                                <td>" . $this->Pheramor->get_currency_symbol() . " {$row["discount_amount"]}</td>
                                                                                <td>". $this->Pheramor->get_currency_symbol() ." {$row["paid_amount"]}</td>
                                                                                <td><span style='border-radius:25px !important;border:0;background:{$type_color};' class=' btn-success btn-sm'>{$type_text}</span></td>";
                                                                               if (!empty($row["created_date"])) {
                                                                                   echo "<td>" . date($this->Pheramor->getSettings("date_format"), strtotime($row["created_date"]->format('Y-m-d'))) . "</td>";
                                                                                 } else {
                                                                                   echo "<td>N/A</td>";
                                                                                 }
                                                                                    echo "<td><div class='btn-group'>
                                                                                    <button style='border-radius:25px !important;border:0;background:#1BBC9B;' class='btn btn-xs green dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                                                        <i class='fa fa-angle-down'></i>
                                                                                    </button>
                                                                                    <ul class='dropdown-menu pull-right' role='menu'>
                                                                                        <li>
                                                                                            <a href='javascript:void(0)' class='view_invoice' data-url='" . $this->request->base . "/PheramorAjax/viewProductInvoice/{$row['id']}'>
                                                                                                <i class='icon-eye'></i> View Invoice </a>
                                                                                        </li>
                                                                                        <li class='divider'> </li>
                                                                                        <li>
                                                                                            <a href='{$this->request->base}/PheramorProductPayment/editProduct/{$row['id']}/{$row['user_id']}'>
                                                                                            <i class='icon-pencil'></i> Edit Product

                                                                                            </a>
                                                                                        </li></ul></div></td>";
                                                                                
                                                                        echo "</tr>";
                                                    $ll++;
                                                    }
                                                }else{
                                                   echo "<tr align='center'><td colspan='9'>There is no record</td></tr> ";
                                                }
                                                ?>

                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> </div>
                                            <div class="col-md-6">
                                                <div class="well">

                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Amount: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$total_product_amount, 2); ?> </div>
                                                    </div>
                                                        <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Discount: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$total_product_discount, 2); ?> </div>
                                                    </div>
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Paid: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$total_product_paid_amt, 2); ?> </div>
                                                    </div>
                                                   

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <!-- Start Tracking HTML Start Here --> 
                                         <div id='ordertrackdiv'>
                                        <div class="mt-element-step">
                                           
                                           <div class="row step-line">
                                               <?php 
                                               
                                               $myorder=$this->Pheramor->orderTrackingStatus($user_id);
                                              // print_r($myorder); 
                                               $orderStatusID='';
                                               if(empty($myorder)){
                                                    $orderStatus=0;
                                               }else{
                                                    $orderStatus=$myorder['order_status'];
                                                    $orderStatusID=$myorder['id'];
                                               }
                                              // $orderStatus=$this->Pheramor->orderTrackingStatus($user_id);
                                               $orderHead=array('1'=>"Shipping and Registration",'2'=>'Return after Registration','3'=>'Under Sequence','4'=>'Ready');
                                               $orderDesc=array('1'=>"Your Pheramor Kit is on its way",'2'=>'Your perfect date is one DNA test away!','3'=>'Your results are being analyzed!','4'=>'Good job!');
                                               for ($i=1;$i<=4;$i++)
                                                {  
                                                   
                                                    if($i==1){$cssstyle='first';}elseif($i==4){$cssstyle='last';}else{$cssstyle='';}
                                                    if($orderStatus==$i){$activestatus='active';}elseif($i< $orderStatus){$activestatus='done';}else{$activestatus='';}
                                                 ?>
                                               <div class="col-md-3 mt-step-col <?php echo $cssstyle."  ".$activestatus;?>">
                                                   <div class="mt-step-number bg-white chorderstatus" style="cursor:pointer;"  data-id='<?Php echo $orderStatusID;?>' data-step='<?Php echo $i;?>'><?Php echo $i;?></div>
                                                   <div class="mt-step-title uppercase font-grey-cascade"><?php echo $orderHead[$i];?></div>
                                                   <div class="mt-step-content font-grey-cascade"><?php echo $orderDesc[$i];?></div>
                                               </div>
                                               <?php } ?>
                                           </div>
                                       </div>
                                    </div>
                                            <!-- End Tracking HTML end here -->
                                    </div>
                                </div>
                            </div>
                         <!-- End Here -->
                    
                         <div class="col-md-12 col-sm-12">
                                <div class="portlet red box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Referral History </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="display: none;">
                                        <div class="portlet-titl col-md-12 col-sm-12">


                                    </div>
                                        <div class="table-responsive1">
                                            <table class="table table-hover table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th> Image </th>
                                                    <th> Name </th>
                                                    <th> Email </th>
                                                    <th> Date </th>
                                                     <th>Status </th>
                                                     <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($my_referrals)) {
                                                     $gain_credt=0;
                                                        $used_credt=0;
                                                        $remain_credt=0;
                                                    foreach ($my_referrals as $my_referral) {
                                                       
                                                        $profileimage = $my_referral['image'];
                                                       
                                                        if (empty($profileimage)) {
                                                            $profileimage = $this->request->base . '/upload/profile-placeholder.png';
                                                        } else {
                                                            $profileimage = $profileimage;
                                                        }

                                                        if ($my_referral['is_credit']==1) {
                                                            $status = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash ribbon-color-warning uppercase">Credit</div>
                                                                             </div>';
                                                             $amount = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash-hor ribbon-color-success uppercase"> $3.00 </div>
                                                                             </div>';
                                                             $gain_credt=$gain_credt+3;
                                                        } else if ($my_referral['is_credit']==0) {
                                                            $status = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash ribbon-color-primary uppercase">Waiting</div>
                                                                             </div>';
                                                            $amount = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash-hor ribbon-color-success uppercase"> -- </div>
                                                                             </div>';
                                                        }else{
                                                           $status = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash ribbon-color-danger uppercase">Debit</div>
                                                                             </div>';
                                                            $amount = '<div class="mt-element-ribbon bg-grey-steel">
                                                                            <div class="ribbon ribbon-round ribbon-border-dash-hor ribbon-color-default uppercase" style="text-decoration: line-through;"> $3.00  </div>
                                                                             </div>'; 
                                                            $gain_credt=$gain_credt+3;
                                                            $used_credt=$used_credt+3;
                                                            
                                                        }
                                                        echo "<tr> <td><img class='img-responsive membership-img img-circle' src='{$profileimage}' alt='' style='width:100px;height;100px'></td>
                                                                                    <td>{$my_referral["name"]}</td>
                                                                                     <td>" . $my_referral["email"] . "</span></td>
                                                                                    <td>" . $my_referral["created_at"] . "</td>
                                                                                    <td>" . $status . "</td>
                                                                                    <td>" . $amount . "</td>";
                                                    }
                                                } else {
                                                    echo "<tr align='center'><td colspan='6'>There is no record</td></tr> ";
                                                }
                                                ?>

                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> </div>
                                            <div class="col-md-6">
                                                <div class="well">

                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Gain Credits: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$gain_credt, 2); ?> </div>
                                                    </div>
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total Used Credits: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format(@$used_credt, 2); ?> </div>
                                                    </div>
                                                    <div class="row static-info align-reverse" style="border-top:1px dotted #030b13;">
                                                        <div class="col-md-8 name"> Total Avaliable Credits: </div>
                                                        <div class="col-md-3 value"> $ <?php echo number_format((@$gain_credt-$used_credt), 2); ?> </div>
                                                    </div>

                                                   

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                         
                         
                         
                         
                   </div>

            </div>
        </div>
    </div>
</div>
</div>
<script>
$("input[name='set_default_card']").on('change', function () {
        //alert($(this).attr('data-id'));
        //return;
        var id = $(this).attr('data-id');
        var mid = <?php echo $user_id;?>;
        var ajaxurl = "<?php echo $this->request->base . '/PheramorAjax/setDefaultCard'; ?>"; ;
        $.ajax({
		url:ajaxurl,
		data : {id:id,mid:mid},
		type : "POST",
		success : function(result){
                     HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your default card has been updated successfully.</span>'; 
                         $("#dcstatus").html(HTMLMSG); // show response from the php script.
                         $("#dcstatus").show().delay(5000).fadeOut();
                    return false;
		}
                
	});
    });
   $('input[name="display_generic"]').on('switchChange.bootstrapSwitch', function(event, state) {
  // console.log(event);
    if ($(this).prop('checked')) {
      var id = $(this).val();
      var user_id = $(this).attr('data-id');
      if(id!='' && user_id!=''){
         var ajaxurl =  "<?php echo $this->request->base . '/PheramorAjax/showPasswordField'; ?>";	
          $.ajax({
               url:ajaxurl,
               data : {id:id,user_id:user_id},
               type : "POST",
               success : function(result){			
                       $('.gym-modal').modal('show');
                       $( ".gym-modal" ).removeClass( "modal-lg" );
                       $(".gym-modal .modal-content").html(result);
               },
               error : function(e)
               {
                       alert("There was an error processing form.Please try again later.");
                       // alert(e.responseText);
                       console.log(e.responseText);
               }
       });
      } 
    }else{
       var id=0;
       $("#dummy_gen_data").show();
      $("#gen-btn-box").hide();
      $("#main_gen_data").html('');
    //  $("#main_gen_data");
    }
     
    });
    
    $('.gym-modal').modal({
    backdrop: 'static',
    keyboard: false
    });
    
    $("body").on("click",".close,.closed",function(){
    //alert();
      $('input[name="display_generic"]').click();
    });
    
    
  $("body").on("click",".add-generic-password",function(){
	var password = $(".generic_pass_val").val();
         var mid = <?php echo $user_id;?>;
	var ajaxurl = $(this).attr("data-url");
	if(password != "")
	{
		var curr_data = { password : password, user_id:mid};
		$.ajax({
			url : ajaxurl,
			type : "POST",
			data : curr_data,
			success : function(response){					
					if(response)
					{
                                               $("#generic_response").html('<span style="color:green;">Your password has been matched!</span>');
                                                $('.gym-modal').modal('hide');
						
						$("#dummy_gen_data").hide();
						$("#gen-btn-box").show();
						$("#main_gen_data").html(response);
                                                $("#generic_response").html('<span style="color:green;">Your password has been matched!</span>');
					}else{
                                            $("#generic_response").html('<span style="color:red;">Your password is not valid!</span>');
                                           
                                        }
			}
		});		
	}else{
		alert("Please Enter Generic Data Password.");
	}
	
});
</script>

<script>
$(document).ready(function(){
      $('#profile_img_data').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = "<?php echo $this->request->base . '/PheramorAjax/updateProfileGallery'; ?>"; // the script where you handle the form input.
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $("#gallery_div").html(data);
                $("[name='is_profile']").bootstrapSwitch();
                
                HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your profile image has been saved successfully.</span>'; 
                         $("#profile_img_status").html(HTMLMSG); // show response from the php script.
                         $("#profile_img_status").show().delay(5000).fadeOut();
                        // location.reload();
                    return false;
            },
            error: function(data){
                HTMLMSG='<span class="alert alert-error"><strong>Error!</strong> Your profile image not saved.</span>'; 
                         $("#profile_img_status").html(HTMLMSG); // show response from the php script.
                         $("#profile_img_status").show().delay(5000).fadeOut();
                    return false;
            }
        });
    }));

//// Delete gallery Image data
 $("body").on("click",".del-gallery",function(){		
    $(this).parents("tr").remove();
    var id = $(this).attr('data-id');
    var mid = <?php echo $user_id; ?>;
    var ajaxurl = "<?php echo $this->request->base . '/PheramorAjax/deleteProfileGallery'; ?>";
    $.ajax({
            url:ajaxurl,
            data : {id:id,user_id:mid},
            type : "POST",
            success : function(result){
                $("#gallery_div").html(result);
                $("[name='is_profile']").bootstrapSwitch();
               //  $("#gallertyID_"+id).show();
                 //$("#divid").load(" #divid");
                //  $("#option_"+id).hide();
                // $("#gallertyImg_"+id).attr('src','<?php echo $this->request->webroot."upload/no-image.png";?>');
                 HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your profile image has been deleted successfully.</span>'; 
                         $("#profile_img_status").html(HTMLMSG); // show response from the php script.
                         $("#profile_img_status").show().delay(5000).fadeOut();
                        // location.reload();
                    return false;
            }

    });
 });	

//// Update Interest

$(document).ready(function(){
      $('#interest_data').on('submit',(function(e) {
        e.preventDefault();
       // var formData = new FormData(this);
        var url = "<?php echo $this->request->base . '/PheramorAjax/updateUserInterest'; ?>"; // the script where you handle the form input.
        $.ajax({
            type:'POST',
            url: url,
            data: $('#interest_data').serialize(),
             success:function(data){
                HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your interest has been saved successfully.</span>'; 
                         $("#interest_status").html(HTMLMSG); // show response from the php script.
                         $("#interest_status").show().delay(5000).fadeOut();
                    return false;
            },
            error: function(data){
                HTMLMSG='<span class="alert alert-error"><strong>Error!</strong> Your interest has not saved.</span>'; 
                         $("#interest_status").html(HTMLMSG); // show response from the php script.
                         $("#interest_status").show().delay(5000).fadeOut();
                    return false;
            }
        });
    }));

});

});


</script>
<script>
    $(document).ready(function(){
      
      //  $('input[name="is_profile"]').on('switchChange.bootstrapSwitch', function(event, state) {
       $(document).on('switchChange.bootstrapSwitch', 'input[name="is_profile"]', function (event, state) {
        var id = $(this).attr('data-id');
        var mid = <?php echo $user_id;?>;
        var ajaxurl = "<?php echo $this->request->base . '/PheramorAjax/setProfileImage'; ?>"; ;
        $.ajax({
		url:ajaxurl,
		data : {id:id,mid:mid},
		type : "POST",
		success : function(result){
                     HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your Profile picture  has been updated successfully.</span>'; 
                         $("#profile_img_status").html(HTMLMSG); // show response from the php script.
                         $("#profile_img_status").show().delay(5000).fadeOut();
                    return false;
		}
                
	});
});
 });
</script>
<style>
    .select2-search__field { width: 100% !important; }
</style>
<script type="text/javascript">
    $(document).ready(function(){
      $('#musicsss').select2({
        placeholder: 'Select Music Lists',
        width: '100%',
        ajax: {
          url: '<?php echo $this->request->base . '/PheramorAjax/setMusicSelectData'; ?>',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
      
      ///////////////
      
      
       $("body").on("change",".gen_membership_ids",function(){
	var mid = $(this).val();
        $("#total_amount_div").hide();
	$("#total_amount").html('');
        var ajaxurl = $(this).attr("data-url");	
	var curr_data = {mid:mid};
	$.ajax({
		url:ajaxurl,
		data : curr_data,
		type : "POST",
		success : function(result){
                       $("#total_amount_div").show();
			$("#total_amount").html(result);
                        
		}
	});	
          });


   ///////////////
     $("#add_time").click(function(){	
	var time_list = [];
	
	$(".time_list").css("display","block");
	
	var discount_amt = $(".discount_amt").val();	
	var membership_ids = $(".membership_ids").val();
      if(discount_amt == "" || membership_ids == "")
	{
		alert("Please select subscription and enter discount amount");
		return false;
	}
        var membership_label = jQuery('#membership_ids option:selected').text()
	
	time_list[0] = discount_amt;
	time_list[1] = membership_ids;
	var val = JSON.stringify(time_list);	
	
	/* $(".time_list").append("<input type='text' name='time_list[]' class='ssd' value='"+val+"'>"); */
	
	$(".time_table").append('<tr><td>$ '+discount_amt+'</td><td>'+membership_label+'<input type="hidden" name="discount_list[]" value='+val+'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-danger class_sch_del_row"><i class="fa fa-times-circle"></i></span></td></tr>');
	
      });
      
     
      
      $("body").on("click",".class_sch_del_row",function(){		
		$(this).parents("tr").remove();
                var id = $(this).attr('data-id');
                var mid = <?php echo $user_id;?>;
                var ajaxurl = "<?php echo $this->request->base . '/PheramorAjax/deleteDiscount'; ?>";
                $.ajax({
                        url:ajaxurl,
                        data : {id:id,mid:mid},
                        type : "POST",
                        success : function(result){
                               //$("#total_amount_div").show();
                            //$("#total_amount").html(result);
                           // return false;
                        }

                });
                
	});
        
        
        ///
        
         $("#discount_form").submit(function (e) {

            var discount_amt = $("#discount_amt").val();
            var membership_id = $("#membership_ids").val();

            if (discount_amt != '' && membership_id != '')
            {

                var url = "<?php echo $this->request->base . '/PheramorAjax/updateDiscountAmount'; ?>"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#discount_form").serialize(), // serializes the form's elements.
                    dataType: "JSON",
                    beforeSend: function () {
                    },
                    success: function (data)
                    {
                         if(data.status=='fail'){
                               HTMLMSG='<div class="alert alert-danger"><strong>Error!</strong> Discount amount will less than membership amount.</div>';
                          }else{
                              HTMLMSG='<div class="alert alert-success"><strong>Success!</strong> Discount amount has been updated successfully.</div>'; 
                          }
                         $("#discount_status").html(HTMLMSG); // show response from the php script.
                         $("#discount_status").show().delay(5000).fadeOut();
                    },
                    error: function (jqXHR, exception) {
                        return false;
                    }
                });

               
            }
             e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        
        /// Update user Genetic data
        
        $('#generic_data').on('submit',(function(e) {
          e.preventDefault();
          var isFormValid = true;
          $(".required_input").each(function(){
                if ($.trim($(this).val()).length == 0){
                  isFormValid = false;
                }
                
            });
        
       if(isFormValid){
        var formData = new FormData(this);
        var url = "<?php echo $this->request->base . '/PheramorAjax/updateUserGeneticData'; ?>"; // the script where you handle the form input.
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
               // $(".page-wrapper").load(" .page-wrapper");
                
                HTMLMSG='<span class="alert alert-success"><strong>Success!</strong> Your Genetic data has been saved successfully.</span>'; 
                         $("#generic_data_status").html(HTMLMSG); // show response from the php script.
                         $("#generic_data_status").show().delay(4000).fadeOut();
                        setTimeout(function(){ 
                         $('input[name="display_generic"]').click();
                          $('.user_kit_data').val(data);
                         }, 5000);
                       //  $("#generic_data_status").show().delay(5000).fadeOut();
                        // $('input[name="display_generic"]').click();
                        // location.reload();
                    return false;
            },
            error: function(data){
                HTMLMSG='<span class="alert alert-error"><strong>Error!</strong>Sorry ! Your Genetic data has not saved.</span>'; 
                         $("#generic_data_status").html(HTMLMSG); // show response from the php script.
                         $("#generic_data_status").show().delay(5000).fadeOut();
                    return false;
            }
        });
        }
          }));
        
        
        /// Update Order Status
        
        $(document).on('click', '.chorderstatus', function () {
        
          var id = $(this).attr('data-id');
          var step = $(this).attr('data-step');
          var user_id ='<?Php echo $user_id;?>';
           if(id==''){return false;}
          //if(step==1){return false;}
          var ajaxurl = "<?php echo $this->request->base . '/PheramorAjax/updateOrderStatus'; ?>";
                $.ajax({
                        url:ajaxurl,
                        data : {id:id,user_id:user_id,step:step},
                        type : "POST",
                        success : function(result){
                              // $("#ordertrackdiv").show();
                            $("#ordertrackdiv").html(result);
                           // return false;
                        }

                });
          
          });
         
         /// Update Shipping address code here
         
          $("#shipping_address_frm").submit(function (e) {
              
             var url = "<?php echo $this->request->base . '/PheramorAjax/updateUserShippingAddress'; ?>"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#shipping_address_frm").serialize(), // serializes the form's elements.
                    dataType: "JSON",
                    beforeSend: function () {
                    },
                    success: function (data)
                    {
                        HTMLMSG='<div class="alert alert-success"><strong>Success!</strong> Shipping address has been updated successfully.</div>'; 
                          
                         $("#shipping_save_status").html(HTMLMSG); // show response from the php script.
                         $("#shipping_save_status").show().delay(5000).fadeOut();
                    },
                    error: function (jqXHR, exception) {
                        return false;
                    }
                });

               
            
             e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        
        
        
          
      });
        
</script>