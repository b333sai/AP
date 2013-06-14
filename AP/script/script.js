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

$(".search_results tr").click(function(){
 $(this).css("background-color","black");
 });
 

$(".search_results tr:even").mouseout(function(){
 $(this).css("background-color","#929292");
 });
 
$(".search_results tr:odd").mouseout(function(){
 $(this).css("background-color","#7a7a7a");
 });
 
$("#compare").mouseover(function(){
$(this).css("background-color","brown");
$(this).css("cursor","default");
$(this).css("border","2px solid orange");
});
$("#compare").mouseout(function(){
$(this).css("background-color","green");
$(this).css("border","2px solid grey");
});

$("#close").mouseover(function(){
$(this).css("background-color","brown");
$(this).css("cursor","default");
$(this).css("border","2px solid orange");
});
$("#close").mouseout(function(){
$(this).css("background-color","red");
$(this).css("border","2px solid grey");
});



$("#stream1").click(function() {
if(document.register.eng.checked)
{
$("#engg").show("slow");
}
else
{
$("#engg").hide("slow");
}
});

$("#stream2").click(function() {
if(document.register.mec.checked)
{
$("#medic").show("slow");
}
else
{
$("#medic").hide("slow");
}
});

$("#stream3").click(function() {
if(document.register.man.checked)
{
$("#manage").show("slow");
}
else
{
$("#manage").hide("slow");
}
});

var c1=0;
$("#con_plus").click(function () {
$(".con").toggle();
if(c1%2==0)
{
$("#con_img").attr("src","images/up.png");
}
else
{
$("#con_img").attr("src","images/down.png");
}
c1++;
});

var c2=0;
$("#cou_plus").click(function () {
$(".cou").toggle();
if(c2%2==0)
{
$("#cou_img").attr("src","images/up.png");
}
else
{
$("#cou_img").attr("src","images/down.png"); 
}
c2++;
});

$("#con_plus").mouseover(function (){
$(this).css("background-color","black");
$(this).css("cursor","default");
});
$("#con_plus").mouseout(function (){
$(this).css("background-color","grey");
});


$("#cou_plus").mouseover(function (){
$(this).css("background-color","black");
$(this).css("cursor","default");
});
$("#cou_plus").mouseout(function (){
$(this).css("background-color","grey");
});


$(".change_pass").click(function () {
$(".cp").show("slow");
});
});


function hide_show_courses()
{
if(document.register.eng.checked)
 {
$("#engg").show("slow");
 }
else
{
$("#engg").hide("slow");
}
if(document.register.mec.checked)
 {
$("#medic").show("slow");
 }
else
{
$("#medic").hide("slow");
}
if(document.register.man.checked)
 {
$("#manage").show("slow");
 }
else
{
$("#manage").hide("slow"); 
}
}


//THIS IS TO HIGHLIGHT THE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////////


function clg_select()
{
$(".search_results tr"+this.value).css("background-color","black");
}


