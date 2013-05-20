<?php

/*
 * OSCAd Server: The Open Source Compliance Advisor obtains a request via
 * http-GET or http-POST concerning an open source license together with
 * a particular open source use case specified by 5 parameters. The OSCAd
 * delivers a html page containing a list of tasks whose execution would
 * establish a compliant use of a respective open source software under the
 * specified circumstances.
 *
 * Copyright (C) 2013 Karsten Reincke, Deutsche Telekom AG
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version. 
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

/*** (0) Meta ***/
$gSuccessValue=0;
$gFaultValue=$gSuccessValue;
$gFaultOsucFileMissed=-1;
$gFaultLsucFileMissed=-10;
$gFaultWrongRestMethod=-100;

/*** (1) Model ***/
include("include-files/oscad-basics-inc.php");
include("include-files/oscad-model-inc.php");

if(initializeDataModel()!=true)
	$gFaultValue=$gFaultWrongRestMethod;

/* TODO: branch into faultmessage if model not initialized */

/*** Controler ***/

/* 
 * (1) compute the general open source use case based on the
 * 		 received GET/POST (form) parameters, extract its pure number
 * 		 and compute the path to the corresponding include file
 */
$gOsucName=computeOsucName($gOsucType,$gOsucContext,
		$gOsucState,$gOsucRecipient,$gOsucForm);

$gOsucNumber=extractOsucNumber($gOsucName);

$gOsucIncludeFileName=computeUcIncludeFileName(
		$gOsucRecipient, $gOsucType, $gOsucState , 
		$gOsucForm, $gOsucContext, $gOsucName );


/*
 * (2) compute the corresponding license specific use case which
 * 		 covers the general open source use case
 */

$gLsucName=computeCoveringLicenseSpecificUseCase($gOsucName,$gOsucLicense);
$gLsucIncludeFileName=computeUcIncludeFileName(
		$gOsucRecipient, $gOsucType, $gOsucState ,
		$gOsucForm, $gOsucContext, $gLsucName );


if(file_exists($gOsucIncludeFileName)==true)
	include($gOsucIncludeFileName);
else 
	$gFaultValue=$gFaultOsucFileMissed;

if(file_exists($gLsucIncludeFileName)==true)
	include($gLsucIncludeFileName);
else
	$gFaultValue=$gFaultLsucFileMissed;

if ($gFaultValue==$gSuccessValue)
  include("include-files/oscad-view-results-inc.php");
else 
	include("include-files/oscad-view-faults-inc.php");

?>