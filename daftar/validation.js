function MM_findObj(n, d) { 
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { 
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.id; if ((val=val.value)!="") {
	

	
      if (test.indexOf('isEmail')!=-1) { 
	  p=val.indexOf('@');
      if (p<1 || p==(val.length-1)) errors+='- Maklumat '+nm+' mesti dalam alamat emel yang lengkap. Contoh: admin@ipptar.gov.my .\n';
      } 
	  
	  else if (test!='R') { 
	  num = parseFloat(val);
      if (isNaN(val)) errors+='- Maklumat '+nm+' mestilah dalam bentuk nombor.\n';
	 
      if (test.indexOf('inRange') != -1) {
	  p=test.indexOf(':');
      min=test.substring(8,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' must contain a number antara '+min+' and '+max+'.\n';
    } 
	 if (test.indexOf('inRangeH') != -1) {
	  p=test.indexOf(':');
      min=test.substring(9,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' mestilah mengandungi  '+min+' digit. Contoh: 0172777123.\n';
    } 
	 if (test.indexOf('inRangeO') != -1) {
	  p=test.indexOf(':');
      min=test.substring(9,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' mestilah mengandungi minimum '+min+' dan maksimum '+max+' digit. Contoh: 0341435102.\n';
    } 
	
	 if (test.indexOf('inRangeI') != -1) {
	  p=test.indexOf(':');
      min=test.substring(9,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' mestilah mengandungi '+min+' digit. Contoh: 870824055623.\n';
    }
	
	
	 if (test.indexOf('inRangeU') != -1) {
	  p=test.indexOf(':');
      min=test.substring(9,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' mestilah mengandungi minimum '+min+' digit dan maksimum '+max+'. Contoh: 870824055623.\n';
    }
		
	 if (test.indexOf('inRangeA') != -1) {
	  p=test.indexOf(':');
      min=test.substring(9,p); 
	  max=test.substring(p+1);
	  
      
	  if (val.length<min || max<val.length) errors+='- Maklumat '+nm+' mestilah mengandungi minimum '+min+' digit dan maksimum '+max+'. Contoh: 0341436189 atau 0194823999.\n';
    }
	} 
	} 
	
	
	else if (test.charAt(0) == 'R') errors += '- Maklumat '+nm+' perlu diisi dengan lengkap.\n'; 
	
	}
    } 
  if (errors) alert('Harap Maaf.Maklumat borang tidak lengkap, Sila lengkapkan pada maklumat diperlukan :\n\n'+errors);
  document.MM_returnValue = (errors == '');
}
