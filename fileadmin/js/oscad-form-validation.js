// var debug=true;
var debug=false;

function replaceByMouseOver() {
  if (debug==true)
  	document.getElementById('TestId').innerHTML="mouseoverText";
}

function replaceByMouseOut() {
  if (debug==true)
  document.getElementById('TestId').innerHTML="mouseoutText";
}


function presentHelpHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: Help";
   
   document.getElementById('HelpTextId').innerHTML="\
   Lead the mouse over the ? for obtaining further explanations. \
   ";
}

function presentTypeHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: Type";

   document.getElementById('HelpTextId').innerHTML="\
   A piece of (open source) software is a program, an application, or \
   a server, only if you can start its binary form with your normal program \
   launcher, or (in case of a text file which still must be interpreted by an \
   interpreter like php, perl, bash etc.) if you can start an interpreter which \
   takes the file as one of its arguments and executes the commands. \
   ";
   
}
function presentStateHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: State";

   document.getElementById('HelpTextId').innerHTML="\
   You are modifying a piece of (open source) software if you expand, \
	reduce or modify at least one of the received software files, and - in case of \
	dealing with binary object code - if you (re)compile and (re)link the modified \
	software to a new binary file. But if you only modify some of the configuration \
	files, you are not modifying the open source software itself.\
   "; 
}
function presentContextHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: Context";

   document.getElementById('HelpTextId').innerHTML="\
	You are using a piece of open source software as an embedded component \
	of a larger unit if [a] one of your files of the larger unit contains a \
	verbatim or a modified copy (i.e. a snippet) of the received open source \
	software, or [b] if your larger unit contains an include statement referring \
	to a functionally defining file of the received open source software, or \
   [c] if your larger unit calls a function defined in the received open source \
  	software, or [d] if your development environment contains a compiler or linker \
  	directive referring to the received open source software (binaries) and if \
  	your larger unit can't be executed without resolving this linker directive. \
   ";
   
}
function presentRecipientHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: Recipient";

   document.getElementById('HelpTextId').innerHTML="\
	You are using the received open source software only for yourself, \
	if you as a person do not pass it to other entities like persons, \
	organizations, companies etc., or if you - as a member of a specific \
	development group - pass it only to the other members of your development \
	group. But if you store open source software on any device such as a mobile \
	phone, an USB stick, etc. or if you attach it to any transport medium like \
	email etc. and if you then sell, give away, or simply send this device or \
	transport medium to anyone (other than a direct member of your development \
   group) then you indeed handover the open source software to third parties. \
   ";
   
}
function presentFormHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: Form";

   document.getElementById('HelpTextId').innerHTML="\
   Sometimes it is up to you to decide whether you want to distribute \
	only the binaries or whether you are intentionally going to distribute the \
	sources (too). These are the forms of open source software. But in some \
	cases, you have to respect some special conditions if you want to distribute \
	the sources and/or the binaries. \
   ";
   
}

function presentOsucHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: OSUC";

   document.getElementById('HelpTextId').innerHTML="\
   OSUC stands for Open Source Use Case. \
   ";
   
}

function presentLicenseHelp() {
   document.getElementById('HelpHeadlineId').innerHTML="Help: License";

   document.getElementById('HelpTextId').innerHTML="\
   For determining how to use a piece of open source software in the context of a \
   specific open source use case compliantly, you have to subspecify the general \
   open source use case by a specific open source license.\
   ";
   
}

/* Functional-Rule-1: if type==proapse then context=independent  */ 
function respectSwitchToProapse()  {
  if (document.getElementById('proapseId').checked==true) {
    if (debug==true) document.getElementById('TestId').innerHTML="functional rule 1";
    document.getElementById('independentId').checked=true;
	 document.getElementById('embeddedId').checked=false;
  } 
}

 /* Functional-Rule-2: if type==snimoli then 
    a) if context==independent then recipient = 2others
    b) if recipient == 4yourself then context = embedded
    */  
