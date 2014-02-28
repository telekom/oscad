<?php

/*  This file is part of OSCAd, the Open Source Compliance Advisor
 *
 *  Copyright (C) 2013 Karsten Reincke, Deutsche Telekom AG
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.

 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

/*** (1) Model ***/

$gNoDebugMsgs=0;
$gFaultDebugMsgs=5;
$gAllDebugMsgs=10;

$gDebugLevel = 0;

$gHttpRequestMethod = $_SERVER['REQUEST_METHOD'];
$gHttpRequestParameters = array();

$DIALOG_GROUP_DIST="FocusDist";
$DIALOG_GROUP_AGPL="FocusAgpl";
$DIALOG_GROUP_MODI="FocusModi";
$DIALOG_GROUP_INLILI="FocusInLiLi";

$gAcceptedUcParameters = array(
  'DIST' => array('DistYes','DistNo'),
  'AGPL' => array('AgplYes','AgplNo'),
  'MODI' =>array('ModiYes','ModiNo'),
  'INLILI' =>array('InLiLiYes','InLiLiNo')
);

/*
 * variables concerning the form evaluation
 */

$gOsucDist="DistYes";

$gOsucAgpl="AgplYes";

$gOsucModi="ModiYes";

$gOsucInLiLi="InLiLiYes";


/*
 * Reject other methods than GET and POST
 * Note the active parameter variable into $gHttpRequestParameters
 */

function checkHttpMethod(){
  global $gHttpRequestMethod,
  $gHttpRequestParameters,
  $gFaultWrongRestMethod,
  $gSuccessValue;

  switch ($gHttpRequestMethod) {
    case 'POST':
      $gHttpRequestParameters=$_POST;
      return $gSuccessValue;
    case 'GET': $gHttpRequestParameters=$_GET;
      return $gSuccessValue;
    case 'PUT':
    case 'HEAD':
    case 'DELETE':
    case 'OPTIONS':

    default:

  }

  return $gFaultWrongRestMethod;
}

/*
 * Reject use case if it doesn't have the required
 * parameters.
 */

function checkUseCaseParameters(){
  global $gHttpRequestParameters,
  $gFaultWrongCaseParameters,
  $gSuccessValue,

  $DIALOG_GROUP_DIST,
  $DIALOG_GROUP_AGPL,
  $DIALOG_GROUP_MODI,
  $DIALOG_GROUP_INLILI,
  
  $gOsucDist,
  $gOsucAgpl,
  $gOsucModi,
  $gOsucInLiLi,
  
  $gAcceptedUcParameters;

  $gOsucDist=$gHttpRequestParameters[$DIALOG_GROUP_DIST];
  $gOsucAgpl=$gHttpRequestParameters[$DIALOG_GROUP_AGPL];
  $gOsucModi=$gHttpRequestParameters[$DIALOG_GROUP_MODI];
  $gOsucInLiLi=$gHttpRequestParameters[$DIALOG_GROUP_INLILI];

   if (!(in_array($gOsucDist,$gAcceptedUcParameters['DIST'])))
     return $gFaultWrongCaseParameters;
   if (!(in_array($gOsucAgpl,$gAcceptedUcParameters['AGPL'])))
     return $gFaultWrongCaseParameters;
   if (!(in_array($gOsucModi,$gAcceptedUcParameters['MODI'])))
     return $gFaultWrongCaseParameters;
   if (!(in_array($gOsucInLiLi,$gAcceptedUcParameters['INLILI'])))
   	return $gFaultWrongCaseParameters;
   
  return $gSuccessValue;
}

function checkThreeYes(){
	global 
	$gSuccessValue,
	$gOnlyYesSuccessValue,
	$gAnyNoAnswer,
	$gOsucDist,
	$gOsucAgpl,
	$gOsucModi,
	$gOsucInLiLi;

	if ($gOsucDist=="DistNo")
		return $gAnyNoAnswer;
	
	if ($gOsucAgpl=="AgplNo")
		return $gAnyNoAnswer;

	if ($gOsucModi=="ModiNo")
		return $gAnyNoAnswer;

	if ($gOsucInLiLi=="InLiLiNo")
		return $gAnyNoAnswer;
	
	return $gOnlyYesSuccessValue;
}

?>
