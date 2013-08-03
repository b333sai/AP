

/////////////////////////////////////////////CLOCK/////////////////////////////////////////////////////////////////////////	
	var now = new Date();//creating a variable which holds the current date
    function startInterval()//function for which calls the updating function every 1000 milliseconds
	{
        setInterval('updateTime();', 1000);//setting the 1000 milliseconds interval
    }
	
    startInterval();//calling the function for the first time
	
    function updateTime(){//function for upadating the time
        var nowMS = now.getTime();//creating an object which holds the current time
        nowMS += 1000;//increasing time by 1 second
        now.setTime(nowMS);//setting the time of the "now" object to the incremented time
        var clock = document.getElementById('clock');//getting hold of the element which displays time in the document
        if(clock){//if exists
            clock.innerHTML = now.toLocaleTimeString() + "<br />" + now.toDateString();//to update the content of the element with updated time and date
        }
    }
/////////////////////////////////////////////CLOCK/////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SCRIPT WHICH EXECUTES WHEN THE DOCUMENT IS LOADED////////////////////////////////////////////////////////////////////////	
$(document).ready(function () {

//for flashing the error messages
for(i=1;i<6;i++)
{
$(".error").fadeOut("fast");
$(".error").fadeIn("fast");

if($("#login_error").css("display") == "block")
{
$("#login_error").fadeOut("fast");
$("#login_error").fadeIn("fast");
}//end of if
}//end of for
//for flashing the error messages



//changing the background color of even and odd search results 
$(".search_results tr:even").css("background-color","#929292");
$(".search_results tr:odd").css("background-color","#7a7a7a");
//changing the background color of even and odd search results 




$(".college_view td").css("padding-left","10px");




//this is for highlighting the rows of the search results and restoring them back
$(".search_results tr").mouseover(function(){
 $(this).css("background-color","orange");
});
//

$(".search_results tr:even").mouseout(function(){
var variable=this;
$(this).find("input:checkbox").each(function (){
if(this.checked)
 $(variable).css("background-color","black"); 
else
  $(variable).css("background-color","#929292");
});
 });

$(".search_results tr:odd").mouseout(function(){
var variable=this;
$(this).find("input:checkbox").each(function (){
if(this.checked)
 $(variable).css("background-color","black"); 
else
  $(variable).css("background-color","#7a7a7a");
});
 });
 
 
 // $("tr .search_results_selected").mouseover(function(){
 // $(this).css("background-color","blue");
 // });

// $("tr:even .search_results_selected").mouseout(function(){
 // $(this).css("background-color","#929292");
 // });

// $("tr:odd .search_results_selected").mouseout(function(){
 // $(this).css("background-color","#7a7a7a");
 // });
//this is for highlighting the rows of the search results and restoring them back




//this is for highlighting the rows of the search results on clicking the row
$(".search_results tr").click(function(){
//alert("hai");
//$(".search_results tr").addClass("search_results_selected");
//alert("hai");
var obj=$(this);
 //$(this).css("background-color","black");
 $(this).find("input:checkbox").each(function (){
 if(this.checked)
  this.checked=false;
 else
 {
  this.checked=true;
  obj.css("background-color","black");
  }
  var value=check_two(this);
  if(!value)
  {
   this.checked=false;
  }
  });
});
//this is for highlighting the rows of the search results on clicking the row




//this is for highlighting the compare button on the comparing colleges page
$("#compare").mouseover(function(){
$(this).css("background-color","brown");
$(this).css("cursor","default");
$(this).css("border","2px solid orange");
});
$("#compare").mouseout(function(){
$(this).css("background-color","green");
$(this).css("border","2px solid grey");
});
//this is for highlighting the compare button on the comparing colleges page





//for closing the change password details on the college profile edit page
$("#close").mouseover(function(){
$(this).css("background-color","brown");
$(this).css("cursor","default");
$(this).css("border","2px solid orange");
});
$("#close").mouseout(function(){
$(this).css("background-color","red");
$(this).css("border","2px solid grey");
});
//for closing the change password details on the college profile edit page





////////////////////////FOR DISPLAYING THE COURSES UNDER VARIOUS STREAMS////////////////////////////////////////////////////
//this is for displaying the various courses under engineering stream on selecting it
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
//this is for displaying the various courses under engineering stream on selecting it


//this is for displaying the various courses under medical stream on selecting it
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
//this is for displaying the various courses under medical stream on selecting it


//this is for displaying the various courses under management stream on selecting it
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
//this is for displaying the various courses under management stream on selecting it
////////////////////////FOR DISPLAYING THE COURSES UNDER VARIOUS STREAMS////////////////////////////////////////////////////





/////////TO ANIMATE THE SHOW/HIDE OF THE EXTRA INFORMATION ON THE VIEW COLLEGE AND COMPARE COLLEGE PAGES
//to change the up/down image of the show contact details in college view and compare colleges
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
//to change the up/down image of the show contact details in college view and compare colleges



//to change the up/down image of the show courses in college view and compare colleges
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
//to change the up/down image of the show courses in college view and compare colleges


//to change the background color of the show/hide contact details
$("#con_plus").mouseover(function (){
$(this).css("background-color","black");
$(this).css("cursor","default");
});
$("#con_plus").mouseout(function (){
$(this).css("background-color","grey");
});
//to change the background color of the show/hide contact details



//to change the background color of the show/hide course details
$("#cou_plus").mouseover(function (){
$(this).css("background-color","black");
$(this).css("cursor","default");
});
$("#cou_plus").mouseout(function (){
$(this).css("background-color","grey");
});
//to change the background color of the show/hide course details
/////////TO ANIMATE THE SHOW/HIDE OF THE EXTRA INFORMATION ON THE VIEW COLLEGE AND COMPARE COLLEGE PAGES



//to show the panel which allows to change the password details in the college profile
$(".change_pass").click(function () {
$(".cp").show("slow");
});
//to show the panel which allows to change the password details in the college profile


});
//SCRIPT WHICH EXECUTES WHEN THE DOCUMENT IS LOADED////////////////////////////////////////////////////////////////////////	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION FOR VALIDATING THE STUDENT REGISTRATION FORM//////////////////////////////////////////////////////////////////////
function validate_student_register()
{

var name=document.s_register.s_name;
var c_name=document.s_register.s_c_name;
var education=document.s_register.s_edu;
//var email=document.s_register.s_email;
var city=document.s_register.s_city;
var state=document.s_register.s_state;


var pass=document.s_register.s_pass;
var cpass=document.s_register.s_cpass;



//validating the name of the student
if(name.value=="" || /^[-a-zA-Z0-9 .]*$/.test(name.value)==false )
{
 alert("Invalid Name: "+name.value);
 name.select();
 name.focus();
 return false;
}
//end of validating the name of the student

//validating the college name of the student
else if(c_name.value=="" || /^[-a-zA-Z,.0-9 ]*$/.test(c_name.value)==false)
{
 alert("Invalid Collge Name: "+c_name.value);
 c_name.select();
 c_name.focus();
 return false;
}
//end of validating the college name of the student

//validating education of the student
// else if(education.value=="" || /^[-a-zA-Z0-9 ,.]*$/.test(education.value)==false)
// {
 // alert("Invalid Education Details: "+education.value);
 // education.select();
 // education.focus();
 // return false;
// }
//end of validating the education of the student

//validating city of the student
else if(city.value=="" || /^[a-zA-Z .,]*$/.test(city.value)==false)
{
 alert("Invalid City: "+city.value);
 city.select();
 city.focus();
 return false;
}
//end of validating city of the student

//validating the state of the student
else if(state.value==-1)
{
 alert("Please Select State!");
 state.focus();
 return false;
}
//end of validating the state of the student
//validating password of the student
else if(pass.value.length<9)
{
 alert("Invalid Password!");
 pass.value="";
 pass.focus();
 return false;
}
//end of validating password of the student

//validating the confirm password details of the student
else if(cpass.value.length<9 || cpass.value!=pass.value)
{
 alert("Passwords Doesn't Match!");
 cpass.value="";
 cpass.focus();
 return false;
}
//end of validating the confirm password details of the student

else
{
return true;//if everything is right it will return true
}

}
//END OF FUNCTION FOR VALIDATING THE STUDENT REGISTRATION FORM///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION FOR CHECKIN THE LOGIN DETAILS///////////////////////////////////////////////////////////////////////////////////
function check_login()
{
 if(/^[a-zA-Z0-9]*$/.test(document.form_login.username.value)==false)
  {
   alert("Invalid Username: "+document.form_login.username.value);
   document.form_login.username.value="";
   document.form_login.username.focus();
   return false;
  }
 else if(document.form_login.password.value.length<9)
  {
   alert("Invalid Password!");
   document.form_login.password.value="";
   document.form_login.password.focus();
   return false;
  }
 else
  {
 return true;
  }
}
//FUNCTION FOR CHECKIN THE LOGIN DETAILS///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION TO HIDE OR SHOW THE COURSE DETAILS//////////////////////////////////////////////////////////////////////////////
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
}//end of function
//FUNCTION TO HIDE OR SHOW THE COURSE DETAILS//////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION TO SHOW/HIDE THE LOGIN FROM ON LOAD/(CLICK OF THE BUTTON) WITH/WITHOUT ERROR//////////////////////////////////////
function hide_show_login(err)
{
 if(err==1)
  {
  $("#login_form").show("fast");
  $("#login_error").show();
  }
 else
  {
   $("#login_error").hide();
   $("#login_form").toggle("fast");
  }
   document.form_login.username.value="";
   document.form_login.password.value="";
}
//FUNCTION TO SHOW/HIDE THE LOGIN FROM ON LOAD/(CLICK OF THE BUTTON) WITH/WITHOUT ERROR//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//THIS IS TO HIGHLIGHT THE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////////
function high(val)
{
 if(val==0)
  {
   $("#first").css("background-color"," #ffab00");
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
   $("#last").css("background-color"," #ffab00");
  }
}
//THIS IS TO HIGHLIGHT THE MENU ITEM WHEN THE USER CLICKS ON THEM///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//THIS IS TO HIGHLIGHT THE SIDE MENU ITEM WHEN THE USER CLICKS ON THEM IN THE NEW PAGE///////////////////////////////////////
function high_side(val)
{
 if(val==0)
  {
   $("#t_eng").css("background-color","#419eb2");
   $("#t_eng").css("color","white");
   $("#t_eng").css("border-left","5px solid #f0611f");
  } 
 else if(val==1)
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
 else
  {
   $("#most_viewed").css("background-color","#419eb2");
   $("#most_viewed").css("color","white");
   $("#most_viewed").css("border-left","5px solid #f0611f");
  }
}
//THIS IS TO HIGHLIGHT THE SIDE MENU ITEM WHEN THE USER CLICKS ON THEM IN THE NEW PAGE///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Function to close the current tab in the browser//////////////////////////////////////////////////////////////////////////
function win_close()
{
 window.open('','_parent','');
 if(confirm("Are you sure?"))
  window.close('_parent');
  
  return false;
}
//Function to close the current tab in the browser//////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION TO CHANGE THE PAGE LOCATION TO THE SEARCH PAGE DEPENDING ON THEIR CHOICE OF STREAM IN HOME PAGE//////////////////
function change_loc(value)
{
 if(value==1)
  window.location="search.php?stream=eng";
 else if(value==2)
  window.location="search.php?stream=med";
 else
  window.location="search.php?stream=man";
  
}
//FUNCTION TO CHANGE THE PAGE LOCATION TO THE SEARCH PAGE DEPENDING ON THEIR CHOICE OF STREAM IN HOME PAGE//////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION TO HIDE THE CHANGE PASSWORD PANEL IN THE COLLEGE PROFILE EDIT////////////////////////////////////////////////////
function close_pass()
{
 $(".cp").hide("fast");
}
//FUNCTION TO HIDE THE CHANGE PASSWORD PANEL IN THE COLLEGE PROFILE EDIT////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM and profile edit ///////////////////////////
function valid(value)
{
 //variables holding the various elements in the registration page
 var name=document.register.coll_name.value;
 var shrt_name=document.register.coll_short_name.value;
 var code=document.register.coll_code.value;
 
 var eng=document.register.eng.value;
 var mec=document.register.mec.value;
 var man=document.register.man.value;

 //to check whether atleast one course in engineering is selected or not
 var eng_valid=false;
 var engineering=document.getElementById("engineering");
 for(var i=0; i<engineering.options.length; i++)
  {
   if(engineering.options[i].selected)
    {
	 eng_valid=true;
	}
  }
 //to check whether atleast one course in engineering is selected or not

 //to check whether atleast one course in medical is selected or not 
 var med_valid=false;
 var medical=document.getElementById("medicl");
 for(var i=0; i<medical.options.length; i++)
  {
   if(medical.options[i].selected)
    {
	 med_valid=true;
	}
  }
 //to check whether atleast one course in medical is selected or not

 //to check whether atleast one course in management is selected or not
 var man_valid=false;
 var management=document.getElementById("management");
 for(var i=0; i<management.options.length; i++)
  {
   if(management.options[i].selected)
    {
	 man_valid=true;
	}
  }
 //to check whether atleast one course in management is selected or not
 
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
 //end of variables holding the various elements in the registration page

 //validating the college name
 if(/^[-a-zA-Z .,]*$/.test(name)==false)
  {
   alert("Invalid College Name: "+name);
   document.register.coll_name.value="";
   document.register.coll_name.focus();
   return false;
  }
 //end of validating the college name

 //validating the short name of the college
 else if(/^[a-zA-Z]*$/.test(shrt_name)==false)
  {
   alert("Invalid Short Name: "+shrt_name);
   document.register.coll_short_name.value="";
   document.register.coll_short_name.focus();
   return false;   
  }
 //end of validating the short name of the college

 //validating the college code
 else if(code!="" && /^[0-9]*$/.test(code)==false)
  {
   alert("Invalid College Code: "+code);
   document.register.coll_code.value="";
   document.register.coll_code.focus();
   return false;   
  }
 //end of validating the college code

 //validating whether atlead one stream is selected or not
 else if(!document.register.eng.checked && !document.register.mec.checked && !document.register.man.checked)
  {
   alert("Please Select Stream!!!");
   document.register.eng.focus();
   return false;
  }
 //end of validating whether atlead one stream is selected or not

 //validating whether engineering courses are selected
 else if(document.register.eng.checked && !eng_valid)
  {
   alert("Please Select Engineering Courses!");
   document.getElementById("engineering").focus();
   return false;
  }
 //end of validating whether engineering courses are selected

 //validating whether medical courses are selected
 else if(document.register.mec.checked && !med_valid)
  {
   alert("Please Select Medical Courses!");
   document.getElementById("medicl").focus();
   return false;
  }
 //end of validating whether medical courses are selected

 //validating whether management courses are selected
 else if(document.register.man.checked && !man_valid)
  {
   alert("Please Select Management Courses!");
   document.getElementById("management").focus();
   return false;
  }
 //end of validating whether management courses are selected

 //validating the affiliation field
 else if(/^[a-zA-Z]*$/.test(affiliated)==false)
  {
   alert("Invalid Affiliated Value: "+affiliated);
   document.register.affiliated.value="";
   document.register.affiliated.focus();
   return false;
  }
 //end of validating the affiliation field
 
 //validating the category of the college
 else if(category==-1)
  {
   alert("Please Select Category!");
   document.register.category.focus();
   return false;
  }
 //end of validating the category of the college
 
 //validating the type of the college
 else if(type==-1)
  {
   alert("Please Select Type!");
   document.register.type.focus();
   return false;
  }
 //end of validating the type of the college
 
 //validating the intake information
 else if(intake==-1)
  {
   alert("Please Choose an Intake range!!!");
   document.register.students_intake.focus();
   return false;
  }
 //end of validating the intake information 
 
 //validating the city
 else if(/^[a-zA-Z]*$/.test(city)==false)
  {
   alert("Invalid City: "+city);
   document.register.city.value="";
   document.register.city.focus();
   return false;
  }
 //end of validating the city
 
 //validating the state
 else if(state==-1)
  {
   alert("Please select State!!!");
   document.register.state.focus();
   return false;
  }
 //end of validating the state
 
 //validating the pincode of the college
 else if(pincode!="" && (/^[0-9]*$/.test(pincode)==false || pincode.length<6))
  {
   alert("Invalid Pincode: "+pincode);
   document.register.pincode.value="";
   document.register.pincode.focus();
   return false;
  }
 //end of validating the pincode
 
 //validating the code of contact number
 else if((contact!="") && ( /^[0-9]*$/.test(contact)==false || contact.length<2))
  {
   alert("Invalid Contact Number: "+contact+contact2);
   document.register.contact.value="";
   document.register.contact.focus();
   return false;
  }
 //end of validating the code of contact number
 
 //validating the contact number
 else if(contact2!="" && (/^[0-9]*$/.test(contact2)==false || contact2.length<8))
  {
   alert("Invalid Contact Number: "+contact+contact2);
   document.register.contact2.value="";
   document.register.contact2.focus();
   return false;   
  }
 //end of validating the contact number
 
 //validating the code of fax number
 else if((fax!="") && ( /^[0-9]*$/.test(fax)==false || fax.length<2))
  {
   alert("Invalid Fax Number: "+fax+fax2);
   document.register.fax.value="";
   document.register.fax.focus();
   return false;
  }
 //end of validating the code of fax number
 
 //validating the fax number
 else if(fax2!="" && (/^[0-9]*$/.test(fax2)==false || fax2.length<8))
  {
   alert("Invalid Fax Number: "+fax+fax2);
   document.register.fax2.value="";
   document.register.fax2.focus();
   return false;
  }
 //end of validating the fax number
 
 //validating the email of the college
 else if((email!="") && (email.length==0 || email.lastIndexOf('.')<email.indexOf('@')))
  {
   alert("Invalid EmaiId: "+email);
   document.register.emailid.value="";
   document.register.emailid.focus();
   return false;
  }
 //end of validating the email of the college
 
 //validating the college website
 else if((website!="") && (website.substr(0,7)!="http://" ))
  {
   alert("Invalid Website Address: "+website);
   document.register.website.value="";
   document.register.website.focus();
   return false;
  }
 //end of validating the college website
 
 //validating the college establishment year
 else if(year==-1)
  {
   alert("Please select Year!!!");
   document.register.yoo.focus();
   return false;
  }
 //end of validating the college establishment year
 
 //validating the college director name
 else if(/^[a-zA-Z. ,]*$/.test(director)==false)
  {
   alert("Invalid Director Name: "+director);
   document.register.director.value="";
   document.register.director.focus();
   return false;
  }
 //end of validating the college director name
 
 //validating few things which are there in profile edit but not in registration form///////////////////////////////////////
 if(value==0)//if it is the registration form
 {
  var pass=document.register.pass.value;
  var cpass=document.register.cpass.value;

 //validating the college password
 if(pass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.pass.value="";
   document.register.pass.focus();
   return false;
  }
 //end of validating the college password
  
 //validating the confirm password details 
 else if(cpass.length<9 || cpass!=pass)
  {
   alert("Passwords doesn't match!!!");
   document.register.cpass.value="";
   document.register.cpass.focus();
   return false;
  }
 //end of validating confirm password details
 
 else
  return true;
 }//end of if
else//validating the extra information on the profile edit page
 {
  if($('.cp').css('display') != 'none')
  {
  
   var crpass=document.register.crpass.value;
   var npass=document.register.npass.value;
   var cnpass=document.register.cnpass.value;
   //validating the current password
 if(crpass!="" && crpass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.crpass.value="";
   document.register.crpass.focus();
   return false;
  }
  //end of validating the current password
  
  //validating the new password
  if(npass!="" && npass.length<9)
  {
   alert("Password length should lie between 9 and 15!");
   document.register.npass.value="";
   document.register.npass.focus();
   return false;
  }
  //end of validating the new password
  
  //validating the confirm password details
 else if((npass!="" && cnpass!="") && (cnpass.length<9 || cnpass!=npass))
  {
   alert("Passwords doesn't match!!!");
   document.register.cnpass.value="";
   document.register.cnpass.focus();
   return false;
  }
 //end of validating the confirm password details
 
 //validating the current and new password details
 else if(npass!="" && crpass=="")
  {
   alert("Please enter the current password!");
   document.register.crpass.value="";
   document.register.crpass.focus();
   return false;   
  }
 //end of validating the current and new password details
 
 else
 {
  return true;
 }
 
 }
 
 }
 //validating few things which are there in profile edit but not in registration form///////////////////////////////////////
}
//////////////////////////////////////TO VALIDATE THE COLLEGE REGISTRATION FORM and profile edit ///////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FOR CHECKING WHETHER ONLY TWO COLLEGES ARE SELECTED //////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////FOR PREPARING THE URL FOR COMPARING COLLEGES //////////////////////////////////////////////////
var check_count=0;//variable which counts the number of colleges seleced
var c1="";//variable which holds the ap_id of first college
var c2="";//variable which holds the ap_id of second college
var val;//variable which holds the url of the new window to be opened
function check_two(obj)
{
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
  
 if(check_count>2)//when selection exceeds more than two colleges
  {
  alert("Please select only two colleges!!!");
  check_count--;
  return false;
  }
 return true;
}
//////////////////////FOR PREPARING THE URL FOR COMPARING COLLEGES //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function submit_form(name)
{
 
 if(name)
  {
   name.submit();
   alert("hai");
  }
 else
 {
  alert("bye");
 }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////FUNCTION WHICH OPENS THE NEW WINDOW WHEN TWO COLLEGES ARE SELECTED/////////////////////////////////////////////////
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
   window.open(val,'_blank' // <- This is what makes it open in a new window. 
       );
   return true;
  }
}
/////////FUNCTION WHICH OPENS THE NEW WINDOW WHEN TWO COLLEGES ARE SELECTED/////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////FOR CHECKING WHETHER ONLY TWO COLLEGES ARE SELECTED //////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////