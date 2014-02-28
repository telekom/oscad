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

$gAnyNoAnswer=2;
$gOnlyYesSuccessValue=1;
$gSuccessValue=0;

$gFaultWrongRestMethod=-100;
$gFaultWrongCaseParameters=-200;

$gFaultValue=$gSuccessValue;

/*** (1) Model ***/
include("include-files/pc4oscad-model-inc.php");

/** (2) Controler ***/
$gFaultValue=checkHttpMethod();

if ($gFaultValue==$gSuccessValue)
  $gFaultValue=checkUseCaseParameters();

if ($gFaultValue==$gSuccessValue) {
  /*
   * (1) Check whether you got 3 yes.
   */
  $gFaultValue=checkThreeYes();
  
}


switch($gFaultValue) {

  case $gAnyNoAnswer:
    include("include-files/pc4oscad-view-result-any-no-inc.php");
    break;
    
  case $gOnlyYesSuccessValue:
	include("include-files/pc4oscad-view-result-only-yes-inc.php");
	break;
	
  case $gFaultWrongRestMethod:
    include("include-files/pc4oscad-view-inadequate-http-method-inc.php");
    break;
    
  case $gFaultWrongCaseParameters:
    include("include-files/pc4oscad-view-inadequate-parameters-inc.php");
    break;
	
  default:
  	include("include-files/pc4oscad-view-faults-inc.php");
}
exit(0);
?>