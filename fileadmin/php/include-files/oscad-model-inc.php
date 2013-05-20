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

$DIALOG_GROUP_RECIPIENT="FocusRecipient";
$DIALOG_GROUP_TYPE="FocusType";
$DIALOG_GROUP_STATE="FocusState";
$DIALOG_GROUP_FORM="FocusForm";
$DIALOG_GROUP_CONTEXT="FocusContext";
$DIALOG_GROUP_LICENSE="FocusLicense";

/*
 * variables concerning the form evaluation
 */

$gOsucRecipient="4yourself";
$gOsucAction="use";

$gOsucType="snimoli";
$gOsucSoftwareClass="library";

$gOsucState="modified";
$gOsucStateLabel="modified";
$gOsucStateArticle="a";

/* in the form of */
$gOsucForm="sources";
$gOsucFormLabel="source files";

$gOsucContext="independent";
$gOsucContextLabel="independent";
$gOsucContextSuffix="piece of software";

$gOsucLicense="undefined open source license";
$gOsucLicenseName="undefined open source license name";
$gOsucLicenseRelease="undefined open source license release number";
$gOsucLicenseSubpath="unknown-license";

/*
 * Variables being defined by the included open source use case files
*/

$gFbOsucNumber="??";
$gFbOsucName="OSUC-".$gFbOsucNumber;
$gFbOsucDesc="gFbOsucDescUndefined";

/*
 * Variables being defined by the included license specific use case files
 */
$gFbLicenseName="gFbLicenseNameUndefined";
$gFbLicenseSpecification="gFbLicenseSpecificatioUndefined";
$gFbLicenseAbbr="gFbLicenseAbbrUndefined";
$gFbLicenseRelease="gFbLicenseReleaseUndefined";

$gFbLiSpUcName="gFbLiSpUcNameUndefined";
$gFbLiSpUcDesc="gFbLiSpUcDescUndefined";

$gFbLiSpUcRequiresPrefix="gFbLiSpUcRequiresPrefixUndefined";
$gFbLiSpUcNoTasks="gFbLiSpUcNoTasksUndefined";

$gFbLiSpUcRequiresManArr=array();
$gFbLiSpUcRequiresVolArr=array();

$gFbLiSpUcForbidsPrefix="gFbLiSpUcForbidsPrefixUndefined";
$gFbLiSpUcForbidsArr=array();


/*
 * Methods for specifying the predefined variables
 */

function initializeDataModel() {

	global 
		$gFaultDebugMsgs,
		$gAllDebugMsgs,
		$gDebugLevel,
	
		$gHttpRequestMethod,
		$gHttpRequestParameters,
		
		$DIALOG_GROUP_RECIPIENT,
		$DIALOG_GROUP_TYPE,
		$DIALOG_GROUP_STATE,
		$DIALOG_GROUP_FORM,
		$DIALOG_GROUP_CONTEXT,
		$DIALOG_GROUP_LICENSE,
	
		$gOsucRecipient,
		$gOsucAction,
	
		$gOsucType,
		$gOsucSoftwareClass,
	
		$gOsucState,
		$gOsucStateLabel,
		$gOsucStateArticle,
	
		$gOsucForm,
		$gOsucFormLabel,
	
		$gOsucContext,
		$gOsucContextLabel,
		$gOsucContextSuffix,
	
		$gOsucLicense,
		$gOsucLicenseName,
		$gOsucLicenseRelease,
		$gOsucLicenseSubpath;
	
	
	//echo "IN DATA MODEL : $gHttpRequestMethod :";

	switch ($gHttpRequestMethod) {
		case 'POST': $gHttpRequestParameters=$_POST;
		break;
		case 'GET': $gHttpRequestParameters=$_GET;
		break;
		case 'PUT':
		case 'HEAD':
		case 'DELETE':
		case 'OPTIONS':
	
		default:
			return false;
	
	}
	
	$gOsucRecipient=$gHttpRequestParameters[$DIALOG_GROUP_RECIPIENT];
	
	if ("$gOsucRecipient"=="2others")
		$gOsucAction="distribute";
	
	$gOsucType=$gHttpRequestParameters[$DIALOG_GROUP_TYPE];
	if ("$gOsucType"=="proapse")
		$gOsucSoftwareClass="application";

	$gOsucState=$gHttpRequestParameters[$DIALOG_GROUP_STATE];
	if ($gOsucState == "unmodified"){
		$gOsucStateLabel="umodified";
		$gOsucStateArticle="an";
	}

	$gOsucForm=$gHttpRequestParameters[$DIALOG_GROUP_FORM];	
	if ($gOsucForm == "binaries")
		$gOsucFormLabel="binary files";
	elseif ($gOsucForm == "any")
		$gOsucFormLabel="source or binary files";

	$gOsucContext=$gHttpRequestParameters[$DIALOG_GROUP_CONTEXT];	
	if ($gOsucContext == "embedded"){
		$gOsucContextLabel="embedded component";
		$gOsucContextSuffix="in my own software development";
	}
	
	$gOsucLicense=$gHttpRequestParameters[$DIALOG_GROUP_LICENSE];
	$gOsucLicenseName=strtok($gOsucLicense,"v");
	if ($gOsucLicenseName !== false)
		$gOsucLicenseRelease=strtok("v");
	else
		$gOsucLicenseRelease="";
	
	switch($gOsucLicenseName)
	{
		case 'GPL':
		case 'LGPL':
			$gOsucLicenseSubpath="$gOsucLicenseName";
			break;
		default:
			$gOsucLicenseSubpath="$gOsucLicenseName/$gOsucLicenseRelease";
	}
	
	if ($gDebugLevel>=$gAllDebugMsgs)
		echo htmlspecialchars("< $gOsucType : $gOsucContext: $gOsucState : ".
													"$gOsucRecipient : $gOsucForm : $gOsucLicense : ".
													"$gOsucLicenseName : $gOsucLicenseRelease: " .
													" $gOsucLicenseSubpath !!>");
	
	return true;
}


