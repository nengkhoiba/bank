// baseURL for all javascript 
var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
//   serializeObject
(function($){
  $.fn.serializeObject = function () {
    "use strict";

    var result = {};
    var extend = function (i, element) {
      var node = result[element.name];

  // If node with same name exists already, need to convert it to an array as it
  // is a multi-value field (i.e., checkboxes)

      if ('undefined' !== typeof node && node !== null) {
        if ($.isArray(node)) {
          node.push(element.value);
        } else {
          result[element.name] = [node, element.value];
        }
      } else {
        result[element.name] = element.value;
      }
    };

    $.each(this.serializeArray(), extend);
    return result;
  };
})(jQuery);

function removeMasterform(form_id){
	$(form_id).hide();
}

function checkAllCheckbox(t){  
    	if (t.is(':checked')) {
    			$(".checkbox").prop("checked", true);
    	    } else {
    	    	$(".checkbox").prop("checked", false);
    	    }		
}
function clearAllFormValue(id)
{ 
    $(''+id+'').find('input[type = file],input[type = text],input[type = number],input[type = password],textarea, input[type = date], input[type = radio],input[type = checkbox], select').each(function () {
        $(this).val('');
        $(this).prop( "checked", false );
    });
    
}


function resetAllFormValue(id)
{	
  
	swal({
  		title: "Are you sure?",
  		//text: "You will not be able to recover this imaginary file!",
  		//type: "warning",
  		showCancelButton: true,
  		confirmButtonText: "Yes, clear it!",
  		cancelButtonText: "No, cancel plx!",
  		closeOnConfirm: true,
  		closeOnCancel: true
  	}, function(isConfirm) {
  		if (isConfirm) {
  			$('' + id + '').find('input[type = file],input[type = hidden],input[type = text],input[type = number],input[type = password],textarea, input[type = date], input[type = radio],input[type = checkbox], select').each(function () {
                $(this).val('');
                $(this).prop( "checked", false );
                $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
                $("#imgThumb_upt").attr("src",base_url+"assets/img/NoImage.png");
            });
  		} else {
  			
  		}
  	});   
}

function deleteItem(tableName,loadFunctionName){
	var callFunc=new Function(loadFunctionName)
    // Checking all category data are deleted
 	if (!$( ".checkbox" ).length) {
 		SetWarningMessageBox('warning', 'No Item left  to Delete !!!'); 
 		return;
 	}
 	
 	var selected_value = []; // initialize empty array 
 	if ($('.checkbox:checked').length == 0 )
     {
 		SetWarningMessageBox('warning', 'Please select Item to Delete !!!');
 		return;
	    } else {
	    	$(".checkbox:checked").each(function(){
	              selected_value.push($(this).val());
	          });
	    }	
 	var url = window.location.origin+'/bank/index.php/data_controller/Remove';
 	var dataString = JSON.stringify(selected_value);
 swal({
   title: "Are you sure?",
   //text: "You will not be able to recover this imaginary file!",
   //type: "warning",
   showCancelButton: true,
   confirmButtonText: "Yes, Delete it!",
   cancelButtonText: "No, cancel plx!",
   closeOnConfirm: true,
   closeOnCancel: true
   }, function(isConfirm) {
   if (isConfirm) {
   StartInsideLoading();  
     	$.ajax({
   		  type: "post",
   		  url: url,
   		  cache: false,    
   		  data: {dataArr:dataString,table:tableName},
   		  dataType: 'json',
   		  success: function(response){   
   		  try{  	
   			   if (response.success)
   	           { 
   				   SetSucessMessageBox('Success', response.msg);
   				   callFunc();
   	           } else
   	           { 
   	               SetWarningMessageBox('warning', response.msg);
   	               //StopInsideLoading();
   	           }
   		  StopInsideLoading();
   		  }catch(e) {  
   			  SetWarningMessageBox('warning', e);
   			  StopInsideLoading();
   		  }  
   		  },
   		  error: function(){      
   			  SetWarningMessageBox('warning', 'Error while request..');
   			  StopInsideLoading();
   		  }
   		 });
   }
   }); 
 }

function SetWarningMessageBox(type,msg){
      	$.notify({
      		title: "<strong>"+type+"</strong> : ",
      		message: msg,
      		icon: 'fa fa-warning' 
      	},{
      		type: "danger"
      	});
}

function SetSucessMessageBox(type,msg){
  	$.notify({
  		title: "<strong>"+type+"</strong> : ",
  		message: msg,
  		icon: 'fa fa-check' 
  	},{
  		type: "success"
  	});
}

 
function CloseformBox(t){ 

    $('#'+t+'').empty(); 
}

// **************** File Upload for Image **************** //
function imagetoBase64(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 2000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 2 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 

function imagetoBase64_upt(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file_upt").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 2000000)
  {
  document.getElementById('file_upt').value=null;
  document.getElementById('imgThumb_upt').src=null;
  var msg=' Please select another one. (Maximum file size is 2 MB)'
   SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file_upt').value=null;
  SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload_upt').val(reader.result);
  $('#imgThumb_upt').attr("src",reader.result);
  $('#fileUploadName_upt').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 



function loadDropDown(selectedValue,tableName,appendID)
{ 
  var url = window.location.origin+'/bank/index.php/data_controller/loadDropDown'; 
  StartInsideLoading();
  $.ajax({
    type: "post",
    url: url,
    cache: false,
    data: {tblName:tableName,selectedVal:selectedValue},
    dataType: 'json', 
    success: function(response){ 
    try{  
      if (response.success)
         { 
        $(appendID).html(response.html);             
         } else
         { 
             SetWarningMessageBox('warning', response.msg);
            
         }
     StopInsideLoading();
     
     }catch(e) {  
        SetWarningMessageBox('warning', e);
        StopInsideLoading();
      } 
    },
    error: function(){      
      SetWarningMessageBox('warning', 'Error while request..');
      StopInsideLoading();
    }
   });
} 

