////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//THIS IS FOR VALIDATING THE EMAIL ADDRESSES ENTERED////////////////////////////////////////////////////////////////////////
function validate_email(email,id)
{
//var email=document.feed_form.e_mail;
if(email.value!="")
 {
  var show=0;
  //alert("0");
    if(email.value.indexOf('@') < 0)
     {
      show=1;
	  //alert("1");
     }
    if(show==0)
     {
       if(email.value.indexOf('@') ==0 )
        {
         show=1;
	     //alert("2");
        }
       //if(show==0 && (email.value.split('@').length -1)>1)
        //{
        // show=1;
	     //alert("3");
        //}
       if(show==0)
        {
	     //var arr=email.value.split("@");
		 var str1=email.value.substring(0,email.value.lastIndexOf('@'));
		 var str2=email.value.substring(email.value.lastIndexOf('@')+1,email.value.length);
		 //alert(str1+"   " + str2);
	     //var str1=arr[0];
	     //var str2=arr[1];
		 
	     var s=0;
	      if(str1.indexOf('.') >=0)
	       {
		     if(str1.indexOf("..")!=-1)
		      {
		       s=1;
		      }
		     else
		      {
		       s=0;
		      }
	       }
	      if(str1.indexOf('.')==0 || s==1)
	       {
	        show=1;
	       // alert("4");
	       }
	      if(show==0 && (/^[-a-zA-z0-9!#$%&'*+//=?^_`{|}~.]*$/.test(str1)==false))
	       {
	        show=1;
			//alert("5");
	        var f=str1.indexOf('"');
	        var l=str1.lastIndexOf('"');
	        if(f >=0 && l>=0 && f!=l)
	         {
	          if(f==0 && l==str1.length-1)
	           {
		         show=0;
				// alert("a");
		       }
	          if((f!=0 && l==str1.length-1))
	           {
		        if(str1[f-1]!='.')
		         {
		          show=1;
				//  alert("b");
		         }
		        else
		         {
		          show=0;
				 // alert("c");
		         }
		       }
	          if((f==0 && l!=str1.length-1))
	           {
		        if(str1[l+1]!='.')
		         {
		          show=1;
				 // alert("d");
		         }
		        else
		         {
		          show=0;
				 // alert("e");
		         }
		       }
	          if((f!=0 && l!=str1.length-1))
	           {
		        if(str1[l+1]!='.' || str1[f-1]!='.')
		         {
		          show=1;
				  //alert("f");
		         }
		        else
		         {
		          show=0;
				 // alert("g");
		         }	    
	           }
	         }		
		//to find the occurance of '"'
		    if(show==0)
		     {
			   if(str1.lastIndexOf('"')-str1.indexOf('"')>=2)
			    {
		       var sub_str1=str1.substring(str1.indexOf('"')+1,str1.lastIndexOf('"')-1);
		       var c=sub_str1.split('"').length-1;
		       //alert(sub_str1+c);
		       var indices=[];
		       for(var i=0;i<sub_str1.length;i++)
		        {
		         if(sub_str1[i]=='"')
		          {
		           indices.push(i);
		          }
		        }
		       for(var j=0;j<indices.length;j++)
                {
		         if(sub_str1[indices[j]-1]!='\\')
		          {
		           show=1;
				   //alert("h");
			       break;
		          }
		         else
		          {
		           show=0;
				   //alert("i");
		          }
                }
				}
	         }
		//to find the occurance of '"'
            if(show==0 && f >=0 && l>=0 && f!=l )
             {
			  for(var sp=0;sp<str1.length;sp++)
			   {
			    if(str1[sp]==':')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]==';')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='(')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]==')')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]==',')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='<')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='>')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='@')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='[')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]==']')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='\\')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }
			    if(str1[sp]=='"')
				 {
				  if(sp<f || sp>l)
				   {
				    show=1;
					//alert("j");
					break;
				   }
				  else
				   {
				    show=0;
					//alert("k");
				   }
				 }

			   }
             }			 
	       }
		}
	     if(show==0)
		 {
          if(str2[0]!='[' && str2[str2.length-1]!=']')
           {
            if((str2.indexOf('.') < 0 || (str2.lastIndexOf('.') == str2.length-1) || (str2.indexOf('.') >=0 && (str2[str2.indexOf('.')+1]=='.'))))
	         {
	          show=1;
	          //alert("6");
	         }
	        if(show==0 && (/^[-a-zA-z0-9.]*$/.test(str2)==false))
	         {
	          show=1;
	          //alert("7");
	         }
		   }
		  if(show==0 && ((str2[0]=='[' && str2[str2.length-1]!=']' )|| (str2[0]!='[' && str2[str2.length-1]==']' )))
		   {
		    show=1;
			//alert("9");
		   }
	       //$("#h_warning").hide();
	    }    
     }
