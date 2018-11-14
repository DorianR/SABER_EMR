<?php
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php include "phprptinc/ewrcfg3.php"; ?>
<?php include "phprptinc/ewmysql.php"; ?>
<?php include "phprptinc/ewrfn3.php"; ?>
<?php

// Get page start time
$starttime = ewrpt_microtime();

// Open connection to the database
$conn = ewrpt_Connect();

// Table level constants
define("EW_REPORT_TABLE_VAR", "infpaciente", TRUE);
define("EW_REPORT_TABLE_SESSION_GROUP_PER_PAGE", "infpaciente_grpperpage", TRUE);
define("EW_REPORT_TABLE_SESSION_START_GROUP", "infpaciente_start", TRUE);
define("EW_REPORT_TABLE_SESSION_SEARCH", "infpaciente_search", TRUE);
define("EW_REPORT_TABLE_SESSION_CHILD_USER_ID", "infpaciente_childuserid", TRUE);
define("EW_REPORT_TABLE_SESSION_ORDER_BY", "infpaciente_orderby", TRUE);

// Table level SQL
$EW_REPORT_TABLE_SQL_FROM = "`infpaciente`";
$EW_REPORT_TABLE_SQL_SELECT = "SELECT * FROM " . $EW_REPORT_TABLE_SQL_FROM;
$EW_REPORT_TABLE_SQL_WHERE = "";
$EW_REPORT_TABLE_SQL_GROUPBY = "";
$EW_REPORT_TABLE_SQL_HAVING = "";
$EW_REPORT_TABLE_SQL_ORDERBY = "";
$EW_REPORT_TABLE_SQL_USERID_FILTER = "";
$EW_REPORT_TABLE_SQL_CHART_BASE = $EW_REPORT_TABLE_SQL_FROM;
$af_idPaciente = NULL; // Popup filter for idPaciente
$af_CodigoFicha = NULL; // Popup filter for CodigoFicha
$af_CodigoPaciente = NULL; // Popup filter for CodigoPaciente
$af_FechaIngreso = NULL; // Popup filter for FechaIngreso
$af_Hora = NULL; // Popup filter for Hora
$af_PrimerNombreP = NULL; // Popup filter for PrimerNombreP
$af_SegundoNombreP = NULL; // Popup filter for SegundoNombreP
$af_PrimerApeP = NULL; // Popup filter for PrimerApeP
$af_SegundoApeP = NULL; // Popup filter for SegundoApeP
$af_ApellidoCasada = NULL; // Popup filter for ApellidoCasada
$af_Referido = NULL; // Popup filter for Referido
$af_AutoridadesNotificadas = NULL; // Popup filter for AutoridadesNotificadas
$af_FechaNacP = NULL; // Popup filter for FechaNacP
$af_AniosP = NULL; // Popup filter for AniosP
$af_MesesP = NULL; // Popup filter for MesesP
$af_DiasP = NULL; // Popup filter for DiasP
$af_DPI = NULL; // Popup filter for DPI
$af_EdicionPaciente = NULL; // Popup filter for EdicionPaciente
$af_Telefono = NULL; // Popup filter for Telefono
$af_Direccion = NULL; // Popup filter for Direccion
$af_Sexo = NULL; // Popup filter for Sexo
$af_ContactoPaciente = NULL; // Popup filter for ContactoPaciente
$af_TelContacto = NULL; // Popup filter for TelContacto
$af_Relacion = NULL; // Popup filter for Relacion
$af_PersonalIngInfo_idPersonalIngInfo = NULL; // Popup filter for PersonalIngInfo_idPersonalIngInfo
$af_EstadoCivil_idEstadoCivil = NULL; // Popup filter for EstadoCivil_idEstadoCivil
$af_Etnia_idEtnia = NULL; // Popup filter for Etnia_idEtnia
$af_AutoridadesNotif_idAutoridadesNotif = NULL; // Popup filter for AutoridadesNotif_idAutoridadesNotif
?>
<?php
$sExport = @$_GET["export"]; // Load export request
if ($sExport == "html") {

	// Printer friendly
}
?>
<?php

// Initialize common variables
// Paging variables

$nRecCount = 0; // Record count
$nStartGrp = 0; // Start group
$nStopGrp = 0; // Stop group
$nTotalGrps = 0; // Total groups
$nGrpCount = 0; // Group count
$nDisplayGrps = 3; // Groups per page
$nGrpRange = 10;

// Clear field for ext filter
$sClearExtFilter = "";

// Non-Text Extended Filters
// Text Extended Filters
// Custom filters

$ewrpt_CustomFilters = array();
?>
<?php
?>
<?php

// Field variables
$x_idPaciente = NULL;
$x_CodigoFicha = NULL;
$x_CodigoPaciente = NULL;
$x_FechaIngreso = NULL;
$x_Hora = NULL;
$x_PrimerNombreP = NULL;
$x_SegundoNombreP = NULL;
$x_PrimerApeP = NULL;
$x_SegundoApeP = NULL;
$x_ApellidoCasada = NULL;
$x_Referido = NULL;
$x_AutoridadesNotificadas = NULL;
$x_FechaNacP = NULL;
$x_AniosP = NULL;
$x_MesesP = NULL;
$x_DiasP = NULL;
$x_DPI = NULL;
$x_EdicionPaciente = NULL;
$x_Telefono = NULL;
$x_Direccion = NULL;
$x_Sexo = NULL;
$x_ContactoPaciente = NULL;
$x_TelContacto = NULL;
$x_Relacion = NULL;
$x_PersonalIngInfo_idPersonalIngInfo = NULL;
$x_EstadoCivil_idEstadoCivil = NULL;
$x_Etnia_idEtnia = NULL;
$x_AutoridadesNotif_idAutoridadesNotif = NULL;