function high(val)
{
if(val==6)
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
 else if(val==4)
  {
   $("#fifth").css("background-color","#ffab00");
  }
 else if(val==5)
  {
   $("#sixth").css("background-color","#ffab00");
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
$(this).css("background-color","black");
return true;
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
  window.location="search.php?stream=eng";
 else if(value==2)
  window.location="search.php?stream=med";
 else
  window.location="search.php?stream=man";
  
}
//////////////////////////////////////////////////////////////

function close_pass()
{
 $(".cp").hide("fast");
}

//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM//////////////////////////////////////////////
function valid(value)
{



 var name=document.register.coll_name.value;
 var shrt_name=document.register.coll_short_name.value;
 var code=document.register.coll_code.value;
 
 
 var eng=document.register.eng.value;
 var mec=document.register.mec.value;
 var man=document.register.man.value;
 
 
 var eng_valid=false;
 var engineering=document.getElementById("engineering");
 for(var i=0; i<engineering.options.length; i++)
  {
   if(engineering.options[i].selected)
    {
	 eng_valid=true;
	}
  }
  
 var med_valid=false;
 var medical=document.getElementById("medicl");
 for(var i=0; i<medical.options.length; i++)
  {
   if(medical.options[i].selected)
    {
	 med_valid=true;
	}
  }

 var man_valid=false;
 var management=document.getElementById("management");
 for(var i=0; i<management.options.length; i++)
  {
   if(management.options[i].selected)
    {
	 man_valid=true;
	}
  }
  
  
 //var medical=document.register.medical[].value;
 //var management=document.register.management[].value;
 
 var affiliated=document.register.affiliated.value;
 var category=document.register.category.value;
 var type=document.register.type.value;
 
 
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
 
 var logo=document.register.file.value;
 
 var year=document.register.yoo.value;
 
 var director=document.register.director.value;
 

 
 if(/^[-a-zA-Z .,]*$/.test(name)==false)
  {
   alert("Invalid College Name: "+name);
   document.register.coll_name.value="";
   document.register.coll_name.focus();
   return false;
  }
 else if(/^[a-zA-Z]*$/.test(shrt_name)==false)
  {
   alert("Invalid Short Name: "+shrt_name);
   document.register.coll_short_name.value="";
   document.register.coll_short_name.focus();
   return false;   
  }
 else if(code!="" && /^[0-9]*$/.test(code)==false)
  {
   alert("Invalid College Code: "+code);
   document.register.coll_code.value="";
   document.register.coll_code.focus();
   return false;   
  }
 else if(!document.register.eng.checked && !document.register.mec.checked && !document.register.man.checked)
  {
   alert("Please Select Stream!!!");
   document.register.eng.focus();
   return false;
  }
 else if(document.register.eng.checked && !eng_valid)
  {
   alert("Please Select Engineering Courses!");
   document.getElementById("engineering").focus();
   return false;
  }
 else if(document.register.mec.checked && !med_valid)
  {
   alert("Please Select Medical Courses!");
   document.getElementById("medicl").focus();
   return false;
  }
 else if(document.register.man.checked && !man_valid)
  {
   alert("Please Select Management Courses!");
   document.getElementById("management").focus();
   return false;
  }

  
  
 /*else if(document.register.mec.checked && medical==null)
  {
   alert("Please Select Medical Courses!");
   document.register.medical.focus();
   return false;
  }
 else if(document.register.man.checked && management==null)
  {
   alert("Please Select Management Courses!");
   document.register.management.focus();
   return false;
  }*/
  
 else if(/^[a-zA-Z]*$/.test(affiliated)==false)
  {
   alert("Invalid Affiliated Value: "+affiliated);
   document.register.affiliated.value="";
   document.register.affiliated.focus();
   return false;
  }
 else if(category==-1)
  {
   alert("Please Select Category!");
   document.register.category.focus();
   return false;
  }
 else if(type==-1)
  {
   alert("Please Select Type!");
   document.register.type.focus();
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
   alert("Invalid City: "+city);
   document.register.city.value="";
   document.register.city.focus();
   return false;
  }
 else if(state==-1)
  {
   alert("Please select State!!!");
   document.register.state.focus();
   return false;
  }
 else if(pincode!="" && (/^[0-9]*$/.test(pincode)==false || pincode.length<6))
    {
     alert("Invalid Pincode: "+pincode);
     document.register.pincode.value="";
     document.register.pincode.focus();
     return false;
    }
 else if((contact!="") && ( /^[0-9]*$/.test(contact)==false || contact.length<2))
     {
      alert("Invalid Contact Number: "+contact+contact2);
      document.register.contact.value="";
      document.register.contact.focus();
      return false;
    }
 else if(contact2!="" && (/^[0-9]*$/.test(contact2)==false || contact2.length<8))
  {
      alert("Invalid Contact Number: "+contact+contact2);
      document.register.contact2.value="";
      document.register.contact2.focus();
      return false;   
  }
 else if((fax!="") && ( /^[0-9]*$/.test(fax)==false || fax.length<2))
     {
      alert("Invalid Fax Number: "+fax+fax2);
      document.register.fax.value="";
      document.register.fax.focus();
      return false;
    }
 else if(fax2!="" && (/^[0-9]*$/.test(fax2)==false || fax2.length<8))
  {
      alert("Invalid Fax Number: "+fax+fax2);
      document.register.fax2.value="";
      document.register.fax2.focus();
      return false;
  }

 else if((email!="") && (email.length==0 || email.lastIndexOf('.')<email.indexOf('@')))
  {
   alert("Invalid EmaiId: "+email);
   document.register.emailid.value="";
   document.register.emailid.focus();
   return false;
  }

 else if((website!="") && (website.substr(0,7)!="http://" ))
  {
   alert("Invalid Website Address: "+website);
   document.register.website.value="";
   document.register.website.focus();
   return false;
  }
 else if(year==-1)
  {
   alert("Please select Year!!!");
   document.register.yoo.focus();
   return false;
  }
 else if(/^[a-zA-Z. ,]*$/.test(director)==false)
  {
   alert("Invalid Director Name: "+director);
   document.register.director.value="";
   document.register.director.focus();
   return false;
  }
 if(value==0)
 {
 var pass=document.register.pass.value;
 var cpass=document.register.cpass.value;
  if(pass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.pass.value="";
   document.register.pass.focus();
   return false;
  }
 else if(cpass.length<9 || cpass!=pass)
  {
   alert("Passwords doesn't match!!!");
   document.register.cpass.value="";
   document.register.cpass.focus();
   return false;
  }
 else
  return true;
 }
else
 {
  if($('.cp').css('display') != 'none')
  {
 var crpass=document.register.crpass.value;
 var npass=document.register.npass.value;
 var cnpass=document.register.cnpass.value;
 if(crpass!="" && crpass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.crpass.value="";
   document.register.crpass.focus();
   return false;
  }

  if(npass!="" && npass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.npass.value="";
   document.register.npass.focus();
   return false;
  }
 else if((npass!="" && cnpass!="") && (cnpass.length<9 || cnpass!=npass))
  {
   alert("Passwords doesn't match!!!");
   document.register.cnpass.value="";
   document.register.cnpass.focus();
   return false;
  }
 else if(npass!="" && crpass=="")
  {
   alert("Please enter the current password!");
   document.register.crpass.value="";
   document.register.crpass.focus();
   return false;   
  }
 else
  return true;  
 }
 }
  
}
//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM//////////////////////////////////////////////


var check_count=0;
var c1="";
var c2="";
var val;
//////////////////////for checking only two colleges for comparision////////////////////////////////////////////////////////
function check_two(obj)
{
 /*for(var i=1;i<=count;i++)
  {
   if(document.coll_list.che.checked)
    {
	 check_count++;
	}
  }
  */
 if(obj.checked)
  {
  check_count++;
  if(check_count<=2)
   {
  if(c1=="")
   {
    c1=obj.value;
	//alert(c1);
   }
  else
   {
    c2=obj.value;
	//alert(c2);
   }
   }
 //alert("checked"+check_count);
  }
 else
  {
   if(c2!="")
    c2="";
   else
    c1="";
  check_count--;
 //alert("unchecked"+check_count);   
  }
  
  
 if(check_count>2)
  {
  alert("Please select only two colleges!!!");
  check_count--;
  return false;
  }
 return true;
}

function select_two()
{
 if(check_count<2)
  {
   alert("Please select exactly two colleges!!!");
   return false;
  }
 else
  {
   val="compare_colleges.php?c1="+c1+"&c2="+c2;
   //alert(val);
   //window.location="compare_colleges.php?c1="+c1+"&c2="+c2;
window.open(
  val,'_blank' // <- This is what makes it open in a new window.
);
   return true;
  }
}
//////////////////////for checking only two colleges for comparision////////////////////////////////////////////////////////


function row_select()
{
 var ele=getElementById("c");
 alert("attempted to check");
}
