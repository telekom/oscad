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

$gFbLicenseName="GPL-[2.0|3.0]";
$gFbLicenseSpecification="GNU General Public License";
$gFbLicenseAbbr="GPL";
$gFbLicenseRelease="[2.0|3.0]";

$gOsLicProtectionChapter="2.7";
$gOsLicPatentChapter="3.1.6";
$gOsLicTodoListChapter="6.8";
$gOsLicLsucChapter="6.8.2";
$gOsLicTlExplanationChapter="6.8.12";

$gFbLiSpUcName="GPL-C2";

$gFbLiSpUcDesc=
	"that you received GPL-2.0 or GPL-3.0 licensed software which you
are now going to distribute to third parties as an independent unit and in the form of
  unmodified source code files or as unmodified source code package. In this
  case it makes no difference if you distribute a program, an application, a
  server, a snippet, a module, a library, or a plugin as an independent or as an
  embedded unit.";

$gFbLiSpUcRequiresPrefix=
	"the following tasks in order to fulfill the license conditions:";

$gFbLiSpUcNoTasks="";

$gFbLiSpUcRequiresManArr=array(

  "Ensure that the licensing elements - esp. all
  notices that refer to the GPL-2.0 or GPL-3.0 and to the absence of any
  warranty - are retained in your package in the form you have received them.",

  "Ensure that the distributed source code package contains a conspicuously and
	appropriately designed, easily to find copyright notice and a disclaimer of
	warranty. If these elements are missed, add a new file containing the main
	copyright notice and the disclaimer of warranty in the form which is
	textually defined by the license GPL-2.0 itself resp. by the  GPL-3.0 itself.
	(Yes, repeat the disclaimer although it is also part of the license itself
	and although you are required to hand the license itself over
  to the receiver.)",

  "Give the recipient a copy of the GPL-2.0 resp. GPL-3.0 license. If it
	is not already part of the software package, add it.",

  "Retain all existing copyright notices."

);

$gFbLiSpUcRequiresVolArr=array(
	"Let the documentation of your distribution and/or
  your additional material also reproduce the content of the existing
  copyright notices, a hint to the software name, a link to its homepage,
  the respective disclaimer of warranty, and a link to the GPL-2.0 resp.
  GPL-3.0."
);

$gFbLiSpUcForbidsPrefix="nothing explicitly with respect to this use case.";
$gFbLiSpUcForbidsArr=array();

?>