// Detail variables
$o_idPaciente = NULL; $t_idPaciente = NULL; $ft_idPaciente = 3; $rf_idPaciente = NULL; $rt_idPaciente = NULL;
$o_CodigoFicha = NULL; $t_CodigoFicha = NULL; $ft_CodigoFicha = 200; $rf_CodigoFicha = NULL; $rt_CodigoFicha = NULL;
$o_CodigoPaciente = NULL; $t_CodigoPaciente = NULL; $ft_CodigoPaciente = 200; $rf_CodigoPaciente = NULL; $rt_CodigoPaciente = NULL;
$o_FechaIngreso = NULL; $t_FechaIngreso = NULL; $ft_FechaIngreso = 133; $rf_FechaIngreso = NULL; $rt_FechaIngreso = NULL;
$o_Hora = NULL; $t_Hora = NULL; $ft_Hora = 134; $rf_Hora = NULL; $rt_Hora = NULL;
$o_PrimerNombreP = NULL; $t_PrimerNombreP = NULL; $ft_PrimerNombreP = 200; $rf_PrimerNombreP = NULL; $rt_PrimerNombreP = NULL;
$o_SegundoNombreP = NULL; $t_SegundoNombreP = NULL; $ft_SegundoNombreP = 200; $rf_SegundoNombreP = NULL; $rt_SegundoNombreP = NULL;
$o_PrimerApeP = NULL; $t_PrimerApeP = NULL; $ft_PrimerApeP = 200; $rf_PrimerApeP = NULL; $rt_PrimerApeP = NULL;
$o_SegundoApeP = NULL; $t_SegundoApeP = NULL; $ft_SegundoApeP = 200; $rf_SegundoApeP = NULL; $rt_SegundoApeP = NULL;
$o_ApellidoCasada = NULL; $t_ApellidoCasada = NULL; $ft_ApellidoCasada = 200; $rf_ApellidoCasada = NULL; $rt_ApellidoCasada = NULL;
$o_Referido = NULL; $t_Referido = NULL; $ft_Referido = 200; $rf_Referido = NULL; $rt_Referido = NULL;
$o_AutoridadesNotificadas = NULL; $t_AutoridadesNotificadas = NULL; $ft_AutoridadesNotificadas = 200; $rf_AutoridadesNotificadas = NULL; $rt_AutoridadesNotificadas = NULL;
$o_FechaNacP = NULL; $t_FechaNacP = NULL; $ft_FechaNacP = 200; $rf_FechaNacP = NULL; $rt_FechaNacP = NULL;
$o_AniosP = NULL; $t_AniosP = NULL; $ft_AniosP = 200; $rf_AniosP = NULL; $rt_AniosP = NULL;
$o_MesesP = NULL; $t_MesesP = NULL; $ft_MesesP = 200; $rf_MesesP = NULL; $rt_MesesP = NULL;
$o_DiasP = NULL; $t_DiasP = NULL; $ft_DiasP = 200; $rf_DiasP = NULL; $rt_DiasP = NULL;
$o_DPI = NULL; $t_DPI = NULL; $ft_DPI = 200; $rf_DPI = NULL; $rt_DPI = NULL;
$o_EdicionPaciente = NULL; $t_EdicionPaciente = NULL; $ft_EdicionPaciente = 16; $rf_EdicionPaciente = NULL; $rt_EdicionPaciente = NULL;
$o_Telefono = NULL; $t_Telefono = NULL; $ft_Telefono = 3; $rf_Telefono = NULL; $rt_Telefono = NULL;
$o_Direccion = NULL; $t_Direccion = NULL; $ft_Direccion = 200; $rf_Direccion = NULL; $rt_Direccion = NULL;
$o_Sexo = NULL; $t_Sexo = NULL; $ft_Sexo = 200; $rf_Sexo = NULL; $rt_Sexo = NULL;
$o_ContactoPaciente = NULL; $t_ContactoPaciente = NULL; $ft_ContactoPaciente = 200; $rf_ContactoPaciente = NULL; $rt_ContactoPaciente = NULL;
$o_TelContacto = NULL; $t_TelContacto = NULL; $ft_TelContacto = 200; $rf_TelContacto = NULL; $rt_TelContacto = NULL;
$o_Relacion = NULL; $t_Relacion = NULL; $ft_Relacion = 200; $rf_Relacion = NULL; $rt_Relacion = NULL;
$o_PersonalIngInfo_idPersonalIngInfo = NULL; $t_PersonalIngInfo_idPersonalIngInfo = NULL; $ft_PersonalIngInfo_idPersonalIngInfo = 3; $rf_PersonalIngInfo_idPersonalIngInfo = NULL; $rt_PersonalIngInfo_idPersonalIngInfo = NULL;
$o_EstadoCivil_idEstadoCivil = NULL; $t_EstadoCivil_idEstadoCivil = NULL; $ft_EstadoCivil_idEstadoCivil = 3; $rf_EstadoCivil_idEstadoCivil = NULL; $rt_EstadoCivil_idEstadoCivil = NULL;
$o_Etnia_idEtnia = NULL; $t_Etnia_idEtnia = NULL; $ft_Etnia_idEtnia = 3; $rf_Etnia_idEtnia = NULL; $rt_Etnia_idEtnia = NULL;
$o_AutoridadesNotif_idAutoridadesNotif = NULL; $t_AutoridadesNotif_idAutoridadesNotif = NULL; $ft_AutoridadesNotif_idAutoridadesNotif = 3; $rf_AutoridadesNotif_idAutoridadesNotif = NULL; $rt_AutoridadesNotif_idAutoridadesNotif = NULL;
?>
<?php

