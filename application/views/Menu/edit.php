<?php $IsAjaxRequest = true; ?>
<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/header' );
	$IsAjaxRequest = false;
}
?>

<?php $modelname = "Menu"; ?>

<section class="content-header">
	<h1>
        <?php echo $modelname ?>
        <small><?php echo $modelname ?></small>
	</h1>
</section>

<?php $this->view ('common/editorpage'); //common refference like js or css ?>

<?php   
AjaxSubmit($modelname,$IsAjaxRequest);
?>
 
<form action="<?php echo base_url($modelname."/edithit")?>" method="post" id="<?php echo "frm$modelname" ?>" enctype="multipart/form-data">

	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title"><?php echo $modelname ?> </h3>
					</div>
				 
					<div role="form">  
						<div class="box-body">
						    <div class="form-group"> 
								 <?php echo form_hidden('Id',$Menu->Id); ?>
							</div>
							<div class="form-group">
                                <?php echo form_label('Menu Text', 'MenuText'); ?>
                                <?php echo form_input('MenuText',$Menu->MenuText); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Menu U R L', 'MenuURL'); ?>
                                <?php echo form_input('MenuURL',$Menu->MenuURL); ?>
                            </div>
							<div class="form-group">
                                 <?php echo form_label('Parent', 'ParentId'); ?> 
                                 <?php echo Ajaxdropdown('ParentId',$this->omodel->ddlMenu(),$Menu->ParentId); ?>
                            </div>
							<div class="form-group">
                                <?php echo form_label('Sort Order', 'SortOrder'); ?>
                                <?php echo form_input('SortOrder',$Menu->SortOrder); ?>
                            </div>

						</div>
						<div class="box-footer">
							<input type='submit' name='submit' class="btn btn-success" value='Submit' /> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</form>

<?php
if (! isset ( $_GET ["ajax"] )) {
	$this->view ( '_Layout/footer' );
}
?>
