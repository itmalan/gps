
<div id="content-wrapper"> 
            
            <div id="main-content">

<?php
$last = $this->uri->total_segments();
                $subject_id = $this->uri->segment($last);

?>

        <h3>Internal Marks </h3>
        <div style="float:right">
        Subject: <strong><?php echo $subjects; ?></strong> <br />
        Course Code: <strong><?php echo $course_code; ?></strong>
        <input type="hidden" value="" id="subject_id" name="subject_id"/> 
        </div>
        <br />
        <button class="btn btn-success" onclick="import_mark()"><i class="glyphicon glyphicon-save-file"></i>Import Marks</button>
        
        <ul class="nav navbar-nav pull-right">
                                <li class="active"><a href="<?php echo base_url().'mark/export_excel/'.$subject_id?>"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Export excel</a></li>
        </ul>  
        
        <br />
        <br />
   
        
        <?php
$template = array(
        'table_open'            => '<table id="internalMarksTable" class="table table-striped table-bordered ui table" cellspacing="0" width="100%">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

$this->table->set_template($template);


$this->table->set_heading(array('ID','Sl. No','Register Number','Name','Internal Mark1 </br>/15','Internal Mark2 </br>/15','Other Mark </br>/10','Total</br>/40'));
echo $this->table->generate($students);

//echo 'result: '.$finalized;

//echo print_r($subjects);
//echo print_r($students);
 
?>
        <button class="btn btn-success" onclick="window.location.reload();"><i class="glyphicon glyphicon glyphicon-saved"></i>Save Changes</button>
    
            </div>
 <?php  
//echo $this->session->mms['username']; 
  
 ?>

        <br />
        <br />
   
        
  
<script src="<?php echo base_url('assets/edittable/jquery.edittable.min.js')?>"></script>

<script>
    
                
$(document).ready(function() {
    /*
var url=$(location).attr('href');
        var array = url.split('/');
        var course_id = array[array.length-1];
        
        
        
        var mytable = $('#internalMarksTable').editTable({
    data: data_marks,           // Fill the table with a js array (this is overridden by the textarea content if not empty)
    tableClass: 'inputtable',   // Table class, for styling
    jsonData: false,        // Fill the table with json data (this will override data property)
    headerCols: false,      // Fix columns number and names (array of column names)
    maxRows: 999,           // Max number of rows which can be added
    first_row: true,        // First row should be highlighted?
    row_template: false,    // An array of column types set in field_templates
    field_templates: false, // An array of custom field type objects

    // Validate fields
    validate_field: function (col_id, value, col_type, $element) {
        return true;
    }
});
        
   */     
        
   
        
$('#internalMarksTable').Tabledit({
    "url": "<?php echo site_url('mark/update_internal_mark_fn/')?>",
            
    editButton: false,
    deleteButton:false,
    hideIdentifier: true,
    columns: {
        identifier: [0, 'identifier'],
        editable: [ [4, 'internal1'],[5,'internal2'],[6,'other']]
        },    
});
    
});

function import_mark()
{
    save_method = 'import_marks';
    $('#form_addStudent')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_import_mark').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add marks'); // Set Title to Bootstrap modal title
}


  </script>