// Filter
$sFilter = "";

// Aggregate variables
// 1st dimension = no of groups (level 0 used for grand total)
// 2nd dimension = no of fields

$nDtls = 29;
$nGrps = 1;
$val = ewrpt_InitArray($nDtls, 0);
$cnt = ewrpt_Init2DArray($nGrps, $nDtls, 0);
$smry = ewrpt_Init2DArray($nGrps, $nDtls, 0);
$mn = ewrpt_Init2DArray($nGrps, $nDtls, NULL);
$mx = ewrpt_Init2DArray($nGrps, $nDtls, NULL);
$grandsmry = ewrpt_InitArray($nDtls, 0);
$grandmn = ewrpt_InitArray($nDtls, NULL);
$grandmx = ewrpt_InitArray($nDtls, NULL);

// Set up if accumulation required
$col = array(FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, FALSE);

// Set up groups per page dynamically
SetUpDisplayGrps();

// Set up popup filter
SetupPopup();

// Extended filter
$sExtendedFilter = "";

// Build popup filter
$sPopupFilter = GetPopupFilter();

//echo "popup filter: " . $sPopupFilter . "<br>";
if ($sPopupFilter <> "") {
	if ($sFilter <> "")
		$sFilter = "($sFilter) AND ($sPopupFilter)";
	else
		$sFilter = $sPopupFilter;
}

// No filter
$bFilterApplied = FALSE;

// Get sort
$sSort = getSort();

// Get total count
$sSql = ewrpt_BuildReportSql($EW_REPORT_TABLE_SQL_SELECT, $EW_REPORT_TABLE_SQL_WHERE, $EW_REPORT_TABLE_SQL_GROUPBY, $EW_REPORT_TABLE_SQL_HAVING, $EW_REPORT_TABLE_SQL_ORDERBY, $sFilter, @$sSort);
$nTotalGrps = GetCnt($sSql);
if ($nDisplayGrps <= 0) // Display all groups
	$nDisplayGrps = $nTotalGrps;
$nStartGrp = 1;

// Show header
$bShowFirstHeader = ($nTotalGrps > 0);

//$bShowFirstHeader = TRUE; // Uncomment to always show header
// Set up start position if not export all

if (EW_REPORT_EXPORT_ALL && @$sExport <> "")
    $nDisplayGrps = $nTotalGrps;
else
    SetUpStartGroup(); 

// Get current page records
$rs = GetRs($sSql, $nStartGrp, $nDisplayGrps);
?>
<?php include "phprptinc/header.php"; ?>
<?php if (@$sExport == "") { ?>
<script type="text/javascript">
var EW_REPORT_DATE_SEPARATOR = "/";
if (EW_REPORT_DATE_SEPARATOR == "") EW_REPORT_DATE_SEPARATOR = "/"; // Default date separator
</script>
<script type="text/javascript" src="phprptjs/ewrpt.js"></script>
<?php } ?>
<?php if (@$sExport == "") { ?>
<script src="phprptjs/popup.js" type="text/javascript"></script>
<script src="phprptjs/ewrptpop.js" type="text/javascript"></script>
<script src="FusionChartsFree/JSClass/FusionCharts.js" type="text/javascript"></script>
<script type="text/javascript">
var EW_REPORT_POPUP_ALL = "(All)";
var EW_REPORT_POPUP_OK = "  OK  ";
var EW_REPORT_POPUP_CANCEL = "Cancel";
var EW_REPORT_POPUP_FROM = "From";
var EW_REPORT_POPUP_TO = "To";
var EW_REPORT_POPUP_PLEASE_SELECT = "Please Select";
var EW_REPORT_POPUP_NO_VALUE = "No value selected!";

// popup fields
</script>
<?php } ?>
<?php if (@$sExport == "") { ?>
<!-- Table Container (Begin) -->
<table id="ewContainer" cellspacing="0" cellpadding="0" border="0">
<!-- Top Container (Begin) -->
<tr><td colspan="3"><div id="ewTop" class="phpreportmaker">
<!-- top slot -->
<a name="top"></a>
<?php } ?>
Infpaciente
<?php if (@$sExport == "") { ?>
&nbsp;&nbsp;<a href="infpacienterpt.php?export=html">Printer Friendly</a>
<?php } ?>
<br /><br />
<?php if (@$sExport == "") { ?>
</div></td></tr>
<!-- Top Container (End) -->
<tr>
	<!-- Left Container (Begin) -->
	<td valign="top"><div id="ewLeft" class="phpreportmaker">
	<!-- Left slot -->
	</div></td>
	<!-- Left Container (End) -->
	<!-- Center Container - Report (Begin) -->
	<td valign="top" class="ewPadding"><div id="ewCenter" class="phpreportmaker">
	<!-- center slot -->
<?php } ?>
<!-- summary report starts -->
<div id="report_summary">
<table class="ewGrid" cellspacing="0"><tr>
	<td class="ewGridContent">