function respectSwitchToSnimoli()  {
  if (document.getElementById('snimoliId').checked==true) {
    if (debug==true) document.getElementById('TestId').innerHTML="functional rule 2"; 
    if (document.getElementById('independentId').checked==true)
    {
    	if (debug==true) document.getElementById('TestId').innerHTML="functional rule 2a";
    	document.getElementById('othersId').checked=true;
	 	document.getElementById('yourselfId').checked=false;
    }
    if (document.getElementById('yourselfId').checked==true)
    {
    	if (debug==true) document.getElementById('TestId').innerHTML="functional rule 2b";
    	document.getElementById('embeddedId').checked=true;
	 	document.getElementById('independentId').checked=false;
    }
  } 
} 
 
 
/* Functional-Rule-3: if context==embedded then type=snimoli  */
function respectSwitchToEmbedded()  {
  if (document.getElementById('embeddedId').checked==true) {
    if (debug==true) document.getElementById('TestId').innerHTML="functional rule 3";
    document.getElementById('proapseId').checked=false;
	 document.getElementById('snimoliId').checked=true;
  } 
}


/* Functional-Rule-4: if context==independed && 
   type==snimoli then recipient = 2others */

function respectSwitchToIndependent()  {
  if (   document.getElementById('independentId').checked==true
      && document.getElementById('snimoliId').checked==true
     )
    {
    	if (debug==true) document.getElementById('TestId').innerHTML="functional rule 4";
    	document.getElementById('othersId').checked=true;
	 	document.getElementById('yourselfId').checked=false;
	 	
    }
} 

/* Functional-Rule-5: if recipient==4yourself && 
   type==snimoli then context = embedded */
 
function respectSwitchToYourself()  {
  if (   document.getElementById('yourselfId').checked==true
      && document.getElementById('snimoliId').checked==true)
    {
    	if (debug==true) document.getElementById('TestId').innerHTML="functional rule 5";
    	document.getElementById('embeddedId').checked=true;
	 	document.getElementById('independentId').checked=false;
    }
} 


function integrateLicenseSelection(osucSpecificFocusLicenseId) {
	var osucSpecificFocusLicenseValue="undefined";
	if (document.getElementById('agpl30Id').checked==true)
	  osucSpecificFocusLicenseValue="AGPLv3.0";
	if (document.getElementById('apl20Id').checked==true)
	  osucSpecificFocusLicenseValue="ApLv2.0";
	if (document.getElementById('bsd2Id').checked==true)
	  osucSpecificFocusLicenseValue="BSDv2CL";
	if (document.getElementById('bsd3Id').checked==true)
	  osucSpecificFocusLicenseValue="BSDv3CL";
	if (document.getElementById('cddl10Id').checked==true)
	  osucSpecificFocusLicenseValue="CDDLv1.0";
	if (document.getElementById('epl10Id').checked==true)
	  osucSpecificFocusLicenseValue="EPLv1.0";
	if (document.getElementById('eupl11Id').checked==true)
	  osucSpecificFocusLicenseValue="EUPLv1.1";
	if (document.getElementById('gpl20Id').checked==true)
	  osucSpecificFocusLicenseValue="GPLv2.0";
	if (document.getElementById('gpl30Id').checked==true)
	  osucSpecificFocusLicenseValue="GPLv3.0";
	if (document.getElementById('lgpl21Id').checked==true)
	  osucSpecificFocusLicenseValue="LGPLv2.1";
	if (document.getElementById('lgpl30Id').checked==true)
	  osucSpecificFocusLicenseValue="LGPLv3.0";
	if (document.getElementById('mitId').checked==true)
	  osucSpecificFocusLicenseValue="MIT";
	if (document.getElementById('msplId').checked==true)
	  osucSpecificFocusLicenseValue="MS-PL";
	if (document.getElementById('mpl20Id').checked==true)
	  osucSpecificFocusLicenseValue="MPLv2.0";
	if (document.getElementById('pglId').checked==true)
	  osucSpecificFocusLicenseValue="PGL";
 	if (document.getElementById('php30Id').checked==true)
	  osucSpecificFocusLicenseValue="PHPv3.0";

	return document.getElementById(osucSpecificFocusLicenseId).value=osucSpecificFocusLicenseValue;
}