function computeOsucName(
		$osucType,
		$osucContext,
		$osucState,
		$osucRecipient,
		$osucForm
		) {

	global
	$gFaultDebugMsgs,
	$gAllDebugMsgs,
	$gDebugLevel,
	$gOsucName;
	
	if ($osucType == "proapse") {
		/* assertion: gOsucContext is independent */
		if ($osucState == "unmodified") {
			if ($osucRecipient == "4yourself") {
				$gOsucName="OSUC-01";
			} else { /* 2others */
				if ($osucForm=="sources") {
					$gOsucName="OSUC-02S";
				} else { /* binaries */
					$gOsucName="OSUC-02B";					
				}
			}
		} else { /* modified */
			if ($osucRecipient == "4yourself") {
				$gOsucName="OSUC-03";
			} else { /* 2others */
				if ($osucForm=="sources") {
					$gOsucName="OSUC-04S";
				} else { /* binaries */
					$gOsucName="OSUC-04B";
				}
			}
		}
	} else { /* snimoli */
		if ($osucState == "unmodified") {
			if ($osucContext == "independent") {		
				/* assertion: gOsucRecipient is 2 others */
				if ($osucForm=="sources") {
					$gOsucName="OSUC-05S";
				} else { /* binaries */
					$gOsucName="OSUC-05B";
				}
			} else { /* embedded */
				if ($osucRecipient == "4yourself") {
					$gOsucName="OSUC-06";
				} else { /* 2others */
					if ($osucForm=="sources") {
						$gOsucName="OSUC-07S";
					} else { /* binaries */
						$gOsucName="OSUC-07B";
					}
				}
			}	
		}	else { /* modified */
			if ($osucContext == "independent") {
				/* assertion: gOsucRecipient is 2 others */
				if ($osucForm=="sources") {
					$gOsucName="OSUC-08S";
				} else { /* binaries */
					$gOsucName="OSUC-08B";
				}
			} else { /* embedded */
				if ($osucRecipient == "4yourself") {
					$gOsucName="OSUC-09";
				} else { /* 2others */
					if ($osucForm=="sources") {
						$gOsucName="OSUC-10S";
					} else { /* binaries */
						$gOsucName="OSUC-10B";
					}
				}
			
			}
		}
	}	
	return $gOsucName;
}

function extractOsucNumber($osucName) {
	return str_replace("OSUC-", "", $osucName);
}

function computeUcIncludeFileName(
		$osucRecipient,
		$osucType,
		$osucState,
		$osucForm,
		$osucContext,
		$ucCaseName) {
	$relativePath="undefined";
	if ("$osucRecipient" == "4yourself") {
		$relativePath="./". 
				strtolower($osucType) . "/" .
				strtolower($osucState) . "/" .
				strtolower($osucContext) . "/" .
				strtolower($osucRecipient) . "/" .
				strtolower($ucCaseName) . "-inc.php";
	} else {
		$relativePath="./".
				strtolower($osucType) . "/" .
				strtolower($osucState) . "/" .
				strtolower($osucContext) . "/" .
				strtolower($osucRecipient) . "/" .
				strtolower($osucForm) . "/" .
				strtolower($ucCaseName) . "-inc.php";		
	}
		
	return $relativePath;
							 
}



?>
