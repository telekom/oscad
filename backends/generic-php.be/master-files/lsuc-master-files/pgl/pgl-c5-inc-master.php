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


$gFbLicenseName="PostgreSQL";
$gFbLicenseSpecification="Postgres License";
$gFbLicenseAbbr="PgL";
$gFbLicenseRelease="";

$gOsLicProtectionChapter="2.12";
$gOsLicPatentChapter="";
$gOsLicTodoListChapter="6.13";
$gOsLicLsucChapter="6.13.5";
$gOsLicTlExplanationChapter="6.13.6";

$gFbLiSpUcName="PostgreSQL-C5";

$gFbLiSpUcDesc=
	"that you received a PostgreSQL licensed code snippet, module, library, or
  plugin (snimoli), that you modified it, and that you are now going to
  distribute this modified version to third parties in the form of binaries or
  as source code files together with another larger software unit which contains
  this code snippet, module, library, or plugin as an embedded component,
  regardless whether you distribute it in the form of binaries or as source code
  files.";

$gFbLiSpUcRequiresPrefix=
	"the following tasks in order to fulfill the license conditions:";

$gFbLiSpUcNoTasks="";

$gFbLiSpUcRequiresManArr=array(

  "Ensure that the complete PostgreSQL license including
  the copyright notice, the permission notices, and the PostgreSQL disclaimer
  are retained in your package in the form you have received them."

);

$gFbLiSpUcRequiresVolArr=array(
  "Mark your modifications in the source code,
  regardless whether you want to distribute the code or not.",

  "It is a good practice of the open source
  community to let the copyright notice, which is shown by the running program,
  also state that the program uses a component being licensed under the
  PostgreSQL license.  And it is a good tradition to insert links to the
  homepage or download page of this embedded component",

  "It's a good tradition to let the documentation of
  your distribution or your additional material also contain a link to the
  original software (project) and its homepage.",

  "Arrange your distribution so that the original
  licensing elements (in particular the PostgreSQL license text containing the
  copyright notices of the original author(s), the permission notices and the
  PostgrSGL disclaimer) clearly refer only to the embedded library and do not
  affect the licensing of your own overarching work. Consider keeping embedded
  libraries, modules, snippets, or plugins in separate directories which also
  contain all their licensing elements."
);

$gFbLiSpUcForbidsPrefix="nothing explicitly.";
$gFbLiSpUcForbidsArr=array();

?>