<!-- Report Grid (Begin) -->
<div class="ewGridMiddlePanel">
<table class="ewTable ewTableSeparate" cellspacing="0">
<?php

// Set the last group to display if not export all
if (EW_REPORT_EXPORT_ALL && @$sExport <> "") {
	$nStopGrp = $nTotalGrps;
} else {
	$nStopGrp = $nStartGrp + $nDisplayGrps - 1;
}

// Stop group <= total number of groups
if (intval($nStopGrp) > intval($nTotalGrps))
	$nStopGrp = $nTotalGrps;
$nRecCount = 0;

// Get first row
if ($nTotalGrps > 0) {
	GetRow(1);
	$nGrpCount = 1;
}
while (($rs && !$rs->EOF) || $bShowFirstHeader) {

	// Show header
	if ($bShowFirstHeader) {
?>
	<thead>
	<tr>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Id Paciente
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Id Paciente</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Codigo Ficha
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Codigo Ficha</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Codigo Paciente
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Codigo Paciente</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Fecha Ingreso
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Fecha Ingreso</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Hora
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Hora</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Primer Nombre P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Primer Nombre P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Segundo Nombre P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Segundo Nombre P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Primer Ape P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Primer Ape P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Segundo Ape P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Segundo Ape P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Apellido Casada
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Apellido Casada</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Referido
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Referido</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Autoridades Notificadas
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Autoridades Notificadas</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Fecha Nac P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Fecha Nac P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Anios P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Anios P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Meses P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Meses P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Dias P
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Dias P</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		DPI
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>DPI</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Edicion Paciente
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Edicion Paciente</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Telefono
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Telefono</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Direccion
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Direccion</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Sexo
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Sexo</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Contacto Paciente
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Contacto Paciente</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Tel Contacto
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Tel Contacto</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Relacion
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Relacion</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Personal Ing Info Id Personal Ing Info
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Personal Ing Info Id Personal Ing Info</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Estado Civil Id Estado Civil
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Estado Civil Id Estado Civil</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Etnia Id Etnia
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Etnia Id Etnia</td>
			</tr></table>
		</td>
<?php } ?>
<?php if (@$sExport <> "") { ?>
		<td valign="bottom" class="ewTableHeader">
		Autoridades Notif Id Autoridades Notif
		</td>
<?php } else { ?>
		<td class="ewTableHeader">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr>
			<td>Autoridades Notif Id Autoridades Notif</td>
			</tr></table>
		</td>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
		$bShowFirstHeader = FALSE;
	}
	$nRecCount++;

		// Set row color
		$sItemRowClass = " class=\"ewTableRow\"";

		// Display alternate color for rows
		if ($nRecCount % 2 <> 1)
			$sItemRowClass = " class=\"ewTableAltRow\"";
?>
	<tr>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_idPaciente) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_CodigoFicha) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_CodigoPaciente) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue(ewrpt_FormatDateTime($x_FechaIngreso,5)) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Hora) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_PrimerNombreP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_SegundoNombreP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_PrimerApeP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_SegundoApeP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_ApellidoCasada) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Referido) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_AutoridadesNotificadas) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_FechaNacP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_AniosP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_MesesP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_DiasP) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_DPI) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_EdicionPaciente) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Telefono) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Direccion) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Sexo) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_ContactoPaciente) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_TelContacto) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Relacion) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_PersonalIngInfo_idPersonalIngInfo) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_EstadoCivil_idEstadoCivil) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_Etnia_idEtnia) ?>
</td>
		<td<?php echo $sItemRowClass; ?>>
<?php echo ewrpt_ViewValue($x_AutoridadesNotif_idAutoridadesNotif) ?>
</td>
	</tr>
<?php

		// Accumulate page summary
		AccumulateSummary();

		// Get next record
		GetRow(2);
	$nGrpCount++;
} // End while
?>
	</tbody>
	<tfoot>
	</tfoot>