if(show==1)
 {
  $(id).show();
 }
else
{
 $(id).hide();
}
 }
 else
  {
   $(id).hide();
  }
}
//THIS IS FOR VALIDATING THE EMAIL ADDRESSES ENTERED////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////THIS IS TO VALIDATE WHETHER THE PASSWORD IS IN RANGE/////////////////////////////////////////////////////////////////////
function validate_password(password,id)
{
 if(password.value.length < 9 && password.value!="")
  {
   $(id).show();
   $(id).css("color","red");
  }
 else
  {
   $(id).hide();
  }
}
////THIS IS TO VALIDATE WHETHER THE PASSWORD IS IN RANGE/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////THIS FUNCTION IS FOR VALIDATING PASSWORD REQUIREMENTS//////////////////////////////////////////////////////////////////
function reg_validate_password(password,cpass,p_id,cp_id,img_id)//("password-input-name","confirm-password-input-name","password-alert-id","confirm-password-alert-id","password-match-image-id")
{
 if(password.value.length < 9 && password.value!="")
  {
   password.style.color= "red";
   $(p_id).css("color","red");
   $(cp_id).hide();
   $(img_id).hide(); 
   cpass.value="";
  }
 else
  {
   password.style.color= "green";
   $(p_id).css("color","#d7d7d7");
  }
  
 if(password.value!="" && cpass.value!="")
  {
    if(password.value==cpass.value && password.value.length>=9)
     {
       $(cp_id).html(" Passwords Matched! ");
       cpass.style.color= "green";
       password.style.color= "green";
       $(cp_id).css("color","green");
       $(img_id).show();
       $(cp_id).show();
     }
    else
     {
       $(cp_id).css("color","red");
       cpass.style.color= "red";
       password.style.color= "red";
       $(cp_id).html(" Passwords doesn't match!!!");
       $(img_id).hide();
     }
  }
}
/////THIS FUNCTION IS FOR VALIDATING PASSWORD REQUIREMENTS//////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////THIS FUNCTION IS TO CHECK WHETHER THE PASSWORDS MATCH//////////////////////////////////////////////////////////////////
function confirm_password(cpass,pass,id,img_id)//("confirm-password-input-name","password-input-name","confirm-password-alert-id", "password-match-image-id")
{
 if(cpass.value!="" )
  {
    if(cpass.value==pass.value && pass.value.length>= 9)
     {
      cpass.style.color= "green";
      pass.style.color="green";
      $(id).html(" Passwords Matched! ");
      $(id).css("color","green");
      $(img_id).show();
      $(id).show();
     }
    else
     {
      cpass.style.color= "red";
      pass.style.color="red";
      $(id).html(" Passwords doesn't match!!!");
      $(id).css("color","red");
      $(id).show();
      $(img_id).hide();
     }
  }
 else
  {
   $(id).hide();
   $(img_id).hide();
  }
}
/////THIS FUNCTION IS TO CHECK WHETHER THE PASSWORDS MATCH//////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
