<?php 
$session = $this->request->session()->read("User");

$this->Html->addCrumb('Music List');

?>
<style>
    .select2-container--bootstrap .select2-selection{
        border-bottom: 1px solid #c2cad8;
        border-left: none;
        border-right: none;
        border-top:none;
        box-shadow:none;
    }    
 </style>
<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> <?php echo __("Add Music"); ?>
                </span>
                 
            </div>
            
        </div>
        <div class="portlet-body">
          <?php
            echo $this->Form->create($category, ["type" => "file", "class" => "validateForm form-horizontal", "novalidate" => "novalidate"]);
            ?>
            <input type="hidden" id="tbl_name" value="PheramorMusic">
            <input type="hidden" id="edit_id" value="<?php echo @$cat_data['id'];?>">
             <input type="hidden" name="parent" id="parent" value="0">
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <?Php /* ?>
                    <label class="col-md-2 control-label" for="form_control_1">Music Category
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <?php
                                echo @$this->Form->select("parent",$parent,["default"=>(explode(',',@$cat_data['parent'])),"multiple"=>"multiple","class"=>"select2-multiple validate[required]","id"=>"parent"]);
                                ?>
                        <!--<select class="bs-select form-control validate[required]" name="parent">
                           <option value="">Select Category</option>
                            <option value="0" <?php  if(($edit) && @$cat_data['parent']==0){ echo "selected";} ?> >Parent</option>
                            <?php if(!empty($parent)){
                                foreach($parent as $key=>$p){ ?>
                                  <option value="<?php echo $key?>" <?php  if($key==@$cat_data['parent']){ echo "selected";} ?>> <?php echo $p?></option>
                             <?php  }}
                            ?>
                            
                        </select>-->
                        <!--<input type="text" class="form-control " value="<?php echo ($edit) ? $cat_data['category_name'] : ""; ?>" placeholder="Enter Category Name"  name="category_name">-->
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Select Music Category...</span>
                    </div><?php */?>
                    <label class="col-md-2 control-label" for="form_control_1">Music Title
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="title" class="form-control validate[required,ajax[isMasterTitleUnique]]" value="<?php echo ($edit) ? $cat_data['title'] : ""; ?>" placeholder="Enter Music Name"  name="title">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Enter Music Name...</span>
                    </div>
<!--                </div>
                <div class="form-group form-md-line-input">-->
                    <label class="col-md-2 control-label" for="form_control_1">Movies Status
                        <span class="required" aria-required="true">*</span>
                    </label>
                    <div class="col-md-4">
                        <div class="md-radio-inline">
                            <div class="md-radio">
                                <input type="radio" id="checkbox2_101"<?php echo (($edit && $cat_data['activated'] == "1") ? "checked" : "") . ' ' . ((!$edit) ? "checked" : "") ?> value="1" name="activated" class="md-radiobtn">
                                <label for="checkbox2_101">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Active 
                                </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="checkbox2_111" <?php echo (($edit && $cat_data['activated'] == "0") ? "checked" : ""); ?> value="0" name="activated" class="md-radiobtn">
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
                    <a href="<?php echo $this->Gym->createurl("PheramorMusic","index"); ?>" class="btn default">Reset</a> 
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
                <span class="caption-subject bold uppercase"> <?php echo __("Music List"); ?>
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
                            <a href="<?php echo $this->Gym->createurl("PheramorSubscriptionCategory","addCategory"); ?>" class="btn sbold green"><?php echo __("Add Category"); ?> <i class="fa fa-plus"></i></a>
                           </div>
                    </div>
                   
                </div>
                
            </div>-->
            <table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="mydataTable table table-striped table-bordered table-hover table-checkable order-column" width="100%">
					<thead>
						<tr>
                                                        <th>S.N.</th>
							<th>Name</th>
							<th>Category</th>
							<th>Status</th>
                                                        <th>Action</th>
						</tr>
					</thead>
			</table>
            <!--<table class="mydataTable table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    

                    <tr>
                        <th><?php echo __("S.N."); ?></th>
                        <th><?php echo __("Name"); ?></th>
                        <th><?php echo __("Category"); ?></th>
                        <th><?php echo __("Status"); ?></th>
                        <th><?php echo __("Action"); ?></th>
                    </tr>
                   
                </thead>
                <tbody>
                   <?php
                     //echo "<pre>"; print_r($membership_data); die;
                    $k = 1;
                    foreach ($category_data as $category) {
                       if ($category->activated== 1) {
                              $status = "<span class='label label-success'>Acive</span>";
                          } else {
                             $status = "<span class='label label-warning'>Inactive</span>";
                          } 
                        
                        echo "<tr class='gradeX odd'><td>{$k}</td><td>{$category->title}</td><td><strong>{$this->Pheramor->musicCategory($category->parent)}</strong></td>";
                         echo "<td>" . $status . "</td>";
                         echo "<td>";
                            echo "<div class='btn-group'>
                                                <button class='btn btn-xs green dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                    <i class='fa fa-angle-down'></i>
                                                </button>
                                                <ul class='dropdown-menu pull-right' role='menu'>
                                                    
                                                    <li>
                                                        <a href='{$this->Pheramor->createurl("PheramorMusic", "editMusic")}/{$category->id}'>
                                                            <i class='icon-pencil'></i> Edit Music </a>
                                                    </li>
                                                    <li>
                                                        <a href='{$this->Pheramor->createurl("PheramorMusic", "deleteMusic")}/{$category->id}' onclick=\"return confirm('Are you sure,you want to delete this record?');\">
                                                            <i class='icon-trash'></i> Delete Music </a>
                                                    </li>
                                                  
                                                    </ul>
                                                    </div>
                                                    </td>
						</tr>";
                        $k++;
                    }
                    ?>

                    


                </tbody>
            </table>-->
        </div>
    </div>

    
    
    	
    
</div>
 
<script type="text/javascript" language="javascript" >
$(document).ready(function() {
        var dataTable = $('#employee-grid').DataTable( {
                "processing": true,
                "serverSide": true,
               // "columnDefs": [
                   // { "orderable": false, targets: [0,4] }
                //  ],
                "ajax":{
                        url :"<?php echo $this->request->base . '/PheramorAjax/setMusicData'; ?>", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                                $(".employee-grid-error").html("");
                                $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="5">No data found in the server</th></tr></tbody>');
                                $("#employee-grid_processing").css("display","none");

                        }
                }
        } );
} );
                </script>

