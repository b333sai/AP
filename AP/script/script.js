$(document).ready(function () {
for(i=1;i<6;i++)//This statements are for blinking the error message
{
$(".error").fadeOut("fast");
$(".error").fadeIn("fast");
}
$(".search_results tr:even").css("background-color","#929292");
$(".search_results tr:odd").css("background-color","#7a7a7a");

$(".college_view td").css("padding-left","10px");


$(".search_results tr").mouseover(function(){
 $(this).css("background-color","orange");
 });
$(".search_results tr:even").mouseout(function(){
 $(this).css("background-color","#929292");
 });
 
$(".search_results tr:odd").mouseout(function(){
 $(this).css("background-color","#7a7a7a");
 });

});

//THIS IS TO HIGHLIGHT THE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////////
function clg_select()
{
$(".search_results tr"+this.value).css("background-color","black");
}
function high(val)
{
if(val==4)
  {
   $("#last").css("background-color"," #ffab00");
  }
 else if(val==1)
  {
   $("#second").css("background-color"," #ffab00");
  }
 else if(val==2)
  {
   $("#third").css("background-color","#ffab00");
  }
 else if(val==3)
  {
   $("#fourth").css("background-color","#ffab00");
  }
 else 
  {
   $("#first").css("background-color"," #ffab00");
  }
}
//THIS IS TO HIGHLIGHT THE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////////



//THIS IS TO HIGHLIGHT THE SIDE MENU ITEM WHEN THE USER CLICKS ON THEM//////////////////////////////////////////////////////
function clg_select()
{
$(".search_results tr"+this.value).css("background-color","black");
}
function high_side(val)
{
 if(val==1)
  {
   $("#t_med").css("background-color"," #419eb2");
   $("#t_med").css("color","white");
   $("#t_med").css("border-left","5px solid #f0611f");
  }
 else if(val==2)
  {
   $("#t_man").css("background-color","#419eb2");
   $("#t_man").css("color","white");
   $("#t_man").css("border-left","5px solid #f0611f");
  }
 else if(val==3)
  {
   $("#most_viewed").css("background-color","#419eb2");
   $("#most_viewed").css("color","white");
   $("#most_viewed").css("border-left","5px solid #f0611f");
  }
 else
  {
   $("#t_eng").css("background-color","#419eb2");
   $("#t_eng").css("color","white");
   $("#t_eng").css("border-left","5px solid #f0611f");
  }
}
//THIS IS TO HIGHLIGHT THE SIDE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////

//Function to close the current tab in the browser/////////////////
function win_close()
{
 window.open('','_parent','');
 if(confirm("Are you sure?"))
  window.close('_parent');
  
  return false;
}
//Function to close the current tab in the browser/////////////////


//////////////////////////////////////////////////////////
function change_loc(value)
{
 if(value==1)
  window.location="engineering.php";
 else if(value==2)
  window.location="medical.php";
 else
  window.location="management.php";
  
}
//////////////////////////////////////////////////////////////


//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM//////////////////////////////////////////////
function valid()
{
 var name=document.register.coll_name.value;
 var id=document.register.coll_id.value;
 
 var eng=document.register.eng.value;
 var mec=document.register.med.value;
 var man=document.register.man.value;
 
 var intake=document.register.students_intake.value;
 var city=document.register.city.value;
 var state=document.register.state.value;
 
 var pincode=document.register.pincode.value;
 
 var contact=document.register.contact.value;
 var contact2=document.register.contact2.value;

 var fax=document.register.fax.value;
 var fax2=document.register.fax2.value;
 

 var email=document.register.emailid.value;
 var website=document.register.website.value;
 
 var logo=document.register.fileupload.value;
 
 var year=document.register.yoo.value;
 
 var director=document.register.director.value;
 
 if(/^[a-zA-Z]*$/.test(name)==false)
  {
   alert("Invalid College Name: "+name);
   document.register.coll_name.value="";
   document.register.coll_name.focus();
   return false;
  }
 else if(/^[a-zA-Z0-9]*$/.test(id)==false)
  {
   alert("Invalid College Code: "+id);
   document.register.coll_id.value="";
   document.register.coll_id.focus();
   return false;   
  }
 else if(!document.register.eng.checked && !document.register.mec.checked && !document.register.man.checked)
  {
   alert("Please Select Stream!!!");
   document.register.eng.focus();
   return false;
  }
 else if(intake==-1)
  {
   alert("Please Choose an Intake range!!!");
   document.register.students_intake.focus();
   return false;
  }
 else if(/^[a-zA-Z]*$/.test(city)==false)
  {
   alert("Invalid City!!!");
   document.register.city.value="";
   document.register.city.focus();
   return false;
  }
 else if(state==-1)
  {
   alert("Invalid State!!!");
   document.register.state.focus();
   return false;
  }
 else if(/^[0-9]*$/.test(pincode)==false || pincode.length<6)
  {
   alert("Invalid Pincode: "+pincode);
   document.register.pincode.value="";
   document.register.pincode.focus();
   return false;
  }
 else if(/^[0-9]*$/.test(contact)==false || contact.length<2 || /^[0-9]*$/.test(contact2)==false || contact2.length<2)
  {
   alert("Invalid Contact Number: "+contact+contact2);
   document.register.contact.value="";
   document.register.contact2.value="";
   document.register.contact.focus();
   return false;
  }
 else if(/^[0-9]*$/.test(fax)==false || (fax.length>0 && fax.length<2) || /^[0-9]*$/.test(fax2)==false || (fax2.length>0 && fax2.length<10))
  {
   alert("Invalid Fax Number: "+fax+fax2);
   document.register.fax.value="";
   docuemnt.register.fax2.value="";
   document.register.fax.focus();
   return false;
  }
 else if(email.length==0 || email.lastIndexOf('.')<email.indexOf('@'))
  {
   alert("Invalid EmaiId: "+email);
   document.register.emailid.value="";
   document.register.emailid.focus();
   return false;
  }
 else if(website.substr(0,7)!="http://" )
  {
   alert("Invalid Website: "+website);
   document.register.website.value="";
   document.register.website.focus();
   return false;
  }
 else if(year==-1)
  {
   alert("Invalid Year!!!");
   document.register.state.focus();
   return false;
  }
 else if(/^[a-zA-Z]*$/.test(director)==false)
  {
   alert("Invalid Director Name: "+director);
   document.register.director.value="";
   document.register.director.focus();
   return false;
  }
 else
  return true;
}
//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM//////////////////////////////////////////////