</table>
</div>
<?php if (@$sExport == "") { ?>
<div class="ewGridLowerPanel">
<form action="infpacienterpt.php" name="ewpagerform" id="ewpagerform" class="ewForm">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td nowrap>
<?php if (!isset($Pager)) $Pager = new cPrevNextPager($nStartGrp, $nDisplayGrps, $nTotalGrps) ?>
<?php if ($Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpreportmaker">Page&nbsp;</span></td>
<!--first page button-->
	<?php if ($Pager->FirstButton->Enabled) { ?>
	<td><a href="infpacienterpt.php?start=<?php echo $Pager->FirstButton->Start ?>"><img src="phprptimages/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phprptimages/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($Pager->PrevButton->Enabled) { ?>
	<td><a href="infpacienterpt.php?start=<?php echo $Pager->PrevButton->Start ?>"><img src="phprptimages/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phprptimages/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="pageno" id="pageno" value="<?php echo $Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($Pager->NextButton->Enabled) { ?>
	<td><a href="infpacienterpt.php?start=<?php echo $Pager->NextButton->Start ?>"><img src="phprptimages/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phprptimages/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($Pager->LastButton->Enabled) { ?>
	<td><a href="infpacienterpt.php?start=<?php echo $Pager->LastButton->Start ?>"><img src="phprptimages/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phprptimages/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpreportmaker">&nbsp;of <?php echo $Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpreportmaker"> <?php echo $Pager->FromIndex ?> to <?php echo $Pager->ToIndex ?> of <?php echo $Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($sFilter == "0=101") { ?>
	<span class="phpreportmaker">Please enter search criteria</span>
	<?php } else { ?>
	<span class="phpreportmaker">No records found</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($nTotalGrps > 0) { ?>
		<td nowrap>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="right" valign="top" nowrap><span class="phpreportmaker">Records Per Page&nbsp;
<select name="<?php echo EW_REPORT_TABLE_GROUP_PER_PAGE; ?>" onChange="this.form.submit();" class="phpreportmaker">
<option value="1"<?php if ($nDisplayGrps == 1) echo " selected" ?>>1</option>
<option value="2"<?php if ($nDisplayGrps == 2) echo " selected" ?>>2</option>
<option value="3"<?php if ($nDisplayGrps == 3) echo " selected" ?>>3</option>
<option value="4"<?php if ($nDisplayGrps == 4) echo " selected" ?>>4</option>
<option value="5"<?php if ($nDisplayGrps == 5) echo " selected" ?>>5</option>
<option value="10"<?php if ($nDisplayGrps == 10) echo " selected" ?>>10</option>
<option value="20"<?php if ($nDisplayGrps == 20) echo " selected" ?>>20</option>
<option value="50"<?php if ($nDisplayGrps == 50) echo " selected" ?>>50</option>
<option value="ALL"<?php if (@$_SESSION[EW_REPORT_TABLE_SESSION_GROUP_PER_PAGE] == -1) echo " selected" ?>>All</option>
</select>
		</span></td>
<?php } ?>
	</tr>
</table>
</form>
</div>
<?php } ?>
</td></tr></table>
</div>
<!-- Summary Report Ends -->
<?php if (@$sExport == "") { ?>
	</div><br /></td>
	<!-- Center Container - Report (End) -->
	<!-- Right Container (Begin) -->
	<td valign="top"><div id="ewRight" class="phpreportmaker">
	<!-- Right slot -->
	</div></td>
	<!-- Right Container (End) -->
</tr>
<!-- Bottom Container (Begin) -->
<tr><td colspan="3"><div id="ewBottom" class="phpreportmaker">
	<!-- Bottom slot -->
	</div><br /></td></tr>
<!-- Bottom Container (End) -->
</table>
<!-- Table Container (End) -->
<?php } ?>
<?php
$conn->Close();

// display elapsed time
if (defined("EW_REPORT_DEBUG_ENABLED"))
	echo ewrpt_calcElapsedTime($starttime);
?>
<?php include "phprptinc/footer.php"; ?>
<?php

// Accummulate summary
function AccumulateSummary() {
	global $smry, $cnt, $col, $val, $mn, $mx;
	$cntx = count($smry);
	for ($ix = 0; $ix < $cntx; $ix++) {
		$cnty = count($smry[$ix]);
		for ($iy = 1; $iy < $cnty; $iy++) {
			$cnt[$ix][$iy]++;
			if ($col[$iy]) {
				$valwrk = $val[$iy];
				if (is_null($valwrk) || !is_numeric($valwrk)) {

					// skip
				} else {
					$smry[$ix][$iy] += $valwrk;
					if (is_null($mn[$ix][$iy])) {
						$mn[$ix][$iy] = $valwrk;
						$mx[$ix][$iy] = $valwrk;
					} else {
						if ($mn[$ix][$iy] > $valwrk) $mn[$ix][$iy] = $valwrk;
						if ($mx[$ix][$iy] < $valwrk) $mx[$ix][$iy] = $valwrk;
					}
				}
			}
		}
	}
	$cntx = count($smry);
	for ($ix = 1; $ix < $cntx; $ix++) {
		$cnt[$ix][0]++;
	}
}

// Reset level summary
function ResetLevelSummary($lvl) {
	global $smry, $cnt, $col, $mn, $mx, $nRecCount;

	// Clear summary values
	$cntx = count($smry);
	for ($ix = $lvl; $ix < $cntx; $ix++) {
		$cnty = count($smry[$ix]);
		for ($iy = 1; $iy < $cnty; $iy++) {
			$cnt[$ix][$iy] = 0;
			if ($col[$iy]) {
				$smry[$ix][$iy] = 0;
				$mn[$ix][$iy] = NULL;
				$mx[$ix][$iy] = NULL;
			}
		}
	}
	$cntx = count($smry);
	for ($ix = $lvl; $ix < $cntx; $ix++) {
		$cnt[$ix][0] = 0;
	}

	// Clear old values
	// Reset record count

	$nRecCount = 0;
}

// Accummulate grand summary
function AccumulateGrandSummary() {
	global $cnt, $col, $val, $grandsmry, $grandmn, $grandmx;
	@$cnt[0][0]++;
	for ($iy = 1; $iy < count($grandsmry); $iy++) {
		if ($col[$iy]) {
			$valwrk = $val[$iy];
			if (is_null($valwrk) || !is_numeric($valwrk)) {

				// skip
			} else {
				$grandsmry[$iy] += $valwrk;
				if (is_null($grandmn[$iy])) {
					$grandmn[$iy] = $valwrk;
					$grandmx[$iy] = $valwrk;
				} else {
					if ($grandmn[$iy] > $valwrk) $grandmn[$iy] = $valwrk;
					if ($grandmx[$iy] < $valwrk) $grandmx[$iy] = $valwrk;
				}
			}
		}
	}
}

// Get count
function GetCnt($sql) {
	global $conn;

	//echo "sql (GetCnt): " . $sql . "<br>";
	$rscnt = $conn->Execute($sql);
	$cnt = ($rscnt) ? $rscnt->RecordCount() : 0;
	return $cnt;
}

// Get rs
function GetRs($sql, $start, $grps) {
	global $conn;
	$wrksql = $sql . " LIMIT " . ($start-1) . ", " . ($grps);

	//echo "wrksql: (rsgrp)" . $sSql . "<br>";
	$rswrk = $conn->Execute($wrksql);
	return $rswrk;
}

// Get row values
function GetRow($opt) {
	global $rs, $val;
	if (!$rs)
		return;
	if ($opt == 1) { // Get first row
		$rs->MoveFirst();
	} else { // Get next row
		$rs->MoveNext();
	}
	if (!$rs->EOF) {
		$GLOBALS['x_idPaciente'] = $rs->fields('idPaciente');
		$GLOBALS['x_CodigoFicha'] = $rs->fields('CodigoFicha');
		$GLOBALS['x_CodigoPaciente'] = $rs->fields('CodigoPaciente');
		$GLOBALS['x_FechaIngreso'] = $rs->fields('FechaIngreso');
		$GLOBALS['x_Hora'] = $rs->fields('Hora');
		$GLOBALS['x_PrimerNombreP'] = $rs->fields('PrimerNombreP');
		$GLOBALS['x_SegundoNombreP'] = $rs->fields('SegundoNombreP');
		$GLOBALS['x_PrimerApeP'] = $rs->fields('PrimerApeP');
		$GLOBALS['x_SegundoApeP'] = $rs->fields('SegundoApeP');
		$GLOBALS['x_ApellidoCasada'] = $rs->fields('ApellidoCasada');
		$GLOBALS['x_Referido'] = $rs->fields('Referido');
		$GLOBALS['x_AutoridadesNotificadas'] = $rs->fields('AutoridadesNotificadas');
		$GLOBALS['x_FechaNacP'] = $rs->fields('FechaNacP');
		$GLOBALS['x_AniosP'] = $rs->fields('AniosP');
		$GLOBALS['x_MesesP'] = $rs->fields('MesesP');
		$GLOBALS['x_DiasP'] = $rs->fields('DiasP');
		$GLOBALS['x_DPI'] = $rs->fields('DPI');
		$GLOBALS['x_EdicionPaciente'] = $rs->fields('EdicionPaciente');
		$GLOBALS['x_Telefono'] = $rs->fields('Telefono');
		$GLOBALS['x_Direccion'] = $rs->fields('Direccion');
		$GLOBALS['x_Sexo'] = $rs->fields('Sexo');
		$GLOBALS['x_ContactoPaciente'] = $rs->fields('ContactoPaciente');
		$GLOBALS['x_TelContacto'] = $rs->fields('TelContacto');
		$GLOBALS['x_Relacion'] = $rs->fields('Relacion');
		$GLOBALS['x_PersonalIngInfo_idPersonalIngInfo'] = $rs->fields('PersonalIngInfo_idPersonalIngInfo');
		$GLOBALS['x_EstadoCivil_idEstadoCivil'] = $rs->fields('EstadoCivil_idEstadoCivil');
		$GLOBALS['x_Etnia_idEtnia'] = $rs->fields('Etnia_idEtnia');
		$GLOBALS['x_AutoridadesNotif_idAutoridadesNotif'] = $rs->fields('AutoridadesNotif_idAutoridadesNotif');
		$val[1] = $GLOBALS['x_idPaciente'];
		$val[2] = $GLOBALS['x_CodigoFicha'];
		$val[3] = $GLOBALS['x_CodigoPaciente'];
		$val[4] = $GLOBALS['x_FechaIngreso'];
		$val[5] = $GLOBALS['x_Hora'];
		$val[6] = $GLOBALS['x_PrimerNombreP'];
		$val[7] = $GLOBALS['x_SegundoNombreP'];
		$val[8] = $GLOBALS['x_PrimerApeP'];
		$val[9] = $GLOBALS['x_SegundoApeP'];
		$val[10] = $GLOBALS['x_ApellidoCasada'];
		$val[11] = $GLOBALS['x_Referido'];
		$val[12] = $GLOBALS['x_AutoridadesNotificadas'];
		$val[13] = $GLOBALS['x_FechaNacP'];
		$val[14] = $GLOBALS['x_AniosP'];
		$val[15] = $GLOBALS['x_MesesP'];
		$val[16] = $GLOBALS['x_DiasP'];
		$val[17] = $GLOBALS['x_DPI'];
		$val[18] = $GLOBALS['x_EdicionPaciente'];
		$val[19] = $GLOBALS['x_Telefono'];
		$val[20] = $GLOBALS['x_Direccion'];
		$val[21] = $GLOBALS['x_Sexo'];
		$val[22] = $GLOBALS['x_ContactoPaciente'];
		$val[23] = $GLOBALS['x_TelContacto'];
		$val[24] = $GLOBALS['x_Relacion'];
		$val[25] = $GLOBALS['x_PersonalIngInfo_idPersonalIngInfo'];
		$val[26] = $GLOBALS['x_EstadoCivil_idEstadoCivil'];
		$val[27] = $GLOBALS['x_Etnia_idEtnia'];
		$val[28] = $GLOBALS['x_AutoridadesNotif_idAutoridadesNotif'];
	} else {
		$GLOBALS['x_idPaciente'] = "";
		$GLOBALS['x_CodigoFicha'] = "";
		$GLOBALS['x_CodigoPaciente'] = "";
		$GLOBALS['x_FechaIngreso'] = "";
		$GLOBALS['x_Hora'] = "";
		$GLOBALS['x_PrimerNombreP'] = "";
		$GLOBALS['x_SegundoNombreP'] = "";
		$GLOBALS['x_PrimerApeP'] = "";
		$GLOBALS['x_SegundoApeP'] = "";
		$GLOBALS['x_ApellidoCasada'] = "";
		$GLOBALS['x_Referido'] = "";
		$GLOBALS['x_AutoridadesNotificadas'] = "";
		$GLOBALS['x_FechaNacP'] = "";
		$GLOBALS['x_AniosP'] = "";
		$GLOBALS['x_MesesP'] = "";
		$GLOBALS['x_DiasP'] = "";
		$GLOBALS['x_DPI'] = "";
		$GLOBALS['x_EdicionPaciente'] = "";
		$GLOBALS['x_Telefono'] = "";
		$GLOBALS['x_Direccion'] = "";
		$GLOBALS['x_Sexo'] = "";
		$GLOBALS['x_ContactoPaciente'] = "";
		$GLOBALS['x_TelContacto'] = "";
		$GLOBALS['x_Relacion'] = "";
		$GLOBALS['x_PersonalIngInfo_idPersonalIngInfo'] = "";
		$GLOBALS['x_EstadoCivil_idEstadoCivil'] = "";
		$GLOBALS['x_Etnia_idEtnia'] = "";
		$GLOBALS['x_AutoridadesNotif_idAutoridadesNotif'] = "";
	}
}

//  Set up starting group
function SetUpStartGroup() {
	global $nStartGrp, $nTotalGrps, $nDisplayGrps;

	// Exit if no groups
	if ($nDisplayGrps == 0)
		return;

	// Check for a 'start' parameter
	if (@$_GET[EW_REPORT_TABLE_START_GROUP] != "") {
		$nStartGrp = $_GET[EW_REPORT_TABLE_START_GROUP];
		$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} elseif (@$_GET["pageno"] != "") {
		$nPageNo = $_GET["pageno"];
		if (is_numeric($nPageNo)) {
			$nStartGrp = ($nPageNo-1)*$nDisplayGrps+1;
			if ($nStartGrp <= 0) {
				$nStartGrp = 1;
			} elseif ($nStartGrp >= intval(($nTotalGrps-1)/$nDisplayGrps)*$nDisplayGrps+1) {
				$nStartGrp = intval(($nTotalGrps-1)/$nDisplayGrps)*$nDisplayGrps+1;
			}
			$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
		} else {
			$nStartGrp = @$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP];
		}
	} else {
		$nStartGrp = @$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP];	
	}

	// Check if correct start group counter
	if (!is_numeric($nStartGrp) || $nStartGrp == "") { // Avoid invalid start group counter
		$nStartGrp = 1; // Reset start group counter
		$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} elseif (intval($nStartGrp) > intval($nTotalGrps)) { // Avoid starting group > total groups
		$nStartGrp = intval(($nTotalGrps-1)/$nDisplayGrps) * $nDisplayGrps + 1; // Point to last page first group
		$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} elseif (($nStartGrp-1) % $nDisplayGrps <> 0) {
		$nStartGrp = intval(($nStartGrp-1)/$nDisplayGrps) * $nDisplayGrps + 1; // Point to page boundary
		$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
	}
}

// Set up popup
function SetupPopup() {
	global $conn, $sFilter;

	// Initialize popup
	// Process post back form

	if (count($_POST) > 0) {
		$sName = @$_POST["popup"]; // Get popup form name
		if ($sName <> "") {
		$cntValues = (is_array(@$_POST["sel_$sName"])) ? count($_POST["sel_$sName"]) : 0;
			if ($cntValues > 0) {
				$arValues = ewrpt_StripSlashes($_POST["sel_$sName"]);
				if (trim($arValues[0]) == "") // Select all
					$arValues = EW_REPORT_INIT_VALUE;
				$_SESSION["sel_$sName"] = $arValues;
				$_SESSION["rf_$sName"] = ewrpt_StripSlashes(@$_POST["rf_$sName"]);
				$_SESSION["rt_$sName"] = ewrpt_StripSlashes(@$_POST["rt_$sName"]);
				ResetPager();
			}
		}

	// Get 'reset' command
	} elseif (@$_GET["cmd"] <> "") {
		$sCmd = $_GET["cmd"];
		if (strtolower($sCmd) == "reset") {
			ResetPager();
		}
	}

	// Load selection criteria to array
}

// Reset pager
function ResetPager() {

	// Reset start position (reset command)
	global $nStartGrp, $nTotalGrps;
	$nStartGrp = 1;
	$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
}
?>
<?php

// Set up number of groups displayed per page
function SetUpDisplayGrps() {
	global $nDisplayGrps, $nStartGrp;
	$sWrk = @$_GET[EW_REPORT_TABLE_GROUP_PER_PAGE];
	if ($sWrk <> "") {
		if (is_numeric($sWrk)) {
			$nDisplayGrps = intval($sWrk);
		} else {
			if (strtoupper($sWrk) == "ALL") { // display all groups
				$nDisplayGrps = -1;
			} else {
				$nDisplayGrps = 3; // Non-numeric, load default
			}
		}
		$_SESSION[EW_REPORT_TABLE_SESSION_GROUP_PER_PAGE] = $nDisplayGrps; // Save to session

		// Reset start position (reset command)
		$nStartGrp = 1;
		$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = $nStartGrp;
	} else {
		if (@$_SESSION[EW_REPORT_TABLE_SESSION_GROUP_PER_PAGE] <> "") {
			$nDisplayGrps = $_SESSION[EW_REPORT_TABLE_SESSION_GROUP_PER_PAGE]; // Restore from session
		} else {
			$nDisplayGrps = 3; // Load default
		}
	}
}
?>
<?php

// Return poup filter
function GetPopupFilter() {
	$sWrk = "";
	return $sWrk;
}
?>
<?php

//-------------------------------------------------------------------------------
// Function getSort
// - Return Sort parameters based on Sort Links clicked
// - Variables setup: Session[EW_REPORT_TABLE_SESSION_ORDER_BY], Session["sort_Table_Field"]
function getSort()
{

	// Check for a resetsort command
	if (strlen(@$_GET["cmd"]) > 0) {
		$sCmd = @$_GET["cmd"];
		if ($sCmd == "resetsort") {
			$_SESSION[EW_REPORT_TABLE_SESSION_ORDER_BY] = "";
			$_SESSION[EW_REPORT_TABLE_SESSION_START_GROUP] = 1;
			$_SESSION["sort_infpaciente_idPaciente"] = "";
			$_SESSION["sort_infpaciente_CodigoFicha"] = "";
			$_SESSION["sort_infpaciente_CodigoPaciente"] = "";
			$_SESSION["sort_infpaciente_FechaIngreso"] = "";
			$_SESSION["sort_infpaciente_Hora"] = "";
			$_SESSION["sort_infpaciente_PrimerNombreP"] = "";
			$_SESSION["sort_infpaciente_SegundoNombreP"] = "";
			$_SESSION["sort_infpaciente_PrimerApeP"] = "";
			$_SESSION["sort_infpaciente_SegundoApeP"] = "";
			$_SESSION["sort_infpaciente_ApellidoCasada"] = "";
			$_SESSION["sort_infpaciente_Referido"] = "";
			$_SESSION["sort_infpaciente_AutoridadesNotificadas"] = "";
			$_SESSION["sort_infpaciente_FechaNacP"] = "";
			$_SESSION["sort_infpaciente_AniosP"] = "";
			$_SESSION["sort_infpaciente_MesesP"] = "";
			$_SESSION["sort_infpaciente_DiasP"] = "";
			$_SESSION["sort_infpaciente_DPI"] = "";
			$_SESSION["sort_infpaciente_EdicionPaciente"] = "";
			$_SESSION["sort_infpaciente_Telefono"] = "";
			$_SESSION["sort_infpaciente_Direccion"] = "";
			$_SESSION["sort_infpaciente_Sexo"] = "";
			$_SESSION["sort_infpaciente_ContactoPaciente"] = "";
			$_SESSION["sort_infpaciente_TelContacto"] = "";
			$_SESSION["sort_infpaciente_Relacion"] = "";
			$_SESSION["sort_infpaciente_PersonalIngInfo_idPersonalIngInfo"] = "";
			$_SESSION["sort_infpaciente_EstadoCivil_idEstadoCivil"] = "";
			$_SESSION["sort_infpaciente_Etnia_idEtnia"] = "";
			$_SESSION["sort_infpaciente_AutoridadesNotif_idAutoridadesNotif"] = "";
		}

	// Check for an Order parameter
	} elseif (strlen(@$_GET[EW_REPORT_TABLE_ORDER_BY]) > 0) {
		$sSortSql = "";
		$sSortField = "";
		$sOrder = @$_GET[EW_REPORT_TABLE_ORDER_BY];
		if (strlen(@$_GET[EW_REPORT_TABLE_ORDER_BY_TYPE]) > 0) {
			$sOrderType = @$_GET[EW_REPORT_TABLE_ORDER_BY_TYPE];
		} else {
			$sOrderType = "";
		}
	}
	return @$_SESSION[EW_REPORT_TABLE_SESSION_ORDER_BY];
}
?>
